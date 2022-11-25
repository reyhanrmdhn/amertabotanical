<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{
    public function get_menu()
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->where('is_active', 1);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_menu_joined($role_id)
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->join('user_access_menu', 'user_access_menu.menu_id = user_menu.menu_id');
        $this->db->where('user_access_menu.role_id', $role_id);
        $this->db->where('user_menu.is_active', 1);
        $this->db->order_by('user_access_menu.menu_id', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_menu_access($role_id, $menu_id)
    {
        $this->db->select('*');
        $this->db->from('user_access_menu');
        $this->db->where('role_id', $role_id);
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_userByID($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.role_id = user.role_id');
        $this->db->where('user.id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.role_id = user.role_id');
        $this->db->where('user.role_id !=', 2);
        $this->db->where('user.email !=', 'dev@amertabotanical.com');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function get_validEmail($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_role()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->where('role_id !=', 2);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_roles()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_product()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->order_by('produk.date_created', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_product_detail($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function get_image($id)
    {
        $this->db->select('*');
        $this->db->from('produk_image');
        // $this->db->join('produk', 'produk.id_produk = produk_image.id_produk');
        $this->db->where('produk_image.id_produk', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_customer()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id !=', 1);
        $this->db->order_by('user.date_created', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_customerByID($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function get_all_order($id_user)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_order_detail($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan_detail');
        $this->db->join('produk', 'produk.id_produk = pesanan_detail.id_produk');
        $this->db->where('pesanan_detail.id_pesanan', $id);
        $query = $this->db->get();
        return $query;
    }
    public function get_order($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('pesanan.id_pesanan', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function admin_getOrder()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('user', 'user.id = pesanan.id_user');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function admin_getOrderDetail($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        // $this->db->join('user', 'user.id = pesanan.id_user');
        // $this->db->join('pesanan_detail', 'pesanan_detail.id_pesanan = pesanan.id_pesanan');
        $this->db->where('pesanan.id_pesanan', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function admin_getOrderDetailProduct($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan_detail');
        $this->db->join('produk', 'produk.id_produk = pesanan_detail.id_produk');
        $this->db->where('pesanan_detail.id_pesanan', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_gallery()
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_bukti_tf($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan_bukti_tf');
        $this->db->join('pesanan', 'pesanan.id_pesanan = pesanan_bukti_tf.id_pesanan');
        $this->db->where('pesanan_bukti_tf.id_pesanan', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function get_inbox()
    {
        $this->db->select('*');
        $this->db->from('inbox');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_inboxbyID($id)
    {
        $this->db->select('*');
        $this->db->from('inbox');
        $this->db->where('id_inbox', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function get_content($url)
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('url', $url);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_contentHome_image($id)
    {
        $this->db->select('*');
        $this->db->from('content_image');
        $this->db->join('content', 'content.id_content = content_image.id_content');
        $this->db->where('content_image.id_content', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_contentAbout_image()
    {
        $this->db->select('*');
        $this->db->from('content_image');
        $this->db->where('content_image.id_content', 'about');
        $query = $this->db->get();
        return $query;
    }
    public function get_rating($id)
    {
        $this->db->select('*');
        $this->db->from('produk_review');
        $this->db->join('produk', 'produk.id_produk = produk_review.id_produk');
        $this->db->join('user', 'user.id = produk_review.id_user');
        $this->db->where('produk_review.id_produk', $id);
        $this->db->order_by('produk_review.tanggal_review', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_po()
    {
        $this->db->select('*');
        $this->db->from('preorder');
        return $this->db->get()->result_array();
    }
    public function get_preorderByID($id)
    {
        $this->db->select('*');
        $this->db->from('preorder');
        $this->db->where('id_po', $id);
        return $this->db->get()->row_array();
    }
}
