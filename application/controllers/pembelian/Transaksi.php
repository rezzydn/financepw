<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Crud');
		$this->load->model('M_Transaksi');
		$this->load->library('cart');
		// $this->cart->destroy();
		
		
	}
	
	public function index()
	{
		$data['data'] = $this->M_Crud->get('pembelian_master');

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pembelian/transaksi/index',$data);
		$this->load->view('template/footer');
	}
	public function create()
	{
		$Urutan = $this->db->query("select MAX(RIGHT(no_pesanan , 8 )) as kode from pembelian_master")->result();
		$kode = $Urutan[0]->kode + 1;
		$data['NoTrans'] = "PB-".str_pad($kode, 8, "0", STR_PAD_LEFT);

		$data['produk'] = $this->M_Transaksi->getProduk();
		// $data['NoTrans'] = 
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pembelian/transaksi/create',$data);
		$this->load->view('template/footer');
	}
	public function addMaster()
	{
		try {
			$NoPesanan 		= $this->input->post('NoPesanan');
			$Supplier 		= $this->input->post('Supplier');
			$Lokasi 		= $this->input->post('Lokasi');
			$TanggalPesanan = $this->input->post('TanggalPesanan');
			$Status 		= 'Aktif';
			$NilaiBruto 	= $this->input->post('NilaiBruto');
			$Diskon 		= $this->input->post('Diskon');
			$Pajak 			= $this->input->post('Pajak');
			$Nilai 			= $this->input->post('Nilai');
			$Keterangan 	= $this->input->post('Keterangan');
			$Waktu 			= date("Y-m-d H:i:s");
			$Status1 		= $this->input->post('St');
			$Status2 		= 'Trans';
			$StatusInt1 	= 0;
			$StatusInt2 	= 0;
			$master = [
				'no_pesanan' 		=> $NoPesanan,
				'nama_supplier' 	=> $Supplier,
				'lokasi' 			=> $Lokasi,
				'tanggal_pesanan' 	=> $TanggalPesanan,
				'nilai_bruto' 		=> $NilaiBruto,
				'status' 			=> $Status,
				'diskon' 			=> $Diskon,
				'pajak' 			=> $Pajak,
				'nilai' 			=> $Nilai,
				'keterangan' 		=> $Keterangan,
				'waktu' 			=> $Waktu,
				'status1' 			=> $Status1,
				'status2' 			=> $Status2,
				'StatusInt1' 		=> $StatusInt1,
				'StatusInt2' 		=> $StatusInt2,
			];
				if ($Status1 == 'Edit') {
					$this->db->delete('pembelian_master', array('no_pesanan' => $NoPesanan));
				} 
	
				$result 			= $this->db->insert('pembelian_master',$master);
				$id_data_pembelian 	= $this->db->insert_id();
				$detail  			= $this->addDetail($NoPesanan,$Status1);
				if($id_data_pembelian > 0) {
					$dataJurnalKas = [
						'id_data_pembelian'  => $id_data_pembelian,
						'id_perkiraan_akun'	 => KAS,
						'debit'				 => $Nilai,
						'kredit'			 => 0,
					];
					$statusDataJurnalKas = $this->db->insert('jurnal_pembelian', $dataJurnalKas);
	
					$dataJurnalPersediaan = [
						'id_data_pembelian'  => $id_data_pembelian,
						'id_perkiraan_akun'	 => PERSEDIAAN_BARANG_DAGANG,
						'debit'				 => 0,
						'kredit'			 => $Nilai
					];
					$this->db->insert('jurnal_pembelian', $dataJurnalPersediaan);
				}

			echo "ok";die;
		} catch (Exception $e) {
			echo "error";die;
		}
	}
	public function addDetail($NoPesanan,$Status1)
	{
		$data = [];
		$totQty = [];
		foreach ($this->cart->contents() as $key => $value) {
			if(isset($value['type']) && $value['type'] != 'JU') {
				array_push($data , array(
					'no_pesanan' => $NoPesanan,
					'id_produk' => $value['id'],
					'nama_produk' => $value['name'],
					'harga'   =>   $value['price'],
					'qty'   =>   $value['qty'],
					'diskon_prtg'   =>   $value['options']['DiskonPrtg'],
					'diskon_nilai'   =>    $value['options']['DiskonNilai'],
					'pajak'  => $value['options']['Pajak'],
					'status1'  => $Status1,
					'status2'  => '',
					'statusInt'  => 0,
					'waktu'  => date('Y-m-d H:i:s'),
				));

				$totQty =+ $value['qty'];
			}
		}
		if ($Status1 == 'Edit') {
			$this->db->delete('pembelian_detail', array('no_pesanan' => $NoPesanan));
		} 
		$result = $this->db->insert_batch('pembelian_detail', $data); 
		if ($result) {
			return "ok";
		} else {
			return "error";
		}
	}
	function load_detail($no_pesanan) {
		$detail = $this->M_Transaksi->getDataDetail($no_pesanan);

		// Data Barang
		if (isset($detail)) {
			if(empty($this->cart->contents())) {
			foreach ($detail as $key => $value) {
				$data = array(
					'id'      => $value->id_produk,
					'qty'     => $value->qty,
					'price'   => $value->harga,
					'name'    => $value->nama_produk,
					'options'    => array('DiskonPrtg' => $value->diskon_prtg ,'DiskonNilai' => $value->diskon_nilai, 'Pajak' => $value->pajak),
					);
					$this->cart->insert($data);		
				}	
			}
		} else {
			echo 'Kosong';
		}	
	}
	public function detail($no_pesanan)
	{
		$this->load_detail($no_pesanan);
		$data['master'] = $this->M_Transaksi->getDataMaster($no_pesanan);
		
		if (!empty($data['master'])) {

			// $data['supplier'] = $this->M_Supplier->getAll();
			$data['produk'] = $this->M_Transaksi->getProduk();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pembelian/transaksi/detail',$data);
			$this->load->view('template/footer');
		}

	}
	public function edit($no_pesanan)
	{
		$data['master'] = $this->M_Transaksi->getDataMaster($no_pesanan);
		$detail = $this->M_Transaksi->getDataDetail($no_pesanan);

		if (!empty($data['master'])) {

			// $data['supplier'] = $this->M_Supplier->getAll();
			$data['produk'] = $this->M_Transaksi->getProduk();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pembelian/transaksi/edit',$data);
			$this->load->view('template/footer');
		}

		// Data Barang
		if (isset($detail)) {
			if(empty($this->cart->contents())) {
			foreach ($detail as $key => $value) {
				$data = array(
					'id'      => $value->id_produk,
					'qty'     => $value->qty,
					'price'   => $value->harga,
					'name'    => $value->nama_produk,
					'options'    => array('DiskonPrtg' => $value->diskon_prtg ,'DiskonNilai' => $value->diskon_nilai, 'Pajak' => $value->pajak),
					);
					$this->cart->insert($data);		
				}	
			}
		} else {
			echo 'Kosong';
		}	
	}
	
	function delete($no_pesanan) 
	{
		$where = array('no_pesanan' => $no_pesanan);
		$this->M_Crud->delete($where,"pembelian_master");
		$this->M_Crud->delete($where,"pembelian_detail");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Transaksi Pembelian berhasil dihapus!</div>');

		redirect('pembelian/transaksi');
	}
}
