<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->model('M_Gudang');
		$this->second = $this->load->database('second', TRUE);
		$this->load->model('M_Transaksi');
		// var_dump($this->cart->contents());die;
	}
	
	public function index() {
		
		$data['data'] = $this->M_Gudang->getGudangMasuk();
		$val = $this->M_Gudang->getDataNoPesanan();
		$groupedArray = [];

		foreach ($val as $element) {
			$noPesanan = $element["no_pesanan"];
			if (!isset($groupedArray[$noPesanan])) {
				$groupedArray[$noPesanan] = [];
			}
			$groupedArray[$noPesanan][] = $element;
		}
		$data['data_diterima'] = $groupedArray;
		// var_dump($data['data_diterima']);die;
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('gudang/barang_masuk/index',$data);
		$this->load->view('template/footer');
	}
	public function pesananPembelian($no_pesanan)
	{
		$this->cart->destroy();
		$data['data'] = $this->M_Gudang->getGudangMasuk();
		$data['master'] = $this->M_Transaksi->getDataMaster('v_pembelian_master', $no_pesanan);
		$detail = $this->M_Transaksi->getDataDetail('pembelian_detail', $no_pesanan);
		$data['id_produk'] = $detail[0]->id_produk;
		$pesanan = $this->M_Gudang->getById('gudang_masuk',array('no_pesanan' => $no_pesanan));
		$qty_tot = 0;
		$qty_tots = 0;
		if (count($pesanan) > 0) {
			foreach ($pesanan as $tot) {
				$qty_tot += floatval($tot->qty_total);
			}
			$qty_tot = $data['master'][0]->qty - $qty_tot;
		} else {
				$qty_tot = $data['master'][0]->qty;
		}

		if (!empty($data['master'])) {
			// $data['supplier'] = $this->M_Supplier->getAll();
			$data['produk'] = $this->M_Transaksi->getProduk();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('gudang/barang_masuk/pesanan_pembelian',$data);
			$this->load->view('template/footer');
		}

		// Data Barang
		if (isset($detail)) {
			if(empty($this->cart->contents())) {
			foreach ($detail as $key => $value) {
				$data = array(
					'id'      => $value->id_produk,
					'qty'     => $qty_tot,
					'price'   => $value->harga,
					'name'    => $value->nama_produk,
					'options'    => array('DiskonPrtg' => 0,'DiskonNilai' => 0, 'Pajak' => 0,'qty_diterima' => $qty_tot),
					'type'	=> 'GUDANG_MASUK'
					);
					$this->cart->insert($data);		
				}	
			}
		} else {
			echo 'Kosong';
		}	
	}
	public function penerimaanBarang()
	{
		$data['data'] = $this->M_Gudang->getGudangMasukJoin();
		// var_dump($data['data']);die;
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('gudang/barang_masuk/penerimaan_barang',$data);
		$this->load->view('template/footer');
	}
	public function barangReturn()
	{
		$data['data'] = $this->M_Gudang->getGudangMasukReturJoin();
		// var_dump($data['data']);die;
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('gudang/barang_masuk/retur/barang_return',$data);
		$this->load->view('template/footer');
	}
	public function updatePenerimaanBarang($no_terima)
	{
		$where = [
			'no_terima' => $no_terima
		];
		$Urutan = $this->db->query("select MAX(RIGHT(no_penempatan , 8 )) as kode from gudang_masuk")->result();
		$kode = $Urutan[0]->kode + 1;
		$no_penempatan = "PUT-".str_pad($kode, 8, "0", STR_PAD_LEFT);
		$gd_masuk = $this->M_Gudang->getById('gudang_masuk',$where);
		$this->db->set('qty_progres', $gd_masuk[0]->qty_total);
		$this->db->set('no_penempatan',$no_penempatan);
		$this->db->where('no_terima',$no_terima);
		$update  = $this->db->update('gudang_masuk');
		if ($update) {
			redirect('gudang/BarangMasuk/penerimaanBarang','refresh');
		} else {
			echo "Gagal!";die;
		}
		
	}
	function addPesananMasuk()
	{
		$no_pesanan = $this->input->post('NoPesanan');
		$Supplier = $this->input->post('Supplier');
		$Lokasi = $this->input->post('Lokasi');
		$TanggalPesanan = $this->input->post('TanggalPesanan');
		$Keterangan = $this->input->post('Keterangan');
		$Qty = $this->input->post('totQty');
		$IdProduk = $this->input->post('IdProduk');
		$qtyDiterima = [];
		foreach ($this->cart->contents() as $key => $value) {
			$qtyDiterima =+ $value['options']['qty_diterima'];
		}
		if ($qtyDiterima) {
			$Urutan = $this->db->query("select MAX(RIGHT(no_terima , 8 )) as kode from gudang_masuk")->result();
			$kode = $Urutan[0]->kode + 1;
			$no_terima = "BIL-".str_pad($kode, 8, "0", STR_PAD_LEFT);

			$gudang = [
				'no_terima' => $no_terima,
				'no_pesanan' => $no_pesanan,
				'transaksi' => 'In',
				'qty_total' => $qtyDiterima,
				'qty_progres' => 0,	
				'user' => 'admin',	
				'waktu' => date('Y-m-d H:i:s'),	
				'id_produk' => $IdProduk
			];
			$insert_gudang = $this->db->insert('gudang_masuk',$gudang);
			if ($insert_gudang) {	
				$data_gd_masuk = $this->db->get_where('gudang_masuk', array('no_pesanan' => $no_pesanan))->result();
				$sum_qty_diterima = 0;
				if (count($data_gd_masuk) > 0) {
					foreach ($data_gd_masuk as $key => $row) {
						$sum_qty_diterima += $row->qty_total;
					}
				} else {
					$sum_qty_diterima = 0;
				}
				$this->db->set('nama_supplier', $Supplier);
				$this->db->set('lokasi', $Lokasi);
				$this->db->set('tanggal_pesanan', $TanggalPesanan);
				$this->db->set('StatusInt1', $sum_qty_diterima);
				
				$this->db->where('no_pesanan',$no_pesanan);
				$update  = $this->db->update('pembelian_master');

				$this->second->set('stock', 'stock + ' . (int)$qtyDiterima, FALSE) 
								->where('id', $IdProduk) 
								->update('products'); 
				echo "ok";
			} else {
				echo "error";
			}

		}
	}
	function addBarangRetur()
	{
		$Urutan = $this->db->query("select MAX(RIGHT(no_retur , 8 )) as kode from retur_penjualan")->result();
		$kode = $Urutan[0]->kode + 1;
		$data['noretur'] = "RJ-".str_pad($kode, 8, "0", STR_PAD_LEFT);
		$data['produk'] = $this->M_Transaksi->getProduk();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('gudang/barang_masuk/retur/add_barang_retur',$data);
		$this->load->view('template/footer');
	}
	function addReturPenjualan()
	{
		$master = [
			'no_pesanan' => $this->input->post('NoPesanan'),
			'nama_supplier' => $this->input->post('Supplier'),
			'lokasi' => $this->input->post('Lokasi'),
			'tanggal_pesanan' => $this->input->post('TanggalPesanan'),
			'status' => 'Aktif',
			'nilai_bruto' => $this->input->post('NilaiBruto'),
			'diskon' => 0,
			'pajak' => 0,	
			'nilai' => $this->input->post('NilaiBruto'),
			'Keterangan' => $this->input->post('Keterangan'),
			'waktu' => date('Y-m-d H:i:s'),
			'status1' => 'New',
			'status2' => 'Retur',
			'StatusInt1' => '',
			'StatusInt2' => '',
		];

		$NoPesanan = $master['no_pesanan'];
		$Status1 = $master['status1'];

		$detail  = $this->addDetail($NoPesanan,$Status1);
		if ($detail == 'ok') {
			if ($Status1 == 'Edit') {
				$this->db->delete('pembelian_master', array('no_pesanan' => $NoPesanan));
			} 

		$result = $this->db->insert('pembelian_master',$master);
		echo "ok";
		
		} else {
			echo "error";
		}
	}

	public function addDetail($NoPesanan,$Status1)
	{
		$data = [];
		$totQty = [];
		foreach ($this->cart->contents() as $key => $value) {
			array_push($data , array(
				'no_pesanan' => $NoPesanan,
				'id_produk' => $value['id'],
				'nama_produk' => $value['name'],
				'harga'   =>   $value['price'],
                'qty'   =>   $value['qty'],
                'diskon_prtg'   =>   0,
                'diskon_nilai'   =>    0,
                'pajak'  => 0,
                'status1'  => $Status1,
                'status2'  => '',
                'statusInt'  => 0,
                'waktu'  => date('Y-m-d H:i:s'),
			));

			$totQty =+ $value['qty'];
		}
		if ($Status1 == 'Edit') {
			$this->db->delete('pembelian_detail', array('no_pesanan' => $NoPesanan));
		} 
		$result = $this->db->insert_batch('pembelian_detail', $data); 
		// var_dump($result);die;
		if ($result) {
			return "ok";
		} else {
			return "error";
		}
	}
}
