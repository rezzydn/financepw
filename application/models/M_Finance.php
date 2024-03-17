<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Finance extends CI_Model {

	function __construct(){
		parent::__construct();
        $this->load->database();
	}

	public function getAkun(){
		$query = $this->db->get('perkiraan_akun');
		return $query->result(); 
	}

}

/* End of file ModelName.php */
