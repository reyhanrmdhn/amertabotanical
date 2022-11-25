<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View_model extends CI_Model
{
    public function set_view($content, $data)
    {
        $this->load->view('template/header.php', $data);
        $this->load->view('template/topbar.php');
        $this->load->view($content);
        $this->load->view('template/footer.php');
    }
    public function set_view_admin($content, $data)
    {
        $this->load->view('template/admin/header.php', $data);
        $this->load->view('template/admin/topbar.php');
        $this->load->view('template/admin/sidebar.php');
        $this->load->view($content);
        $this->load->view('template/admin/footer.php');
    }
}
