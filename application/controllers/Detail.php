<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('detail/detail');
		$this->load->view('home/footer');
	}
}
