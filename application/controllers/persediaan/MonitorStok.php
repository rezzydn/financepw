<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonitorStok extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_Crud');
        $this->second = $this->load->database('second', TRUE);
	}
	
	public function index() {

        $data['products'] = $this->second->get_where('products', array('stock' => 0))->result();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('persediaan/monitor-stok/index', $data);
		$this->load->view('template/footer');
	}

    public function menipis() {

        $this->db->where('stock <', 500);
        $data['products'] = $this->second->get('products')->result();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('persediaan/monitor-stok/barang_menipis', $data);
		$this->load->view('template/footer');
	}

    public function palinglaku() {

        $this->db->where('stock <', 500);
        $data['products'] = $this->second->get('products')->result();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('persediaan/monitor-stok/paling_laku', $data);
		$this->load->view('template/footer');
	}
}
