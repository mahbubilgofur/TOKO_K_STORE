<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('login');
		}
	}
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/content');
		$this->load->view('admin/footer');
	}
	public function layout()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/content');
		$this->load->view('layout/footer');
	}
}
