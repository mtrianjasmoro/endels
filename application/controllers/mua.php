<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mua extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Produk', '', TRUE);
    }

	public function index($tgl="")
	{
		$tgl=$this->input->post('tgl_booking');
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['mua'] = $this->M_Produk->mua($tgl);
		$data['rekomen'] = $this->M_Produk->penawaran();
		$data['toko'] = $this->M_Produk->toko();
		 
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/mua',$data);
		$this->load->view('template/footer');
	
	}
}
