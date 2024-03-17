<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Crud extends CI_Model {

    public function format_harga($price) {
        
        $new = number_format($price, 0, '.','.');
        return 'Rp '.$new;
    }

    public function get($table) 
	{
        return $this->db->get($table)->result();
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
