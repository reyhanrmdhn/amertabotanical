<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    private $upload_path = "./assets/product/";
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
        redirect('admin/orders');
    }
    public function dashboard()
    {
        $data = $this->data;
        $data['title'] = 'dashboard';
        $this->m_view->set_view_admin('admin/index', $data);
    }
    // -----------------------
    public function products()
    {
        $data = $this->data;
        $data['title'] = 'Products Management';
        $data['produk'] = $this->m_global->get_product();
        $this->m_view->set_view_admin('admin/products/index', $data);
    }
    public function add_product()
    {
        $data = $this->data;
        $data['title'] = 'Add New Product';
        $this->m_view->set_view_admin('admin/products/add', $data);
    }
    public function input_product()
    {
        $format = bin2hex(random_bytes(6));
        $data = [
            'id_produk' => $format,
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'harga_lama' => 0,
            'deskripsi' => $this->input->post('deskripsi'),
            'deskripsi_panjang' => $this->input->post('deskripsi_panjang'),
            'date_created' => time(),
        ];
        $this->db->insert('produk', $data);
        //cek jika ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '100000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data_image = [
                    'id_produk' => $format,
                    'gambar' => $this->upload->data('file_name'),
                ];
                $this->db->insert('produk_image', $data_image);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Product Added!
                </div>');
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                An Error Occured! Please try again
                </div>');
                redirect('admin/products');
            }
        }
    }
    public function delete_product($id)
    {
        $image = $this->db->get_where('produk_image', ['id_produk' => $id])->row_array();
        $path = './assets/product/' . $image['gambar'];
        chmod($path, 0777);
        unlink($path);

        $this->db->delete('produk_image', array('id_produk' => $id));
        $this->db->delete('produk', array('id_produk' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Product Deleted!
        </div>');
        redirect('admin/products');
    }
    public function detail_product($id)
    {
        $data = $this->data;
        $data['title'] = 'Products Management';
        $data['produk'] = $this->m_global->get_product_detail($id);
        $this->m_view->set_view_admin('admin/products/detail', $data);
    }
    public function edit_product()
    {
        $id = $this->input->post('id_produk');
        $data = [
            'id_produk' => $id,
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'deskripsi_panjang' => $this->input->post('deskripsi_panjang'),
        ];
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Product Edited!
        </div>');
        redirect('admin/detail_product/' . $id);
    }
    public function edit_price()
    {
        $id = $this->input->post('id_produk');
        if ($this->input->post('harga_baru')) {
            $data = [
                'harga' => $this->input->post('harga_baru'),
                'harga_lama' => $this->input->post('harga_lama'),
            ];
            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Price Edited!
            </div>');
            redirect('admin/detail_product/' . $id);
        } else {
            $data = [
                'harga' => $this->input->post('harga_lama'),
            ];
            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Price Edited!
            </div>');
            redirect('admin/detail_product/' . $id);
        }
    }
    public function changeStok()
    {
        $stok = $this->input->post('stok');
        $id = $this->input->post('id');
        $data = [
            'stok' => $stok,
        ];
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Stock Edited!
        </div>');
        $output = 100;
        echo json_encode($output);
    }
    public function add_image_product()
    {
        $id = $this->input->post('id_produk');
        //cek jika ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data_image = [
                    'id_produk' => $id,
                    'gambar' => $this->upload->data('file_name'),
                ];
                $this->db->insert('produk_image', $data_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Product Image Added!
        </div>');
        redirect('admin/detail_product/' . $id);
    }
    public function delete_image($id, $id_produk)
    {
        $image = $this->db->get_where('produk_image', ['id_image' => $id])->row_array();
        $path = './assets/product/' . $image['gambar'];
        chmod($path, 0777);
        unlink($path);
        $this->db->delete('produk_image', array('id_image' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Product Image Deleted!
        </div>');
        redirect('admin/detail_product/' . $id_produk);
    }
    // -----------------------
    public function customers()
    {
        $data = $this->data;
        $data['title'] = 'Customers';
        $data['customer'] = $this->m_global->get_customer();
        $this->m_view->set_view_admin('admin/customer/index', $data);
    }
    public function customer_detail($id)
    {
        $data = $this->data;
        $data['title'] = 'Customer Detail';
        $data['customer'] = $this->m_global->get_customerByID($id);
        $data['order'] = $this->m_global->get_all_order($id);
        $this->m_view->set_view_admin('admin/customer/detail', $data);
    }
    // -----------------------
    public function orders()
    {
        $data = $this->data;
        $data['title'] = 'Orders';
        $data['orders'] = $this->m_global->admin_getOrder();
        $this->m_view->set_view_admin('admin/orders/index', $data);
    }
    public function order_detail($id)
    {
        $data = $this->data;
        $data['title'] = 'Order Detail';
        $data['orders'] = $this->m_global->admin_getOrderDetail($id);
        $this->m_view->set_view_admin('admin/orders/detail', $data);
    }
    public function changeStatusPesanan()
    {
        $status_pesanan = $this->input->post('status');
        $id_pesanan = $this->input->post('id');
        $data = [
            'status_pesanan' => $status_pesanan,
        ];
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->update('pesanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Order Status Edited!
        </div>');
        $output = 100;
        echo json_encode($output);
    }
    // --------------------------------------
    public function gallery()
    {
        $data = $this->data;
        $data['title'] = 'Gallery';
        $data['gallery'] = $this->m_global->get_gallery();
        $this->m_view->set_view_admin('admin/gallery/index', $data);
    }
    public function add_image_gallery()
    {
        //cek jika ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = './assets/gallery/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '10000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data_image = [
                    'url' => $this->upload->data('file_name'),
                ];
                $this->db->insert('gallery', $data_image);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Image Added!
                    </div>');
                redirect('admin/gallery/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                An error occured!
                    </div>');
                redirect('admin/gallery/');
            }
        }
    }
    public function delete_image_gallery($id)
    {
        $image = $this->db->get_where('gallery', ['id_gallery' => $id])->row_array();
        $path = './assets/gallery/' . $image['url'];
        chmod($path, 0777);
        unlink($path);
        $this->db->delete('gallery', array('id_gallery' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Image Deleted!
        </div>');
        redirect('admin/gallery/');
    }
    // ----------------------------------------------
    public function inbox()
    {
        $data = $this->data;
        $data['title'] = 'Inbox';
        $data['inbox'] = $this->m_global->get_inbox();
        $this->m_view->set_view_admin('admin/inbox/index', $data);
    }
    public function inbox_detail($id)
    {
        $data = $this->data;
        $data['title'] = 'Inbox Detail';
        $data['inbox'] = $this->m_global->get_inboxByID($id);
        $this->m_view->set_view_admin('admin/inbox/detail', $data);
    }
    // ----------------------------------------------
    public function content()
    {
        $data = $this->data;
        $data['title'] = 'Content Management';
        $this->m_view->set_view_admin('admin/content/index', $data);
    }
    public function add_content($url)
    {
        $data = $this->data;
        $data['title'] = 'Add Content';
        $data['url'] = $url;
        if ($url == 'home') {
            $this->m_view->set_view_admin('admin/content/add_home', $data);
        }
        if ($url == 'about') {
            $this->m_view->set_view_admin('admin/content/add_about', $data);
        }
    }
    public function input_content_home()
    {
        $format = bin2hex(random_bytes(6));
        $data = [
            'id_content' => $format,
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'url' => $this->input->post('url'),
        ];
        $this->db->insert('content', $data);
        //cek jika ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = './assets/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '100000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data_image = [
                    'id_content' => $format,
                    'image' => $this->upload->data('file_name'),
                ];
                $this->db->insert('content_image', $data_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Content Added!
        </div>');
        redirect('admin/content');
    }
    public function delete_content_home($id)
    {
        $image = $this->db->get_where('content_image', ['id_content' => $id])->row_array();
        $path = './assets/gallery/' . $image['image'];
        chmod($path, 0777);
        unlink($path);

        $this->db->delete('content', array('id_content' => $id));
        $this->db->delete('content_image', array('id_content' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Content Deleted!
        </div>');
        redirect('admin/content/');
    }


    public function add_contentAbout_image()
    {
        //cek jika ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = './assets/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '10000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data_image = [
                    'id_content' => $this->input->post('url'),
                    'image' => $this->upload->data('file_name'),
                ];
                $this->db->insert('content_image', $data_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Image Added!
        </div>');
        redirect('admin/content');
    }
    public function delete_image_about($id)
    {
        $image = $this->db->get_where('content_image', ['id_content_image' => $id])->row_array();
        $path = './assets/banner/' . $image['image'];
        chmod($path, 0777);
        unlink($path);
        $this->db->delete('content_image', array('id_content_image' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Image Deleted!
        </div>');
        redirect('admin/content/');
    }

    // ----------------------------------------------
    public function users()
    {
        $data = $this->data;
        $data['title'] = 'User Management';
        $data['users'] = $this->m_global->get_users();
        $data['role'] = $this->m_global->get_role();
        $this->m_view->set_view_admin('admin/users/index', $data);
    }
    public function addUser()
    {
        $user_input = [
            'name' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'user.png',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'country' => "",
            'role_id' => $this->input->post('role_id'),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $user_input);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New User Added!
                </div>');
        redirect('admin/users');
    }
    public function infoUser()
    {
        $id = $this->input->post('id');
        $user = $this->m_global->get_userByID($id);
        $data['user'] = $user;
        $data['image'] = get_user_image($user['id']);
        $data['date_created'] = date('d M, Y', $user['date_created']);
        echo json_encode($data);
    }
    public function validasi_email()
    {
        $email = $this->input->post('email');
        $data = $this->m_global->get_validEmail($email);
        echo json_encode($data);
    }
    public function editUser()
    {
        $id = $this->input->post('user_id');
        $data = [
            'name' => $this->input->post('name'),
            'role_id' => $this->input->post('role_id'),
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        User Edited!
        </div>');
        redirect('admin/users');
    }
    public function deleteUser($id)
    {
        $this->db->delete('user', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        User Deleted!
        </div>');
        redirect('admin/users');
    }

    // ----------------------------------------------

    public function infoAccess()
    {
        $role_id = $this->input->post('role_id');
        $menu = $this->m_global->get_menu();
        $x = 0;
        foreach ($menu as $m) {
            $data['menu_id'][$x] = $m['menu_id'];
            $data['title'][$x] = $m['title'];
            $menuChecked = $this->m_global->get_menu_access($role_id, $m['menu_id']);
            if ($menuChecked) {
                $data['access'][$x] = 1;
            } else {
                $data['access'][$x] = 0;
            }
            $x++;
        }
        $data['loop'] = $x;
        echo json_encode($data);
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $output = 'Data Berhasil Diedit!';
        echo json_encode($output);
    }
    public function addRole()
    {
        $data = [
            'role' => $this->input->post('role'),
        ];
        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        New Role Added!
        </div>');
        redirect('admin/users');
    }

    // ----------------------------------------------

    public function preorder()
    {
        $data = $this->data;
        $data['title'] = 'Pre-Order';
        $data['preorder'] = $this->m_global->get_po();
        $this->m_view->set_view_admin('admin/orders/po/index', $data);
    }
    public function addPO()
    {
        $format = strtoupper(bin2hex(random_bytes(6)));
        $preorder = [
            'id_po' => $format,
            'nama_customer' => $this->input->post('nama_customer'),
            'tanggal_po' => $this->input->post('tanggal_po'),
            'jumlah_po' => $this->input->post('jumlah_po'),
            'modal_po' => $this->input->post('modal_po'),
            'uang_kembali' => $this->input->post('uang_kembali'),
            'total' => $this->input->post('total_po'),
        ];
        $this->db->insert('preorder', $preorder);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Data Added!
                </div>');
        redirect('admin/preorder');
    }
    public function infoPO()
    {
        $id = $this->input->post('id');
        $preorder = $this->m_global->get_preorderByID($id);
        $data['tanggal_po'] = date('d-M-Y', strtotime($preorder['tanggal_po']));
        $data['preorder'] = $preorder;
        echo json_encode($data);
    }
    public function editPO()
    {
        $id = $this->input->post('id_po');
        $data = [
            'nama_customer' => $this->input->post('nama_customer'),
            'tanggal_po' => $this->input->post('tanggal_po'),
            'jumlah_po' => $this->input->post('jumlah_po'),
            'modal_po' => $this->input->post('modal_po'),
            'uang_kembali' => $this->input->post('uang_kembali'),
            'total' => $this->input->post('total_po'),
        ];
        $this->db->where('id_po', $id);
        $this->db->update('preorder', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Pre-Order Has Been Edited!
        </div>');
        redirect('admin/preorder');
    }
    public function deletePO($id)
    {
        $this->db->delete('preorder', array('id_po' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Pre-Order Has Been Deleted!
        </div>');
        redirect('admin/preorder');
    }
}
