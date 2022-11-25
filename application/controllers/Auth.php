<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
    }
    public function index()
    {
        if ($this->session->userdata('role_id')) {
            redirect('admin/dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('password', 'Password');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else { //validasi sukses
            $url = 'user/profile';
            $this->_login($url);
        }
    }
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'This Email has already registered!'
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $user_input = [
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'user.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'country' => $this->input->post('country'),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $user_input);
            $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-2" style="border-radius:5px" role="alert">
                Registration Success!
                </div>');
            redirect('auth');
        }
    }
    private function _login($url)
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {  // jika user tersedia
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'image' => $user['image'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin/orders');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-2" style="border-radius:5px" role="alert">
                    Login Succeed!
                    </div>');
                    redirect($url);
                }
            } else { //salah password
                $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-2" style="border-radius:5px" role="alert">
                Password salah!
                </div>');
                $this->session->set_flashdata('email', $email);
                redirect('auth');
            }
        } else { //belum registrasi
            $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-2" style="border-radius:5px" role="alert">
            Akun anda belum terdaftar!
             </div>');
            redirect('auth');
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot_password');
        } else { //validasi sukses
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendMail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-2" style="border-radius:5px" role="alert">
                Success! Please Check your E-mail to Reset your Password
                </div>');
                redirect('auth/forgot_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-2" style="border-radius:5px" role="alert">
                Email is not registered!
                </div>');
                redirect('auth/forgot_password');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-2" style="border-radius:5px" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth/forgot_password');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-2" style="border-radius:5px" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth/forgot_password');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/changepassword');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-2" style="border-radius:5px" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('image');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-2" style="border-radius:5px" role="alert">Logout Succeed!</div>');
        redirect('auth');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    //JSON
    public function validasi_email()
    {
        $email = $this->input->post('email');
        $data = $this->m_login->get_validEmail($email);
        echo json_encode($data);
    }

    private function _sendMail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://mail.amertabotanical.com',
            'smtp_user' => 'no-reply@amertabotanical.com',
            'smtp_pass' => 'amerta_botemail',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'validate'  => TRUE,
            'priority'  => 1,
            'newline'   => "\r\n"
        ];
        $this->email->initialize($config);

        $this->email->from('no-reply@amertabotanical.com', 'Amerta Botanical');
        $this->email->to($this->input->post('email'));

        $data = array(
            'email' =>  $this->input->post('email'),
            'token' => urlencode($token),
        );
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message($this->load->view('auth/email', $data, true));
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message($this->load->view('auth/email_forgot', $data, true));
        }

        if ($this->email->send()) {
            return true;
        }
    }
}
