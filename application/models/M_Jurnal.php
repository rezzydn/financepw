<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jurnal extends CI_Model {
    public function getAllJurnal() 
    {
        $sql    = "SELECT * FROM pembelian_master JOIN jurnal_pembelian ON jurnal_pembelian.id_data_pembelian = pembelian_master.id";
        $result = $this->db->query($sql)->result_array(); 
        
        return  $result;
    }
}