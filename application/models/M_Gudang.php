<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gudang extends CI_Model {

    public function getGudangMasuk() 
	{
		$this->db->from('v_pembelian_master');
        return $this->db->get()->result();
    }
    public function getGudangMasukJoin() 
	{
		$this->db->from('gudang_masuk');
		$this->db->join('pembelian_master', 'gudang_masuk.no_pesanan = pembelian_master.no_pesanan', 'left');
        return $this->db->get()->result();
    }
    public function getGudangMasukReturJoin() 
	{
		$this->db->from('v_pembelian_master');
		$this->db->where('status2','Retur');
        return $this->db->get()->result();
    }
    public function getDataNoPesanan() 
	{
		$this->db->from('gudang_masuk');
        return $this->db->get()->result_array();
    }

    public function get_product($table) 
	{
        return $this->db->get($table)->result();
    }

    public function getById($table,$where) 
	{
		return $this->db->get_where($table, $where)->result();    
	}
    function input($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
   
    function update($where,$data,$table) {
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	
}

/* End of file ModelName.php */
