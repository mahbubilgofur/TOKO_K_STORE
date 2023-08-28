<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Variasiproduk extends CI_Controller
{
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('variasiproduk/viewvariasi');
        $this->load->view('layout/footer');
    }
}
