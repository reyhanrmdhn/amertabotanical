<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
        $data['title'] = 'Product';
        $data['produk'] = $this->m_global->get_product();
        $data['css'] = '<link rel="stylesheet" href="' .  base_url('vendor/template/') . 'css/product-details.css">';

        $data['carts'] = $this->cart->contents();
        $data['total_cart'] = $this->cart->total();

        $this->m_view->set_view('home/product/index', $data);
    }
    public function detail($id)
    {
        $data = $this->data;
        $data['image'] = $this->m_global->get_image($id)->result_array();
        $data['produk'] = $this->m_global->get_product_detail($id);
        $data['title'] = $data['produk']['nama_produk'];
        $data['all_produk'] = $this->m_global->get_product();
        $data['rating_num'] = $this->m_global->get_rating($id)->num_rows();
        $data['rating'] = $this->m_global->get_rating($id)->result_array();
        $data['css'] = '<link rel="stylesheet" href="' .  base_url('vendor/template/') . 'css/product-details.css">';

        $data['carts'] = $this->cart->contents();
        $data['total_cart'] = $this->cart->total();
        $this->m_view->set_view('home/product/detail', $data);
    }

    public function cart_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'add_item':
                $id = $this->input->post('id');
                $qty = $this->input->post('qty');
                $name = $this->input->post('name');
                $price = $this->input->post('price');
                $image = get_product_image($id);

                $item = array(
                    'id' => $id,
                    'qty' => $qty,
                    'price' => $price,
                    'name' => $name,
                    'image' => $image
                );
                $this->cart->insert($item);
                $total_item = count($this->cart->contents());

                $response = array(
                    'code' => 200,
                    'message' => 'Item dimasukkan dalam keranjang',
                    'total_item' => $total_item,
                    'carts' => $this->cart->contents()
                );

                break;

            case 'display_cart':
                $carts = [];
                foreach ($this->cart->contents() as $items) {
                    $carts[$items['rowid']]['id'] = $items['id'];
                    $carts[$items['rowid']]['name'] = $items['name'];
                    $carts[$items['rowid']]['qty'] = $items['qty'];
                    $carts[$items['rowid']]['price'] = $items['price'];
                    $carts[$items['rowid']]['subtotal'] = $items['subtotal'];
                }
                $response = array(
                    'code' => 200,
                    'carts' => $carts
                );
                break;

            case 'cart_info':
                $total_price = $this->cart->total();
                $total_item = count($this->cart->contents());

                $data['total_price'] = $total_price;
                $data['total_item'] = $total_item;

                $response['data'] = $data;
                $response['carts'] = $this->cart->contents();
                break;

            case 'remove_item':
                $rowid = $this->input->post('rowid');
                $this->cart->remove($rowid);

                $total_price = $this->cart->total();
                $total_item = count($this->cart->contents());

                $data['code'] = 204;
                $data['message'] = 'Item dihapus dari keranjang';
                $data['total_item'] = $total_item;
                $response = $data;
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function checkout()
    {
        $id = $this->uri->segment(3);
        if ($id) {
            if ($this->session->userdata('email')) {
                $order = $this->m_global->get_order($id);
                if ($order) {
                    $data = $this->data;
                    $data['title'] = 'Checkout';
                    $data['css'] = '<link rel="stylesheet" href="' . base_url('vendor/template/') . 'css/checkout.css">';
                    $data['carts'] = $this->cart->contents();
                    $data['total_cart'] = $this->cart->total();
                    $data['order'] = $order;
                    $this->m_view->set_view('home/product/checkout', $data);
                } else {
                    redirect('home');
                }
            } else {
                redirect('home');
            }
        } else {
            redirect('home');
        }
    }

    public function order()
    {
        $id = $this->uri->segment(3);
        if ($id) {
            if ($this->session->userdata('email')) {
                $order = $this->m_global->get_order($id);
                if ($order) {
                    $data = $this->data;
                    $data['title'] = 'Order Detail';
                    $data['css'] = '<link rel="stylesheet" href="' . base_url('vendor/template/') . 'css/orderlist.css">';
                    $data['carts'] = $this->cart->contents();
                    $data['total_cart'] = $this->cart->total();
                    $data['order'] = $order;
                    $this->m_view->set_view('home/product/order', $data);
                } else {
                    redirect('home');
                }
            } else {
                redirect('home');
            }
        } else {
            redirect('home');
        }
    }


    public function proceed_order()
    {
        if ($this->session->userdata('email')) {
            $format = strtoupper(bin2hex(random_bytes(6)));
            $temp = count($this->input->post('id_produk'));
            $total_pesanan = 0;
            for ($i = 0; $i < $temp; $i++) {
                $id_produk = $this->input->post('id_produk');
                $qty = $this->input->post('qty');
                $price = $this->input->post('price');
                $total_pesanan = $total_pesanan + (intval($qty[$i]) * intval($price[$i]));

                $data_detail[] = array(
                    'id_pesanan' => $format,
                    'id_produk' => $id_produk[$i],
                    'qty' => $qty[$i],
                    'harga_item' => $price[$i],
                );
                $this->db->insert('pesanan_detail', $data_detail[$i]);
            }
            $data_pesanan = [
                'id_pesanan' => $format,
                'id_user' => $this->session->userdata('id'),
                'tanggal_pesanan' => time(),
                'total_pesanan' => $total_pesanan,
                'status_pesanan' => 0,
            ];
            $this->db->insert('pesanan', $data_pesanan);
            $this->cart->destroy();
            redirect('product/checkout/' . $format);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-2" style="border-radius:5px" role="alert">
               You have to login first!
                </div>');
            redirect('auth');
        }
    }

    public function proceed_checkout()
    {
        $id = $this->input->post('id_pesanan');
        $data = [
            'status_pesanan' => 1,
            'contact_number' => $this->input->post('contact_number'),
            'contact_address' => $this->input->post('contact_address'),
        ];
        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" style="border-radius:5px" role="alert">
        Checkout Success!
        </div>');
        redirect('product/order/' . $id);
    }

    public function cancel_order()
    {
        $id = $this->input->post('id_pesanan');
        $this->db->delete('pesanan', array('id_pesanan' => $id));
        $response = 100;
        echo json_encode($response);
    }

    public function add_payment()
    {
        $id_pesanan = $this->input->post('id_pesanan');
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path']   = './assets/img/bukti_tf/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']      = '10000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data_image = [
                    'id_pesanan' => $id_pesanan,
                    'bukti_tf' => $this->upload->data('file_name'),
                    'date_added' => time(),
                ];
                $this->db->insert('pesanan_bukti_tf', $data_image);
                $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" style="border-radius:5px" role="alert">
                Transfer Evidence is added!
                    </div>');
                redirect('product/order/' . $id_pesanan);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mb-3 py-3" style="border-radius:5px" role="alert">
                An error occured!
                    </div>');
                redirect('product/order/' . $id_pesanan);
            }
        }
    }

    public function add_review()
    {
        $data = [
            'id_produk' => $this->input->post('id_produk'),
            'id_user' => $this->input->post('id_user'),
            'rating' => $this->input->post('rating'),
            'review' => $this->input->post('review'),
            'tanggal_review' => time(),
        ];
        $this->db->insert('produk_review', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mb-3 py-3" style="border-radius:5px" role="alert">
        Add Review Succeed!
        </div>');
        redirect('product/detail/' . $this->input->post('id_produk'));
    }
}
