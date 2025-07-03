<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('get_product_image')) {
    function get_product_image($id)
    {
        $ci = get_instance();
        $ci->load->model('Global_model', 'm_global');

        $data = $ci->m_global->get_image($id)->row_array();
        $picture_name = $data['gambar'];

        if (!$picture_name) {
            $picture_name = 'default.jpg';
        }
        $file = './assets/product/' . $picture_name;
        return base_url('assets/product/' . $picture_name);
    }
    function get_user_image($id)
    {
        $ci = get_instance();
        $ci->load->model('Global_model', 'm_global');

        $data = $ci->m_global->get_customerByID($id);
        $picture_name = $data['image'];

        $file = './assets/img/user/' . $picture_name;
        return base_url('assets/img/user/' . $picture_name);
    }
}
