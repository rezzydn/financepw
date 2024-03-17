<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Crud');
		
	}
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/laporan/index');
		$this->load->view('template/footer');
	}
	public function create()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/akun/create');
		$this->load->view('template/footer');
	}
	public function edit($id)
	{
		$where = [
			'idPerkiraanAkun' => $id
		];
		$data['data'] = $this->M_Crud->getById('perkiraan_akun',$where);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('finance/akun/edit',$data);
		$this->load->view('template/footer');
	}
	function store()
	{
		$data = [
			'no' => $this->input->post('no_akun'),
			'nama' => $this->input->post('nama_akun'),
			'kelompok' => $this->input->post('kel_akun'),
			'saldo_awal' => $this->input->post('saldo_awal'),
		];
		
		$res = $this->M_Crud->input($data,"perkiraan_akun");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Perkiraan Akun berhasil ditambah!</div>');

		redirect('finance/Akun');
		
	}
	
	function update()
	{
		$where = array('idPerkiraanAkun' => $this->input->post('id'));
		$data = [
			'no' => $this->input->post('no_akun'),
			'nama' => $this->input->post('nama_akun'),
			'kelompok' => $this->input->post('kel_akun'),
			'saldo_awal' => $this->input->post('saldo_awal'),
		];
		
		$res = $this->M_Crud->update($where,$data,"perkiraan_akun");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Perkiraan Akun berhasil diupdate!</div>');

		redirect('finance/Akun');
		
	}

	function delete($id) 
	{
		$where = array('idPerkiraanAkun' => $id);
		$res = $this->M_Crud->delete($where,"perkiraan_akun");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-danger" role="alert">
		Data Perkiraan Akun berhasil dihapus!</div>');

		redirect('finance/Akun');
	}
}
