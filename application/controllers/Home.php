<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('View_model', 'm_view');
		$this->load->model('Global_model', 'm_global');
		$this->data['user'] = $this->m_global->get_user($this->session->userdata('email'));
	}

	public function index()
	{
		$data = $this->data;
		$data['produk'] = $this->m_global->get_product();
		$data['css'] = '<link rel="stylesheet" href="' .  base_url('vendor/template/') . 'css/index.css">';
		$data['carts'] = $this->cart->contents();
		$data['total_cart'] = $this->cart->total();
		$this->m_view->set_view('home/index', $data);
	}



	// ------------------------------
	//JSON
	public function get_image()
	{
		$id_produk = $this->input->post('id_produk');
		$output = $this->m_global->get_image($id_produk)->result_array();
		echo json_encode($output);
	}
}
