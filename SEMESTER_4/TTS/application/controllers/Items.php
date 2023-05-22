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
        $searchITEMID = "";
        $searchITEMNAME = "";
        $searchNAMEALIAS = "";
        if ($this->input->post('search') != '') {
            $searchITEMID = $this->input->post('searchITEMID');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $searchNAMEALIAS = $this->input->post('searchNAMEALIAS');
            $this->session->set_userdata("searchITEMID", $searchITEMID);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
            $this->session->set_userdata("searchNAMEALIAS", $searchNAMEALIAS);
        } else {
            if ($this->session->userdata('searchITEMID') != "") {
                $searchITEMID = $this->session->userdata('searchITEMID');
            }
            if ($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
            if ($this->session->userdata('searchNAMEALIAS') != "") {
                $searchNAMEALIAS = $this->session->userdata('searchNAMEALIAS');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Items_model->get_items_count($searchITEMID, $searchITEMNAME, $searchNAMEALIAS);
        $config['base_url'] = base_url() . 'items/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['items'] = $this->Items_model->get_items($row_no, $row_per_page, $searchITEMID, $searchITEMNAME, $searchNAMEALIAS);

        $data['row'] = $row_no;

        $data['searchITEMID'] = $searchITEMID;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['searchNAMEALIAS'] = $searchNAMEALIAS;
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

        $ITEMNAME = $this->input->post('ITEMNAME');
        $ITEMTYPE = $this->input->post('ITEMTYPE');
        $NAMEALIAS = $this->input->post('NAMEALIAS');

        if ($this->Items_model->save_items($ITEMNAME, $ITEMTYPE, $NAMEALIAS)) {
            redirect('items');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            redirect('items/add_new_items', $data);
        }
    }

    public function get_edit()
    {
        $ITEMID = $this->uri->segment(3);
        $result = $this->Items_model->get_items_id($ITEMID);

        if ($result) {
            // $i = $result->row_array();
            $data = array(
                'ITEMID' => $result->ITEMID,
                'ITEMNAME' => $result->ITEMNAME,
                'ITEMTYPE' => $result->ITEMTYPE,
                'NAMEALIAS' => $result->NAMEALIAS,

            );
            // var_dump($result);
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
        $ITEMID = $this->input->post('ITEMID');
        $ITEMNAME = $this->input->post('ITEMNAME');
        $ITEMTYPE = $this->input->post('ITEMTYPE');
        $NAMEALIAS = $this->input->post('NAMEALIAS');

        if ($this->Items_model->update_items($ITEMID, $ITEMNAME, $ITEMTYPE, $NAMEALIAS)) {
            redirect('items');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            $this->load->view('update_items_view', $data);

        }


    }

    public function get_delete()
    {
        $ITEMID = $this->uri->segment(3);
        $result = $this->Items_model->get_items_id($ITEMID);

        if ($result) {
            // $i = $result->row_array();
            $data = array(
                'ITEMID' => $result->ITEMID,
                'ITEMNAME' => $result->ITEMNAME,
                'ITEMTYPE' => $result->ITEMTYPE,
                'NAMEALIAS' => $result->NAMEALIAS,

            );
            // var_dump($result);
            // var_dump($this->Items_model->get_items()->result());
            // $data['items'] = $this->Items_model->get_items()->result();
            // $data['items'] = $this->Items_model->get_items()->result();
            $this->load->view('delete_items_view', $data);
        } else {
            echo "data tidak ditemukan";
        }

    }

    public function delete()
    {
        $ITEMID = $this->input->post('ITEMID');
        if ($this->Items_model->delete($ITEMID)) {
            redirect('items');
        } else {
            $data['error'] = "Terjadi Kesalahan";
            $this->load->view('delete_items_view', $data);
        }
    }





    public function pdf()
    {
        $searchITEMID = "";
        $searchITEMNAME = "";
        $searchNAMEALIAS = "";
        if ($this->input->post('search') != '') {
            $searchITEMID = $this->input->post('searchITEMID');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $searchNAMEALIAS = $this->input->post('searchNAMEALIAS');
            $this->session->set_userdata("searchITEMID", $searchITEMID);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
            $this->session->set_userdata("searchNAMEALIAS", $searchNAMEALIAS);
        } else {
            if ($this->session->userdata('searchITEMID') != "") {
                $searchITEMID = $this->session->userdata('searchITEMID');
            }
            if ($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
            if ($this->session->userdata('searchNAMEALIAS') != "") {
                $searchNAMEALIAS = $this->session->userdata('searchNAMEALIAS');
            }
        }

        $this->load->library('pdf');
        $items = $this->Items_model->get_all_items($searchITEMID, $searchITEMNAME, $searchNAMEALIAS);
        $pdf = new Pdf();
        $pdf->SetTitle('Daftar Items');
        $pdf->AddPage("P", array(210, 290));
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Daftar Items', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY(16, 30);
        $pdf->Cell(10, 10, 'No.', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Item ID', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Item Name', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Item Type', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Item Alias', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(16, 40);
        $count = 1;
        foreach ($items->result() as $row) {
            $pdf->Cell(10, 10, $count, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->ITEMID, 1, 0, 'C');
            $pdf->Cell(60, 10, $row->ITEMNAME, 1, 0, 'C');
            $pdf->Cell(30, 10, $row->ITEMTYPE, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->NAMEALIAS, 1, 1, 'C');


            $pdf->SetX(16);
            $count++;
        }
        $totalitemsInt = $count - 1;
        $totalitemsString = 'Total items = ' . $totalitemsInt . '    ';
        $pdf->Cell(180, 10, $totalitemsString, 1, 0, 'R');

        $pdf->Output('I', 'Daftar items.pdf');
    }



    public function excel()
    {
        $items = $this->Items_model->get_all_items();

        // Set header untuk membuat file Excel
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Daftar items.xls");

        // Tampilkan data ke dalam tabel Excel
        echo "<table>";
        echo "<tr>
        <th>No.</th>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Item Type</th>
        <th>Item Alias</th>
    </tr></tr>";
        $count = 1;
        foreach ($items->result() as $row) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . $count . "</td>";
            echo "<td style='text-align:center;'>" . $row->ITEMID . "</td>";
            echo "<td style='text-align:center;'>" . $row->ITEMNAME . "</td>";
            echo "<td style='text-align:center;'>" . $row->ITEMTYPE . "</td>";
            echo "<td style='text-align:center;'>" . $row->NAMEALIAS . "</td>";

            echo "</tr>";
            $count++;
        }
        $totalitemsInt = $count - 1;
        $totalitemsString = 'Total items = ' . $totalitemsInt . '    ';
        echo "<tr><td colspan='5' style='text-align:center;'>" . $totalitemsString . "</td></tr>";
        echo "</table>";

    }



}