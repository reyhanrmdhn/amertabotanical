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
