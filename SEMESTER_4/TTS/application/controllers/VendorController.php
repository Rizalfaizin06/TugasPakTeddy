<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VendorController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
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
        $config['total_rows'] = $this->Vendor_model->get_vendor_count($searchCode, $searchName, $searchPrice);
        $config['base_url'] = base_url() . 'vendorController/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['vendor'] = $this->Vendor_model->get_vendor($row_no, $row_per_page, $searchCode, $searchName, $searchPrice);

        $data['row'] = $row_no;

        $data['searchCode'] = $searchCode;
        $data['searchName'] = $searchName;
        $data['searchPrice'] = $searchPrice;
        $data['totalRow'] = $config['total_rows'];

        $this->load->view('vendor_view', $data);
    }

    public function add_new_vendor()
    {
        // var_dump($this->Vendor_model->get_vendor()->result());
        // var_dump($this->Vendor_model->get_items()->result());
        // var_dump($this->Vendor_model->get_new_inventtransid());
        // var_dump($this->Vendor_model->get_new_purchid());
        // $data['vendor'] = $this->Vendor_model->get_vendor()->result();
        // $data['items'] = $this->Vendor_model->get_items()->result();

        $this->load->view('add_vendor_view');
    }

    public function save_vendor()
    {
        date_default_timezone_set('Asia/Jakarta');

        $NAME = $this->input->post('NAME');
        $ADDRESS = $this->input->post('ADDRESS');
        $PHONE = $this->input->post('PHONE');
        $CREATEDDATETIME = date('Y-m-d');

        if ($this->Vendor_model->save_vendor($NAME, $ADDRESS, $PHONE, $CREATEDDATETIME)) {

            redirect('vendorController');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            redirect('vendorController/add_new_vendor', $data);
        }
    }

    public function get_edit()
    {
        $ACCOUNTNUM = $this->uri->segment(3);
        $result = $this->Vendor_model->get_vendor_id($ACCOUNTNUM);

        if ($result) {
            // $i = $result->row_array();
            $data = array(
                'ACCOUNTNUM' => $result->ACCOUNTNUM,
                'NAME' => $result->NAME,
                'ADDRESS' => $result->ADDRESS,
                'PHONE' => $result->PHONE,

            );
            var_dump($result);
            // var_dump($this->Vendor_model->get_vendor()->result());
            // $data['vendor'] = $this->Vendor_model->get_vendor()->result();
            // $data['items'] = $this->Vendor_model->get_items()->result();
            $this->load->view('edit_vendor_view', $data);
        } else {
            echo "data tidak ditemukan";
        }
    }

    public function update_vendor()
    {
        // $INVENTTRANSID = $this->Vendor_model->get_new_inventtransid();
        // $PURCHID = $this->Vendor_model->get_new_purchid();
        $ACCOUNTNUM = $this->input->post('ACCOUNTNUM');
        $NAME = $this->input->post('NAME');
        $ADDRESS = $this->input->post('ADDRESS');
        $PHONE = $this->input->post('PHONE');
        if ($this->Vendor_model->update_vendor($ACCOUNTNUM, $NAME, $ADDRESS, $PHONE)) {
            redirect('vendorController');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            $this->load->view('edit_vendor_view', $data);
        }

    }

    public function get_delete()
    {
        $ACCOUNTNUM = $this->uri->segment(3);
        $result = $this->Vendor_model->get_vendor_id($ACCOUNTNUM);

        if ($result) {
            // $i = $result->row_array();
            $data = array(
                'ACCOUNTNUM' => $result->ACCOUNTNUM,
                'NAME' => $result->NAME,
                'ADDRESS' => $result->ADDRESS,
                'PHONE' => $result->PHONE,

            );
            var_dump($result);
            // var_dump($this->Vendor_model->get_vendor()->result());
            // $data['vendor'] = $this->Vendor_model->get_vendor()->result();
            // $data['items'] = $this->Vendor_model->get_items()->result();
            $this->load->view('delete_vendor_view', $data);
        }
    }

    public function delete()
    {

        $ACCOUNTNUM = $this->uri->segment(3);
        // var_dump($ACCOUNTNUM);
        // die;
        if ($this->Vendor_model->delete($ACCOUNTNUM)) {

            redirect('vendorController');
        } else {
            redirect('vendorController');

        }
    }
}