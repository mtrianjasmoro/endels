<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Produk', '', TRUE);
    }

	public function index()
	{
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->all_produk();	
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar_klinik');
		$this->load->view('user/klinik',$data);
		$this->load->view('template/footer');
	
	}

	public function payment()
	{
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->all_produk();	
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar_klinik');
		$this->load->view('user/klinik',$data);
		$this->load->view('template/footer');
	
	}

	public function chat()
	{
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->all_produk();	
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar_klinik');
		$this->load->view('user/chat',$data);
		$this->load->view('template/footer');
	
	}
}
