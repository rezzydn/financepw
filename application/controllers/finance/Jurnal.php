<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Finance');
		
	}
	
	public function index() {

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/jurnal/index');
		$this->load->view('template/footer');
	}

	public function create() {
		$Urutan = $this->db->query("select MAX(RIGHT(no_jurnal , 8 )) as kode from jurnal_master")->result();
		$kode = $Urutan[0]->kode + 1;
		$data['NoJurnal'] = "JU-".str_pad($kode, 8, "0", STR_PAD_LEFT);

		$data['daftar_akun'] = $this->M_Finance->getAkun();
		
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/jurnal/create',$data);
		$this->load->view('template/footer');
	}
}
