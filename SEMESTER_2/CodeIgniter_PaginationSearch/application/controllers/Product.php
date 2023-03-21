<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index($row_no = 0)
    {
        //search text
        $search_text = "";
        if ($this->input->post('submit') != '') {
            $search_text = $this->input->post('search');
            $this->session->set_userdata("search", $search_text);
        } else {
            if ($this->session->userdata('search') != '') {
                $search_text = $this->session->userdata('search');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no !=0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->product_model->get_product_count($search_text);
        $config['base_url'] = base_url() . 'index.php/product/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] =$this->pagination->create_links();

        // Get record
        $data['product'] = $this->product_model->get_product_pagination($row_no, $row_per_page, $search_text);

        $data['row'] = $row_no;

        $data['search'] = $search_text;


        
        // $data['product'] = $this->product_model->get_product();
        $this->load->view('product_view', $data);
    }

    public function add_new()
    {
        $this->load->view('add_product_view');
    }

    public function save()
    {
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $this->product_model->save($product_name, $product_price);
        redirect('product');
    }

    public function get_edit()
    {
        $product_code = $this->uri->segment(3);
        $result = $this->product_model->get_product_id($product_code);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'product_code' => $i['product_code'],
                'product_name' => $i['product_name'],
                'product_price' => $i['product_price']
            );
            $this->load->view('edit_product_view', $data);
        } else {
            echo "data tidak ditemukan";
        }
    }

    public function update()
    {
        $product_code = $this->input->post('product_code');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $this->product_model->update($product_code, $product_name, $product_price);
        redirect('product');
    }

    public function get_delete()
    {
        $product_code = $this->uri->segment(3);
        $result = $this->product_model->get_product_id($product_code);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'product_code' => $i['product_code'],
                'product_name' => $i['product_name'],
                'product_price' => $i['product_price']
            );
            $this->load->view('delete_product_view', $data);
        } else {
            echo "data tidak ditemukan";
        }
    }

    public function delete()
    {
        $product_code = $this->uri->segment(3);
        $this->product_model->delete($product_code);
        redirect('product');
    }
}
