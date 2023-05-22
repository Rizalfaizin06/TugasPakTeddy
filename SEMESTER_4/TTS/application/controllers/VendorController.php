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
        $searchACCOUNTNUM = "";
        $searchNAME = "";
        $searchADDRESS = "";
        if ($this->input->post('search') != '') {
            $searchACCOUNTNUM = $this->input->post('searchACCOUNTNUM');
            $searchNAME = $this->input->post('searchNAME');
            $searchADDRESS = $this->input->post('searchADDRESS');
            $this->session->set_userdata("searchACCOUNTNUM", $searchACCOUNTNUM);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchADDRESS", $searchADDRESS);
        } else {
            if ($this->session->userdata('searchACCOUNTNUM') != "") {
                $searchACCOUNTNUM = $this->session->userdata('searchACCOUNTNUM');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
            }
            if ($this->session->userdata('searchADDRESS') != "") {
                $searchADDRESS = $this->session->userdata('searchADDRESS');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Vendor_model->get_vendor_count($searchACCOUNTNUM, $searchNAME, $searchADDRESS);
        $config['base_url'] = base_url() . 'vendorController/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['vendor'] = $this->Vendor_model->get_vendor($row_no, $row_per_page, $searchACCOUNTNUM, $searchNAME, $searchADDRESS);

        $data['row'] = $row_no;

        $data['searchACCOUNTNUM'] = $searchACCOUNTNUM;
        $data['searchNAME'] = $searchNAME;
        $data['searchADDRESS'] = $searchADDRESS;
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
            // var_dump($result);
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
            // var_dump($result);
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






    public function pdf()
    {
        $searchACCOUNTNUM = "";
        $searchNAME = "";
        $searchADDRESS = "";
        if ($this->input->post('search') != '') {
            $searchACCOUNTNUM = $this->input->post('searchACCOUNTNUM');
            $searchNAME = $this->input->post('searchNAME');
            $searchADDRESS = $this->input->post('searchADDRESS');
            $this->session->set_userdata("searchACCOUNTNUM", $searchACCOUNTNUM);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchADDRESS", $searchADDRESS);
        } else {
            if ($this->session->userdata('searchACCOUNTNUM') != "") {
                $searchACCOUNTNUM = $this->session->userdata('searchACCOUNTNUM');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
            }
            if ($this->session->userdata('searchADDRESS') != "") {
                $searchADDRESS = $this->session->userdata('searchADDRESS');
            }
        }

        $this->load->library('pdf');
        $vendor = $this->Vendor_model->get_all_vendor($searchACCOUNTNUM, $searchNAME, $searchADDRESS);
        $pdf = new Pdf();
        $pdf->SetTitle('Daftar Vendor');
        $pdf->AddPage("P", array(310, 390));
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Daftar Vendor', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY(16, 30);
        $pdf->Cell(10, 10, 'No.', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Account Number', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Vendor Name', 1, 0, 'C');
        $pdf->Cell(90, 10, 'Address', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Phone', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Created', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(16, 40);
        $count = 1;
        foreach ($vendor->result() as $row) {
            $pdf->Cell(10, 10, $count, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->ACCOUNTNUM, 1, 0, 'C');
            $pdf->Cell(60, 10, $row->NAME, 1, 0, 'C');
            $pdf->Cell(90, 10, $row->ADDRESS, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->PHONE, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->CREATEDDATETIME, 1, 1, 'C');


            $pdf->SetX(16);
            $count++;
        }
        $totalvendorInt = $count - 1;
        $totalvendorString = 'Total Vendor = ' . $totalvendorInt . '    ';
        $pdf->Cell(280, 10, $totalvendorString, 1, 0, 'R');

        $pdf->Output('I', 'Daftar Vendor.pdf');
    }



    public function excel()
    {
        $searchACCOUNTNUM = "";
        $searchNAME = "";
        $searchADDRESS = "";
        if ($this->input->post('search') != '') {
            $searchACCOUNTNUM = $this->input->post('searchACCOUNTNUM');
            $searchNAME = $this->input->post('searchNAME');
            $searchADDRESS = $this->input->post('searchADDRESS');
            $this->session->set_userdata("searchACCOUNTNUM", $searchACCOUNTNUM);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchADDRESS", $searchADDRESS);
        } else {
            if ($this->session->userdata('searchACCOUNTNUM') != "") {
                $searchACCOUNTNUM = $this->session->userdata('searchACCOUNTNUM');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
            }
            if ($this->session->userdata('searchADDRESS') != "") {
                $searchADDRESS = $this->session->userdata('searchADDRESS');
            }
        }
        $vendor = $this->Vendor_model->get_all_vendor($searchACCOUNTNUM, $searchNAME, $searchADDRESS);

        // Set header untuk membuat file Excel
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Daftar vendor.xls");

        // Tampilkan data ke dalam tabel Excel
        echo "<table>";
        echo "<tr>
        <th>No.</th>
        <th>Account Number</th>
        <th>Vendor Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Created</th>
    </tr></tr>";
        $count = 1;
        foreach ($vendor->result() as $row) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . $count . "</td>";
            echo "<td style='text-align:center;'>" . $row->ACCOUNTNUM . "</td>";
            echo "<td style='text-align:center;'>" . $row->NAME . "</td>";
            echo "<td style='text-align:center;'>" . $row->ADDRESS . "</td>";
            echo "<td style='text-align:center;'>" . $row->PHONE . "</td>";
            echo "<td style='text-align:center;'>" . $row->CREATEDDATETIME . "</td>";

            echo "</tr>";
            $count++;
        }
        $totalvendorInt = $count - 1;
        $totalvendorString = 'Total vendor = ' . $totalvendorInt . '    ';
        echo "<tr><td colspan='6' style='text-align:center;'>" . $totalvendorString . "</td></tr>";
        echo "</table>";

    }

}