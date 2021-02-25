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

	public function tambah_keranjang(){
		$id_barang = $this->input->post('id_barang');
		$id_user = 1;
		$data=array(
				"id_produk"=>$id_barang,
				"id_user"=>$id_user
			);
			$this->db->insert('keranjang',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil ditambah dikeranjang</div>');
			redirect('Skincare');
	}

	public function bayar(){
		echo "bayar".$this->input->post('id_barang');
	}

	public function detail(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/detail');
		$this->load->view('template/footer');
	}
}
