<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skincare extends CI_Controller {
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
		$this->load->view('template/sidebar');
		$this->load->view('user/index',$data);
		$this->load->view('template/footer');
	
	}
	public function keranjang(){
		$this->load->view('template/header');
		$this->load->view('user/keranjang');
		$this->load->view('template/footer');
	}

	public function detail(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/detail');
		$this->load->view('template/footer');
	}
}
