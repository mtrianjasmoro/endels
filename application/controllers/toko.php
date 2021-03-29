	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Toko extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_toko', '', TRUE);
		}

		public function index()
		{
			redirect('toko/transaksi');
		}

		public function transaksi(){
			$id=1;
			$data['pendapatan']= $this->M_toko->pendapatan($id);
			$data['pendapatan_detail']= $this->M_toko->pendapatan_detail($id);
			$data['penarikan']= $this->M_toko->penarikan($id);
			$data['penarikan_detail']= $this->M_toko->penarikan_detail($id);
			$this->load->view('template/toko_header');
			$this->load->view('toko/saldo',$data);
			$this->load->view('template/toko_footer');
		}

		public function produk(){
			$id=1;
			$data['produk']= $this->M_toko->produk($id);
			$this->load->view('template/toko_header');
			$this->load->view('toko/produk',$data);
			$this->load->view('template/toko_footer');
		}

		public function orderan(){
			$this->load->view('template/toko_header');
			$this->load->view('toko/orderan');
			$this->load->view('template/toko_footer');
		}

		public function tambah_produk(){			
			$this->form_validation->set_rules('nama_produk', 'produk', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
			$this->form_validation->set_rules('harga', 'harga', 'required');
			$this->form_validation->set_rules('jumlah', 'jumlah', 'required');
			$foto1 = $_FILES['foto1']['name'];
			$foto2 = $_FILES['foto2']['name'];
			$foto3 = $_FILES['foto3']['name'];
			$foto4 = $_FILES['foto4']['name'];

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua harus diisi</div>');
				redirect('toko/produk');
			}else{				
				if (!$foto1) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua harus diisi</div>');
					redirect('toko/produk');
				} else {
					if (!$foto2) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua harus diisi</div>');
						redirect('toko/produk');
					} else {
						if (!$foto3) {
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua harus diisi</div>');
							redirect('toko/produk');
						} else {
							if (!$foto4) {
								$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua harus diisi</div>');
								redirect('toko/produk');
							} else {
								for ($i=0; $i <= 4; $i++) { 
								$new_name="toko".$id.date('YmdHis').$i;
								$config['allowed_types'] = 'gif|jpg|png';
								$config['max_size']      = '2048';
								$config['upload_path'] = './asset/mua';
								$config['file_name'] = $new_name;
								$this->load->library('upload', $config);
								echo "ok";
								}
							}
						}
					}
				}
				
			}
		}
	}
