<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purcase_model');
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
        $config['total_rows'] = $this->Purcase_model->get_purcase_count($searchCode, $searchName, $searchPrice);
        $config['base_url'] = base_url() . 'purcase/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['purcase'] = $this->Purcase_model->get_purcase($row_no, $row_per_page, $searchCode, $searchName, $searchPrice);

        $data['row'] = $row_no;

        $data['searchCode'] = $searchCode;
        $data['searchName'] = $searchName;
        $data['searchPrice'] = $searchPrice;
        $data['totalRow'] = $config['total_rows'];

        $this->load->view('purcase_view', $data);
    }

    public function add_new_purcase()
    {
        // var_dump($this->Purcase_model->get_vendor()->result());
        // var_dump($this->Purcase_model->get_items()->result());
        var_dump($this->Purcase_model->get_new_inventtransid());
        var_dump($this->Purcase_model->get_new_purchid());
        $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        $data['items'] = $this->Purcase_model->get_items()->result();

        $this->load->view('add_purcasing_view', $data);
    }

    public function add_new_vendor()
    {
        // var_dump($this->Purcase_model->get_vendor()->result());
        // var_dump($this->Purcase_model->get_items()->result());
        var_dump($this->Purcase_model->get_new_inventtransid());
        var_dump($this->Purcase_model->get_new_purchid());
        $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        $data['items'] = $this->Purcase_model->get_items()->result();

        $this->load->view('add_vendor_view', $data);
    }

    public function add_new_items()
    {
        // var_dump($this->Purcase_model->get_vendor()->result());
        // var_dump($this->Purcase_model->get_items()->result());
        var_dump($this->Purcase_model->get_new_inventtransid());
        var_dump($this->Purcase_model->get_new_purchid());
        $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        $data['items'] = $this->Purcase_model->get_items()->result();

        $this->load->view('add_items_view', $data);
    }

    public function save_purcase()
    {
        $INVENTTRANSID = $this->Purcase_model->get_new_inventtransid();
        $PURCHID = $this->Purcase_model->get_new_purchid();
        $ACCOUNTNUM = $this->input->post('ACCOUNTNUM');
        $ITEMID = $this->input->post('ITEMID');
        $LINENUM = $this->input->post('LINENUM');
        $QTYORDERED = $this->input->post('QTYORDERED');
        $PURCHRECEIVEDNOW = $this->input->post('PURCHRECEIVEDNOW');
        $PURCHPRICE = $this->input->post('PURCHPRICE');
        $LINEAMOUNT = $this->input->post('LINEAMOUNT');
        $DELIVERYDATE = $this->input->post('DELIVERYDATE');
        $PURCHSTATUS = $this->input->post('PURCHSTATUS');

        if ($this->Purcase_model->save_purcase($INVENTTRANSID, $PURCHID, $ACCOUNTNUM, $ITEMID, $LINENUM, $QTYORDERED, $PURCHRECEIVEDNOW, $PURCHPRICE, $LINEAMOUNT, $DELIVERYDATE, $PURCHSTATUS)) {

            redirect('purcase');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            redirect('purcase/add_new_purcase', $data);

        }

    }

    public function get_edit()
    {
        $purcase_code = $this->uri->segment(3);
        $result = $this->Purcase_model->get_purcase_id($purcase_code);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'purcase_code' => $i['purcase_code'],
                'purcase_name' => $i['purcase_name'],
                'purcase_price' => $i['purcase_price']
            );
            $this->load->view('edit_purcase_view', $data);
        } else {
            echo "data tidak ditemukan";
        }
    }

    public function update()
    {
        $purcase_code = $this->input->post('purcase_code');
        $purcase_name = $this->input->post('purcase_name');
        $purcase_price = $this->input->post('purcase_price');
        $this->Purcase_model->update($purcase_code, $purcase_name, $purcase_price);
        redirect('purcase');
    }

    public function get_delete()
    {
        $purcase_code = $this->uri->segment(3);
        $result = $this->Purcase_model->get_purcase_id($purcase_code);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'purcase_code' => $i['purcase_code'],
                'purcase_name' => $i['purcase_name'],
                'purcase_price' => $i['purcase_price']
            );
            $this->load->view('delete_purcase_view', $data);
        } else {
            echo "data tidak ditemukan";
        }
    }

    public function delete()
    {
        $purcase_code = $this->uri->segment(3);
        $this->Purcase_model->delete($purcase_code);
        redirect('purcase');
    }
}