<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes extends CI_Controller
{
    public function index()
    {
        $this->load->view('tes_msg');
    }
}
