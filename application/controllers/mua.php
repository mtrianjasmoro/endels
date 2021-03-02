<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mua extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Produk', '', TRUE);
    }

	public function index()
	{
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->all_toko_produk(1);
		$data['toko'] = $this->M_Produk->toko();
		$this->session->set_flashdata('nama', $this->uri->segment('4'));	
		 
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/toko',$data);
		$this->load->view('template/footer');
	
	}
}
