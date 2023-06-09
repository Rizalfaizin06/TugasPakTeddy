<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purcase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purcase_model');
    }

    public function index($row_no = 0)
    {
        //search text
        $searchPURCHID = "";
        $searchNAME = "";
        $searchTOTAL = "";
        if ($this->input->post('search') != '') {
            $searchPURCHID = $this->input->post('searchPURCHID');
            $searchNAME = $this->input->post('searchNAME');
            $searchTOTAL = $this->input->post('searchTOTAL');
            $this->session->set_userdata("searchPURCHID", $searchPURCHID);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchTOTAL", $searchTOTAL);
        } else {
            if ($this->session->userdata('searchPURCHID') != "") {
                $searchPURCHID = $this->session->userdata('searchPURCHID');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
            }
            if ($this->session->userdata('searchTOTAL') != "") {
                $searchTOTAL = $this->session->userdata('searchTOTAL');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Purcase_model->get_new_purcase_count($searchPURCHID, $searchNAME, $searchTOTAL);
        $config['base_url'] = base_url() . 'purcase/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['purcase'] = $this->Purcase_model->get_new_purcase($row_no, $row_per_page, $searchPURCHID, $searchNAME, $searchTOTAL);

        $data['row'] = $row_no;

        $data['searchPURCHID'] = $searchPURCHID;
        $data['searchNAME'] = $searchNAME;
        $data['searchTOTAL'] = $searchTOTAL;
        $data['totalRow'] = $config['total_rows'];

        $this->load->view('purcase/purcase_view', $data);
    }

    public function add_new_purcase()
    {
        // var_dump($this->Purcase_model->get_vendor()->result());
        // var_dump($this->Purcase_model->get_items()->result());
        // var_dump($this->Purcase_model->get_new_inventtransid());
        // var_dump($this->Purcase_model->get_new_purchid());
        // var_dump($this->Purcase_model->get_checkout()->result());
        $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        $data['items'] = $this->Purcase_model->get_items()->result();

        if ($this->Purcase_model->get_checkout()) {
            $data['checkout'] = $this->Purcase_model->get_checkout()->result();

            $this->load->view('purcase/add_purcasing_view', $data);
        }
        // $this->load->view('add_purcasing_view', $data);
    }

    public function save_purcase()
    {
        // var_dump($this->input->post());

        // die;
        // exit;

        // var_dump($this->input->post());
        $DELIVERYDATE = date("Y-m-d");

        $PURCHID = $this->Purcase_model->get_new_purchid();
        // $INVENTTRANSID = $this->Purcase_model->get_new_inventtransid();

        $ACCOUNTNUM = $this->input->post('ACCOUNTNUM');
        // $ITEMID = $this->input->post('ITEMID');
        // $LINENUM = $this->input->post('LINENUM');
        // $QTYORDERED = $this->input->post('QTYORDERED');
        // $PURCHRECEIVEDNOW = $this->input->post('PURCHRECEIVEDNOW');
        // $PURCHPRICE = $this->input->post('PURCHPRICE');
        // $LINEAMOUNT = $this->input->post('LINEAMOUNT');
        // $DELIVERYDATE = $this->input->post('DELIVERYDATE');
        // $PURCHSTATUS = $this->input->post('PURCHSTATUS');

        // $this->Purcase_model->save_checkout($PURCHID, $ACCOUNTNUM, $DELIVERYDATE, 0, $this->input->post());
        // $this->Purcase_model->update_checkout($this->input->post(), $PURCHID);

        if ($this->Purcase_model->save_checkout($PURCHID, $ACCOUNTNUM, $DELIVERYDATE, 0, $this->input->post())) {

            redirect('purcase/get_edit/' . $PURCHID);
        } else {
            $data['error'] = "Terjadi Kesalahan";
            redirect('purcase/add_new_purcase', $data);

        }

    }

    public function checkout_purcase()
    {
        $this->Purcase_model->delete_checkout();
        // var_dump($this->input->post());
        $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        $data['items'] = $this->Purcase_model->get_items()->result();

        if ($this->Purcase_model->checkout_purcase($this->input->post())) {
            // echo "berhasil";
        }
        // var_dump($this->Purcase_model->get_checkout());
        if ($this->Purcase_model->get_checkout()) {
            $data['checkout'] = $this->Purcase_model->get_checkout()->result();

            $this->load->view('purcase/add_purcasing_view', $data);
        }


    }

    public function get_detail()
    {
        $PURCHID = $this->uri->segment(3);
        $data['purcase'] = $this->Purcase_model->get_purcase_id($PURCHID)->result();

        // var_dump($data['purcase']);
        $this->load->view('purcase/detail_purcasing_view', $data);
        // if ($result) {
        //     // $i = $result->row_array();
        //     // $data = array(
        //     //     'INVENTTRANSID' => $result->INVENTTRANSID,
        //     //     'PURCHID' => $result->PURCHID,
        //     //     'LINENUM' => $result->LINENUM,
        //     //     'ITEMID' => $result->ITEMID,
        //     //     'PURCHPRICE' => $result->PURCHPRICE,
        //     //     'QTYORDERED' => $result->QTYORDERED,
        //     //     'PURCHRECEIVEDNOW' => $result->PURCHRECEIVEDNOW,
        //     //     'LINEAMOUNT' => $result->LINEAMOUNT,
        //     //     'INVOICEACCOUNT' => $result->INVOICEACCOUNT,
        //     //     'DELIVERYDATE' => $result->DELIVERYDATE,
        //     //     'PURCHSTATUS' => $result->PURCHSTATUS,
        //     //     'ACCOUNTNUM' => $result->ACCOUNTNUM,
        //     //     'NAME' => $result->NAME
        //     // );
        //     // var_dump($this->Purcase_model->get_vendor()->result());
        //     $this->load->view('purcase/detail_purcasing_view', $data);
        // } else {
        //     echo "data tidak ditemukan";
        // }
    }

    public function get_edit()
    {
        $PURCHID = $this->uri->segment(3);
        $data['purcase'] = $this->Purcase_model->get_purcase_id($PURCHID)->result();

        // var_dump($data['purcase']);
        $this->load->view('purcase/edit_purcasing_view', $data);
        // $INVENTTRANSID = $this->uri->segment(3);
        // $result = $this->Purcase_model->get_purcase_id($INVENTTRANSID);

        // if ($result) {
        //     // $i = $result->row_array();
        //     $data = array(
        //         'INVENTTRANSID' => $result->INVENTTRANSID,
        //         'PURCHID' => $result->PURCHID,
        //         'LINENUM' => $result->LINENUM,
        //         'ITEMID' => $result->ITEMID,
        //         'PURCHPRICE' => $result->PURCHPRICE,
        //         'QTYORDERED' => $result->QTYORDERED,
        //         'PURCHRECEIVEDNOW' => $result->PURCHRECEIVEDNOW,
        //         'LINEAMOUNT' => $result->LINEAMOUNT,
        //         'INVOICEACCOUNT' => $result->INVOICEACCOUNT,
        //         'DELIVERYDATE' => $result->DELIVERYDATE,
        //         'PURCHSTATUS' => $result->PURCHSTATUS,
        //         'ACCOUNTNUM' => $result->ACCOUNTNUM,
        //         'NAME' => $result->NAME,
        //         'vendor' => $this->Purcase_model->get_vendor()->result(),
        //         'items' => $this->Purcase_model->get_items()->result(),
        //     );
        //     // var_dump($result);
        //     // var_dump($this->Purcase_model->get_vendor()->result());
        //     $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        //     $data['items'] = $this->Purcase_model->get_items()->result();
        //     $this->load->view('edit_purcasing_view', $data);
        // } else {
        //     echo "data tidak ditemukan";
        // }
    }

    public function update_purcase()
    {
        // $INVENTTRANSID = $this->Purcase_model->get_new_inventtransid();
        // $PURCHID = $this->Purcase_model->get_new_purchid();


        // var_dump($this->input->post());
        // $INVENTTRANSID = $this->input->post('INVENTTRANSID');
        // $PURCHID = $this->input->post('PURCHID');
        // $ACCOUNTNUM = $this->input->post('ACCOUNTNUM');
        // $ITEMID = $this->input->post('ITEMID');
        // $LINENUM = $this->input->post('LINENUM');
        // $QTYORDERED = $this->input->post('QTYORDERED');
        // $PURCHRECEIVEDNOW = $this->input->post('PURCHRECEIVEDNOW');
        // $PURCHPRICE = $this->input->post('PURCHPRICE');
        // $LINEAMOUNT = $this->input->post('LINEAMOUNT');
        // $DELIVERYDATE = $this->input->post('DELIVERYDATE');
        // $PURCHSTATUS = $this->input->post('PURCHSTATUS');

        // var_dump($this->Purcase_model->update_purcase($INVENTTRANSID, $PURCHID, $ACCOUNTNUM, $ITEMID, $LINENUM, $QTYORDERED, $PURCHRECEIVEDNOW, $PURCHPRICE, $LINEAMOUNT, $DELIVERYDATE, $PURCHSTATUS));
        // die;
        // exit;




        if ($this->Purcase_model->update_purcase($this->input->post())) {

            redirect('purcase/get_edit/' . $this->input->post('PURCHID'));
        } else {
            $data['error'] = "Terjadi Kesalahan";
            redirect('purcase/edit_purcasing_view', $data);

        }

    }

    public function get_delete()
    {
        $PURCHID = $this->uri->segment(3);
        $data['purcase'] = $this->Purcase_model->get_purcase_id($PURCHID)->result();

        // var_dump($data['purcase']);
        $this->load->view('purcase/delete_purcasing_view', $data);
        // $INVENTTRANSID = $this->uri->segment(3);
        // $result = $this->Purcase_model->get_purcase_id($INVENTTRANSID);

        // if ($result) {
        //     // $i = $result->row_array();
        //     $data = array(
        //         'INVENTTRANSID' => $result->INVENTTRANSID,
        //         'PURCHID' => $result->PURCHID,
        //         'LINENUM' => $result->LINENUM,
        //         'ITEMID' => $result->ITEMID,
        //         'PURCHPRICE' => $result->PURCHPRICE,
        //         'QTYORDERED' => $result->QTYORDERED,
        //         'PURCHRECEIVEDNOW' => $result->PURCHRECEIVEDNOW,
        //         'LINEAMOUNT' => $result->LINEAMOUNT,
        //         'INVOICEACCOUNT' => $result->INVOICEACCOUNT,
        //         'DELIVERYDATE' => $result->DELIVERYDATE,
        //         'PURCHSTATUS' => $result->PURCHSTATUS,
        //         'ACCOUNTNUM' => $result->ACCOUNTNUM,
        //         'NAME' => $result->NAME,
        //         'vendor' => $this->Purcase_model->get_vendor()->result(),
        //         'items' => $this->Purcase_model->get_items()->result(),
        //     );
        //     // var_dump($result);
        //     // var_dump($this->Purcase_model->get_vendor()->result());
        //     $data['vendor'] = $this->Purcase_model->get_vendor()->result();
        //     $data['items'] = $this->Purcase_model->get_items()->result();
        //     $this->load->view('delete_purcasing_view', $data);
        // }
    }

    public function delete()
    {
        $PURCHID = $this->input->post('PURCHID');

        if ($this->Purcase_model->delete($PURCHID)) {

            redirect('purcase');
        } else {

            $data['error'] = "Terjadi Kesalahan";
            $this->load->view('delete_purcasing_view', $data);

        }
    }

    public function pdf()
    {
        $searchPURCHID = "";
        $searchNAME = "";
        $searchTOTAL = "";
        if ($this->input->post('search') != '') {
            $searchPURCHID = $this->input->post('searchPURCHID');
            $searchNAME = $this->input->post('searchNAME');
            $searchTOTAL = $this->input->post('searchTOTAL');
            $this->session->set_userdata("searchPURCHID", $searchPURCHID);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchTOTAL", $searchTOTAL);
        } else {
            if ($this->session->userdata('searchPURCHID') != "") {
                $searchPURCHID = $this->session->userdata('searchPURCHID');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
            }
            if ($this->session->userdata('searchTOTAL') != "") {
                $searchTOTAL = $this->session->userdata('searchTOTAL');
            }
        }

        $this->load->library('pdf');
        $purcase = $this->Purcase_model->get_all_purcase($searchPURCHID, $searchNAME, $searchTOTAL);
        $pdf = new Pdf();
        $pdf->SetTitle('Daftar purcase');
        $pdf->AddPage("P", array(630, 630));

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Daftar purcase', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY(16, 30);
        $pdf->Cell(10, 10, 'No.', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Transaction ID', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Vendor Name', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Address', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Phone', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Line Number', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Item Name', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Item Type', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Item Alias', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Purcase Price', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Quantity Order', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Line Amount', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Purcase Received', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Created', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Delivery', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Purcase Status', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(16, 40);
        $count = 1;
        foreach ($purcase->result() as $row) {
            $pdf->Cell(10, 10, $count, 1, 0, 'C');
            $pdf->Cell(30, 10, $row->INVENTTRANSID, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->NAME, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->ADDRESS, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->PHONE, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->LINENUM, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->ITEMNAME, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->ITEMTYPE, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->NAMEALIAS, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->PURCHPRICE, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->QTYORDERED, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->LINEAMOUNT, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->PURCHRECEIVEDNOW, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->CREATEDDATETIME, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->DELIVERYDATE, 1, 0, 'C');
            $pdf->Cell(40, 10, ($row->PURCHSTATUS == 0) ? "Pending" : "Done", 1, 1, 'C');

            $pdf->SetX(16);
            $count++;
        }
        $totalpurcaseInt = $count - 1;
        $totalpurcaseString = 'Total purcase = ' . $totalpurcaseInt . '    ';
        $pdf->Cell(600, 10, $totalpurcaseString, 1, 0, 'R');

        $pdf->Output('I', 'Daftar purcase.pdf');
    }



    public function excel()
    {
        $searchPURCHID = "";
        $searchNAME = "";
        $searchTOTAL = "";
        if ($this->input->post('search') != '') {
            $searchPURCHID = $this->input->post('searchPURCHID');
            $searchNAME = $this->input->post('searchNAME');
            $searchTOTAL = $this->input->post('searchTOTAL');
            $this->session->set_userdata("searchPURCHID", $searchPURCHID);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchTOTAL", $searchTOTAL);
        } else {
            if ($this->session->userdata('searchPURCHID') != "") {
                $searchPURCHID = $this->session->userdata('searchPURCHID');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
            }
            if ($this->session->userdata('searchTOTAL') != "") {
                $searchTOTAL = $this->session->userdata('searchTOTAL');
            }
        }

        $purcase = $this->Purcase_model->get_all_purcase($searchPURCHID, $searchNAME, $searchTOTAL);

        // Set header untuk membuat file Excel
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Daftar purcase.xls");

        // Tampilkan data ke dalam tabel Excel
        echo "<table>";
        echo "<tr>
        <th>No.</th>
        <th>Transaction ID</th>
        <th>Vendor Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Line Number</th>
        <th>Item Name</th>
        <th>Item Type</th>
        <th>Item Alias</th>
        <th>Purcase Price</th>
        <th>Quantity Order</th>
        <th>Line Amount</th>
        <th>Purcase Received</th>
        <th>Created</th>
        <th>Delivery</th>
        <th>Purcase Status</th>
    </tr></tr>";
        $count = 1;
        foreach ($purcase->result() as $row) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . $count . "</td>";
            echo "<td style='text-align:center;'>" . $row->INVENTTRANSID . "</td>";
            echo "<td style='text-align:center;'>" . $row->NAME . "</td>";
            echo "<td style='text-align:center;'>" . $row->ADDRESS . "</td>";
            echo "<td style='text-align:center;'>" . $row->PHONE . "</td>";
            echo "<td style='text-align:center;'>" . $row->LINENUM . "</td>";
            echo "<td style='text-align:center;'>" . $row->ITEMNAME . "</td>";
            echo "<td style='text-align:center;'>" . $row->ITEMTYPE . "</td>";
            echo "<td style='text-align:center;'>" . $row->NAMEALIAS . "</td>";
            echo "<td style='text-align:center;'>" . "Rp " . number_format($row->PURCHPRICE, 0, ',', '.') . "</td>";
            echo "<td style='text-align:center;'>" . $row->QTYORDERED . "</td>";
            echo "<td style='text-align:center;'>" . $row->LINEAMOUNT . "</td>";
            echo "<td style='text-align:center;'>" . $row->PURCHRECEIVEDNOW . "</td>";
            echo "<td style='text-align:center;'>" . $row->CREATEDDATETIME . "</td>";
            echo "<td style='text-align:center;'>" . $row->DELIVERYDATE . "</td>";
            echo "<td style='text-align:center;'>" . ($row->PURCHSTATUS == 0) ? "Pending" : "Done" . "</td>";
            echo "</tr>";
            $count++;
        }
        $totalpurcaseInt = $count - 1;
        $totalpurcaseString = 'Total purcase = ' . $totalpurcaseInt . '    ';
        echo "<tr><td colspan='16' style='text-align:center;'>" . $totalpurcaseString . "</td></tr>";
        echo "</table>";

    }

}