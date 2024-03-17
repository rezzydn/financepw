<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPenjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Crud');
		
	}
	
	public function index() {
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('penjualan/laporan/index');
		$this->load->view('template/footer');
	}
}
