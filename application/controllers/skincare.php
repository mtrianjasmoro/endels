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
		$data['rekomen'] = $this->M_Produk->penawaran();
		$data['toko'] = $this->M_Produk->toko();	
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('template/footer');

	}
	// list keranjang
	public function keranjang(){
		$id=1;
		$data['bayar'] = $this->M_Produk->keranjang($id);
		$this->load->view('template/header');
		$this->load->view('user/keranjang',$data);
		$this->load->view('template/footer');
	}

	// tambah barang keranjang
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

	// form pembelian
	public function bayar(){
		$id_barang = $this->input->post('id_barang');
		$id_user = 1;
		$data['toko'] = $this->M_Produk->toko_produk($id_barang);
		$data['pembeli'] = $this->M_Produk->pembeli($id_user);

		$this->load->view('template/header');
		$this->load->view('user/bayar',$data);
		$this->load->view('template/footer');
	}

	public function detail(){
		$data['toko'] = $this->M_Produk->toko();

		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/detail');
		$this->load->view('template/footer');
	}

	// tambah pembelian
	public function beli(){
		date_default_timezone_set('Asia/Jakarta');
		$id_barang = $this->input->post('id_barang');
		$id_user = $this->input->post('id_user');
		$tgl_beli = date('Y-m-d H:i:s');
		$toleransi =1;
		$tgl_dateline = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($tgl_beli)));
		$banyak = $this->input->post('banyak');
		$total_harga = str_replace(".", "", $this->input->post('total_harga'));
		$kurir = $this->input->post('kurir');
		$paket = $this->input->post('paket');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$provinsi = $this->input->post('provinsi');

		
		$data = [
			'id_produk' => $id_barang,
			'id_user' => $id_user,
			'tgl_beli' => $tgl_beli,
			'tgl_dateline' => $tgl_dateline,
			'banyak' => $banyak,
			'total_harga' => $total_harga,
			'kurir' => $kurir,
			'paket' => $paket,
			'alamat' => $alamat,
			'rt' => $rt,
			'rw' => $rw,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'provinsi' => $provinsi
		];
		$this->db->insert('beli', $data);
		redirect('skincare/transaksi');
	}

	public function transaksi(){		
		$id_user = 1;
		$data['transaksi'] = $this->M_Produk->transaksi($id_user);
		$this->load->view('template/header');
		$this->load->view('user/pembayaran',$data);
		$this->load->view('template/footer');
	}

	public function toko($id){
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->all_toko_produk($id);
		$data['toko'] = $this->M_Produk->toko();
		$this->session->set_flashdata('nama', $this->uri->segment('4'));	
		 
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/toko',$data);
		$this->load->view('template/footer');
	}

	public function rekomendasi(){
		$id=1;
		$this->session->set_flashdata('nama','Rekomendasi'); 
		$data['katagori'] = $this->M_Produk->all_katagori();
		$data['produk'] = $this->M_Produk->rekomendasi($id);
		$data['toko'] = $this->M_Produk->toko();	
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/toko',$data);
		$this->load->view('template/footer');
	}

	public function upload_bayar(){
		date_default_timezone_set('Asia/Jakarta');
		$id_user=1;
		$id_tran = $this->input->post('id_tran');
		$tgl_bayar = date('Y-m-d H:i:s');
		$bayar =45000;
		$new_name="Bukti".$id_user.date('YmdHis');
		$id_bayar="";
		$img = $_FILES['image']['name'];

		$data['transaksi'] =  $this->db->get_where('beli', ['id_beli' => $id_tran])->row_array();

		if ($data['transaksi']['id_bayar'] == 0) {
			if ($img) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './asset/bukti';
				$config['file_name'] = $new_name;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload("image")) {
					$bukti = $this->upload->data('file_name');              	
					$data = [
						'tgl_bayar' => $tgl_bayar,
						'bayar' => $bayar,
						'bukti' => $bukti
					];
					$this->db->insert('bayar', $data); 

					$this->db->set('id_bayar', $this->db->insert_id());
					$this->db->set('status', "menunggu");
					$this->db->where('id_beli', $id_tran);
					$this->db->update('beli');

					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil upload bukti pembayaran</div>');

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal upload bukti pembayaran</div>');
				}   
			}
		} else {
			if ($img) {
				$id_bayar = $data['transaksi']['id_bayar'];
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './asset/bukti';
				$config['file_name'] = $new_name;

				$data['bukti']= $this->db->get_where('bayar', ['id_bayar' => $id_bayar])->row_array();

				$this->load->library('upload', $config);
				if ($this->upload->do_upload("image")) {
						unlink(FCPATH . 'asset/bukti/'.$data['bukti']['bukti']);
					$bukti = $this->upload->data('file_name');

					$this->db->set('bukti', $bukti);
					$this->db->where('id_bayar', $id_bayar);
					$this->db->update('bayar'); 

					$this->db->set('status', "menunggu");
					$this->db->where('id_beli', $id_tran);
					$this->db->update('beli');  

					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil upload bukti pembayaran</div>');             	
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal upload bukti pembayaran</div>');
				}   
			}
		}	
		redirect('skincare/transaksi');	
	}
}
