<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
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
        $data['title'] = 'Gallery';
        $data['css'] = '<link rel="stylesheet" href="' .  base_url('vendor/template/') . 'css/about.css">';
        $data['carts'] = $this->cart->contents();
        $data['total_cart'] = $this->cart->total();
        $data['gallery'] = $this->m_global->get_gallery();
        $this->m_view->set_view('home/gallery/index', $data);
    }
}
