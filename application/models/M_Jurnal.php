<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jurnal extends CI_Model {
    public function getAllJurnal() 
    {
        $sql    = "SELECT pm.no_pesanan AS no_jurnal, DATE_FORMAT(pm.waktu, '%d %M %Y %H:%i:%s') AS tgl_jurnal, 'Pembelian' AS sumber, pm.nilai AS nominal, pm.keterangan AS keterangan
                    FROM pembelian_master pm 
                    INNER JOIN (SELECT * FROM jurnal_pembelian LIMIT 1) jp 
                    ON jp.id_data_pembelian = pm.id";
        $result = $this->db->query($sql)->result_array(); 
        
        return  $result;
    }
}