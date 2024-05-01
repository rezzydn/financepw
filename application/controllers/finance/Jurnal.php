<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Finance');
		$this->load->model('M_Jurnal');
	}
	
	public function index() 
	{
		$data['jurnals'] = $this->M_Jurnal->getAllJurnal();
		// dd($data['jurnals']);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/jurnal/index', $data);
		$this->load->view('template/footer');
	}

	public function create() 
	{
		$Urutan = $this->db->query("select MAX(RIGHT(kode_transaksi , 3)) as kode from jurnal_umum")->result();
		$kode = $Urutan[0]->kode + 1;
		$data['NoJurnal'] = "JU-".str_pad($kode, 4, "0", STR_PAD_LEFT);

		$data['daftar_akun'] = $this->M_Finance->getAkun();
		
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/jurnal/create',$data);
		$this->load->view('template/footer');
	}

	public function store()
	{
		$NoJurnal 		= $this->input->post('NoJurnal');
		$TanggalJurnal 	= $this->input->post('TanggalJurnal');
		$keterangan 	= $this->input->post('keterangan');
		$data = [];
		foreach ($this->cart->contents() as $key => $value) {
			if($value['type'] == 'JU') {
				array_push($data , [
					'id_perkiraan_akun' => $value['id'],
					'kode_transaksi'	=> $NoJurnal,
					'tanggal'			=> $TanggalJurnal,
					'keterangan'		=> $keterangan,
					'debit'				=> $value['debit'],
					'kredit'			=> $value['kredit'],
				]);
			}
		}

		$result = $this->db->insert_batch('jurnal_umum', $data); 

		if($result) {
			echo json_encode(['code' => 200, 'message' => 'ok']);die;
		} else {
			echo json_encode(['code' => 500, 'message' => 'error']);die;
		}
	}
}
