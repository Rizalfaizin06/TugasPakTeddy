<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Items_model');
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
        $config['total_rows'] = $this->Items_model->get_items_count($searchCode, $searchName, $searchPrice);
        $config['base_url'] = base_url() . 'items/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['items'] = $this->Items_model->get_items($row_no, $row_per_page, $searchCode, $searchName, $searchPrice);

        $data['row'] = $row_no;

        $data['searchCode'] = $searchCode;
        $data['searchName'] = $searchName;
        $data['searchPrice'] = $searchPrice;
        $data['totalRow'] = $config['total_rows'];

        $this->load->view('items_view', $data);
    }

    public function add_new_items()
    {
        // var_dump($this->Items_model->get_items()->result());
        // var_dump($this->Items_model->get_items()->result());
        // var_dump($this->Items_model->get_new_inventtransid());
        // var_dump($this->Items_model->get_new_purchid());
        // $data['items'] = $this->Items_model->get_items()->result();
        // $data['items'] = $this->Items_model->get_items()->result();

        $this->load->view('add_items_view');
    }

    public function save_items()
    {
        date_default_timezone_set('Asia/Jakarta');

        $NAME = $this->input->post('NAME');
        $ADDRESS = $this->input->post('ADDRESS');
        $PHONE = $this->input->post('PHONE');
        $CREATEDDATETIME = date('Y-m-d');

        if ($this->Items_model->save_items($NAME, $ADDRESS, $PHONE, $CREATEDDATETIME)) {

            redirect('items');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            redirect('items/add_new_items', $data);
        }
    }

    public function get_edit()
    {
        $ACCOUNTNUM = $this->uri->segment(3);
        $result = $this->Items_model->get_items_id($ACCOUNTNUM);

        if ($result) {
            // $i = $result->row_array();
            $data = array(
                'ACCOUNTNUM' => $result->ACCOUNTNUM,
                'NAME' => $result->NAME,
                'ADDRESS' => $result->ADDRESS,
                'PHONE' => $result->PHONE,

            );
            var_dump($result);
            // var_dump($this->Items_model->get_items()->result());
            // $data['items'] = $this->Items_model->get_items()->result();
            // $data['items'] = $this->Items_model->get_items()->result();
            $this->load->view('edit_items_view', $data);
        } else {
            echo "data tidak ditemukan";
        }
    }

    public function update_items()
    {
        // $INVENTTRANSID = $this->Items_model->get_new_inventtransid();
        // $PURCHID = $this->Items_model->get_new_purchid();
        $ACCOUNTNUM = $this->input->post('ACCOUNTNUM');
        $NAME = $this->input->post('NAME');
        $ADDRESS = $this->input->post('ADDRESS');
        $PHONE = $this->input->post('PHONE');
        if ($this->Items_model->update_items($ACCOUNTNUM, $NAME, $ADDRESS, $PHONE)) {
            redirect('items');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            $this->load->view('edit_items_view', $data);
        }

    }

    public function get_delete()
    {
        $ACCOUNTNUM = $this->uri->segment(3);
        $result = $this->Items_model->get_items_id($ACCOUNTNUM);

        if ($result) {
            // $i = $result->row_array();
            $data = array(
                'ACCOUNTNUM' => $result->ACCOUNTNUM,
                'NAME' => $result->NAME,
                'ADDRESS' => $result->ADDRESS,
                'PHONE' => $result->PHONE,

            );
            var_dump($result);
            // var_dump($this->Items_model->get_items()->result());
            // $data['items'] = $this->Items_model->get_items()->result();
            // $data['items'] = $this->Items_model->get_items()->result();
            $this->load->view('delete_items_view', $data);
        }
    }

    public function delete()
    {

        $ACCOUNTNUM = $this->uri->segment(3);
        // var_dump($ACCOUNTNUM);
        // die;
        if ($this->Items_model->delete($ACCOUNTNUM)) {

            redirect('items');
        } else {
            redirect('items');

        }
    }
}