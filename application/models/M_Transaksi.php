<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi extends CI_Model {

	function __construct(){
		parent::__construct();
		//load our second db and put in $db2
		$this->db2 = $this->load->database('second', TRUE);
	}

	public function getProduk(){
		$query = $this->db2->get('products');
		return $query->result(); 
	}
	
	public function getDataMaster($no_pesanan){
		
		$this->db->where('no_pesanan', $no_pesanan);
		$query = $this->db->get('v_pembelian_master');
		return $query->result(); 
	}
	public function getDataDetail($no_pesanan){

		$this->db->where('no_pesanan', $no_pesanan);
		$query = $this->db->get('pembelian_detail');
		return $query->result(); 
	}
	

}
