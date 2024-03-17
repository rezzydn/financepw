<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
		
	}
	
	public function index()
	{
		$data['data'] = $this->M_Crud->get('supplier');

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pembelian/supplier/index',$data);
		$this->load->view('template/footer');
	}
	public function create()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pembelian/navbar/create');
		$this->load->view('template/footer');
	}
	public function edit($id)
	{
		$where = [
			'idSupplier' => $id
		];
		$data['data'] = $this->M_Crud->getById('supplier',$where);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pembelian/supplier/edit',$data);
		$this->load->view('template/footer');
	}
	function store()
	{
		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
		];
		
		$res = $this->M_Crud->input($data,"supplier");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Supplier berhasil ditambah!</div>');

		redirect('pembelian/Supplier');
		
	}
	
	function update()
	{
		$where = array('idSupplier' => $this->input->post('id'));
		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
		];
		
		$res = $this->M_Crud->update($where,$data,"supplier");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Supplier berhasil diedit!</div>');

		redirect('pembelian/Supplier');
		
	}

	function delete($id) 
	{
		$where = array('idSupplier' => $id);
		$res = $this->M_Crud->delete($where,"supplier");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Supplier berhasil dihapus!</div>');

		redirect('pembelian/Supplier');
	}
}
