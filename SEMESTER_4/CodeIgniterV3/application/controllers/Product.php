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
        $searchCode = "";
        $searchName = "";
        $searchPrice = "";
        if ($this->input->post('search') != '') {
            $searchCode = $this->input->post('searchCode');
            $searchName = $this->input->post('searchName');
            $searchPrice = $this->input->post('searchPrice');
            $this->session->set_userdata("searchCode", $searchCode);
            $this->session->set_userdata("searchName", $searchName);
            $this->session->set_userdata("searchPrice", $searchPrice);
        } else {
            if ($this->session->userdata('searchCode') != "") {
                $searchCode = $this->session->userdata('searchCode');
            }
            if ($this->session->userdata('searchName') != "") {
                $searchName = $this->session->userdata('searchName');
            }
            if ($this->session->userdata('searchPrice') != "") {
                $searchPrice = $this->session->userdata('searchPrice');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->product_model->get_product_count($searchCode, $searchName, $searchPrice);
        $config['base_url'] = base_url() . 'product/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['product'] = $this->product_model->get_product($row_no, $row_per_page, $searchCode, $searchName, $searchPrice);

        $data['row'] = $row_no;

        $data['searchCode'] = $searchCode;
        $data['searchName'] = $searchName;
        $data['searchPrice'] = $searchPrice;
        $data['totalRow'] = $config['total_rows'];

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