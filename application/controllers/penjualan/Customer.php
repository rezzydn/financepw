<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$data['data'] = $this->M_Crud->get('customer');

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('penjualan/customer/index',$data);
		$this->load->view('template/footer');
	}
	public function create()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('penjualan/customer/create');
		$this->load->view('template/footer');
	}
	public function edit($id)
	{
		$where = [
			'id' => $id
		];
		$data['data'] = $this->M_Crud->getById('customer',$where);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('penjualan/customer/edit',$data);
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
			'tipe_cust' => $this->input->post('tipe'),
		];
		
		$res = $this->M_Crud->input($data,"customer");
		
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Customer berhasil diedit!</div>');
		redirect('penjualan/Customer');
		
	}
	
	function update()
	{
		$where = array('id' => $this->input->post('id'));
		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'tipe_cust' => $this->input->post('tipe'),
		];
		
		$res = $this->M_Crud->update($where,$data,"customer");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-success" role="alert">
		Data Customer berhasil diedit!</div>');

		redirect('penjualan/Customer');
		
	}

	function delete($id) 
	{
		$where = array('id' => $id);
		$res = $this->M_Crud->delete($where,"customer");
		$this->session->set_flashdata('success', '<div style="text-align:center;" class="alert alert-danger" role="alert">
		Data Customer berhasil dihapus!</div>');

		redirect('penjualan/Customer');
	}
}
