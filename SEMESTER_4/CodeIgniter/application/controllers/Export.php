<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $this->load->library('pdf');
        $product = $this->product_model->get_all_product();
        $pdf = new Pdf();
        $pdf->SetTitle('Daftar Product');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, 'Daftar Product', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY(16, 30);
        $pdf->Cell(10, 10, 'No.', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Product Code', 1, 0, 'C');
        $pdf->Cell(70, 10, 'Product Name', 1, 0, 'C');
        $pdf->Cell(70, 10, 'Product Price', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(16, 40);
        $count = 1;
        foreach ($product->result() as $row) {
            $pdf->Cell(10, 10, $count, 1, 0, 'C');
            $pdf->Cell(30, 10, $row->product_code, 1, 0, 'C');
            $pdf->Cell(70, 10, $row->product_name, 1, 0, 'C');
            $pdf->Cell(70, 10, "Rp " . number_format($row->product_price, 0, ',', '.'), 1, 1, 'C');
            $pdf->SetX(16);
            $count++;
        }
        $pdf->Cell(180, 10, 'Total Product = ' . $count - 1 . '   ', 1, 0, 'R');

        $pdf->Output('I', 'Daftar Product.pdf');
    }
}