<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Produk', '', TRUE);
    }

	public function index()
	{
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->all_produk();	
		
		$this->load->view('template/header',$data);
		$this->load->view('user/index',$data);
		$this->load->view('template/footer',$data);
	
	}
}
