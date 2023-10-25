<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('homepesanan/content');
        $this->load->view('home/footer');
    }
}
