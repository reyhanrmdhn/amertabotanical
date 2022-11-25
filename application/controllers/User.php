<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model', 'm_view');
        $this->load->model('Global_model', 'm_global');
        $this->data['user'] = $this->m_global->get_user($this->session->userdata('email'));
        is_logged_in();
    }
    public function index()
    {
        redirect('user/profile');
    }
    public function profile()
    {
        $id_user = $this->session->userdata('id');
        $data = $this->data;
        $data['title'] = 'My Profile';
        $data['css'] = '<link rel="stylesheet" href="' .  base_url('vendor/template/') . 'css/profile.css">';
        $data['carts'] = $this->cart->contents();
        $data['total_cart'] = $this->cart->total();
        $data['order'] = $this->m_global->get_all_order($id_user);
        $this->m_view->set_view('home/user/profile', $data);
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        //cek jika ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = './assets/img/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '100000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'image' => $this->upload->data('file_name'),
                ];

                $this->db->where('id', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" role="alert" style="border-radius:5px">
                Profile Edited!
                </div>');
                redirect('user/profile/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-3" role="alert" style="border-radius:5px">
                There is someting error!
                </div>');
                redirect('user/profile/');
            }
        } else {
            $data = [
                'name' => $name,
                'email' => $email,
            ];
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" role="alert" style="border-radius:5px">
                Profile Edited!
                </div>');
            redirect('user/profile/');
        }
    }
    public function checkPassword()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['id' => $id])->row_array();
        if (password_verify($password, $user['password'])) {
            $res['code'] = 100;
        } else {
            $res['code'] = 404;
        }
        echo json_encode($res);
    }
    public function change_password()
    {
        $new_password = $this->input->post('new_password');
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->set('password', $password_hash);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" role="alert" style="border-radius:5px">
        Password Changed!
        </div>');
        redirect('user/profile');
    }
}
