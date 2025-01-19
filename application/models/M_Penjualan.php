<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penjualan extends CI_Model {

	function __construct(){
		parent::__construct();
	}

    public function get_penjualan_with_customer($status = NULL)
    {
        $this->db->select('penjualan_master.*, customer.nama');
        $this->db->from('penjualan_master');
        
        $this->db->join('customer', 'customer.id = penjualan_master.id_customer');
        
        $query = $this->db->get();

        return $query->result();
    }

}
