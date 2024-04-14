<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PosisiStok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Crud');
		$this->load->model('M_Gudang');	
	}
	
	public function index()
	{
		$data['stocks'] = $this->M_Gudang->getGudangMasukPenerimaanJoinPembelian();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('persediaan/posisi-stok/index', $data);
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
		$this->load->view('finance/perkiraan-akun/edit',$data);
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
		redirect('master/PerkiraanAkun');
		
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
		redirect('finance/PerkiraanAkun');
		
	}

	function delete($id) 
	{
		$where = array('idPerkiraanAkun' => $id);
		$res = $this->M_Crud->delete($where,"perkiraan_akun");
		
		redirect('finance/PerkiraanAkun');
	}
}
