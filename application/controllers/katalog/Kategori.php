<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Crud');
        $this->second = $this->load->database('second', TRUE);
	}

	public function index()
	{
        $data['category'] = $this->second->get('product_category')->result();

        $this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('katalog/kategori/index',$data);
		$this->load->view('template/footer');
	}

    public function add_data()
	{
        $data['discount'] = $this->M_admin->show_discount();

        $this->load->view('admin/header_admin');
		$this->load->view('admin/discount/discount_add', $data);
        $this->load->view('admin/footer_admin');
	}

    public function store_data() {   

        $data_split = $this->input->post('name_discount');
        $values = explode(',', $data_split);
        $name_discount = $values[0];
        $id_products = $values[1];

        $data = array (
                'name_discount' => $name_discount,
                'id_products' => $id_products,
                'price' => $this->input->post('price'),
                'status' => $this->input->post('status'),
                'kode_discount' => $this->input->post('kode_discount')
            );        
        
        $this->M_admin->input($data , 'discount');
    
        redirect('admin/Discount');
    }

}
