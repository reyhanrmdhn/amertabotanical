<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $url = $ci->uri->segment(1);

        if ($url == 'admin') {
            if ($role_id != 1) {
                redirect('auth/blocked');
            }
        } else {
            if ($role_id == 1) {
                redirect('admin');
            }
        }
    }
}

function is_ecommerce()
{
    $ci = get_instance();
    $page_setting = $ci->db->get_where('page_setting', ['id' => 1])->row_array();
    if ($page_setting['ecommerce_status'] == 1) {
        return true;
    } else {
        return false;
    }
}
