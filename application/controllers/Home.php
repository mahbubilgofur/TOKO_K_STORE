<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function construct()
	{
		$this->load->library('config'); // Load library konfigurasi (jika belum dilakukan)

		$data['config_value'] = $this->config->item('config_item', 'config_group');
		$this->load->view('home', $data);
	}
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('home/content');
		$this->load->view('home/footer');
	}
}
