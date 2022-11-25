<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Contact extends CI_Controller

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

        $data['title'] = 'Contact';

        $data['css'] = '<link rel="stylesheet" href="' .  base_url('vendor/template/') . 'css/contact.css">';

        $data['carts'] = $this->cart->contents();

        $data['total_cart'] = $this->cart->total();

        $data['widget'] = $this->recaptcha->getWidget();
        $data['script'] = $this->recaptcha->getScriptTag();

        $this->m_view->set_view('home/contact/index', $data);
    }

    public function input()

    {

        $format = bin2hex(random_bytes(6));

        $data = [

            'id_inbox' => $format,

            'name' => $this->input->post('name'),

            'subject' => $this->input->post('subject'),

            'email' => $this->input->post('email'),

            'message' => $this->input->post('message'),

        ];

        $recaptcha = $this->input->post('g-recaptcha-response');

        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) && $response['success'] === true) {
                $this->db->insert('inbox', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" role="alert" style="border-radius:10px">
                Message Send!
                </div>');
                redirect('contact');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-3" role="alert" style="border-radius:10px">
                Recaptcha must be filled!
                </div>');
            redirect('contact');
        }
    }
}
