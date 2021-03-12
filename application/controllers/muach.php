<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muach extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Acara', '', TRUE);
	}

	public function index()
	{
		$id=1;
		$data['orderan']=$this->M_Acara->num_orderan($id);
		$data['jadwal']=$this->M_Acara->num_jadwal($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/dasboard',$data);
		$this->load->view('template/mua_footer');	
	}

	public function jad()
	{
		$id=1;
		$data['events']=$this->M_Acara->show_acara($id);
		$this->load->view('mua/jadwal',$data);	
	}

	public function galery()
	{
		$id=1;
		$data['galery']=$this->M_Acara->galery($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/galery',$data);
		$this->load->view('template/mua_footer');
	}

	public function jadwal()
	{
		$this->load->view('template/mua_header');
		$this->load->view('mua/ja');
		$this->load->view('template/mua_footer');	
	}

	public function saldo()
	{
		$this->load->view('template/mua_header');
		$this->load->view('mua/saldo');
		$this->load->view('template/mua_footer');	
	}

	public function orderan()
	{
		$id=1;
		$data['orderan']=$this->M_Acara->show_orderan($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/orderan',$data);
		$this->load->view('template/mua_footer');	
	}

	public function ubah_profile()
	{
		$id=1;
		$data['profil']=$this->M_Acara->profil_mua($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/edit_profile',$data);
		$this->load->view('template/mua_footer');	
	}

	public function edit_mua($id)
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$provinsi = $this->input->post('provinsi');
		$foto = $_FILES['image']['name'];

		if ($foto) {
			$data['foto']= $this->db->get_where('mua', ['id_mua' => $id])->row_array();
			unlink(FCPATH . 'asset/mua/'.$data['foto']['foto']);
			$new_name1="MUALOGO".$id.date('YmdHis')."1";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '2048';
			$config['upload_path'] = './asset/logo_mua';
			$config['file_name'] = $new_name1;
			$this->db->set('nama_mua', $nama);
			$this->db->set('alamat', $alamat);
			$this->db->set('rt', $rt);
			$this->db->set('rw', $rw);
			$this->db->set('kecamatan', $kecamatan);
			$this->db->set('kabupaten', $kabupaten);
			$this->db->set('provinsi', $provinsi);
			$this->db->set('foto', $new_name1);
			$this->db->where('id_mua', $id);
			$this->db->update('mua');
		}else{
			$this->db->set('nama_mua', $nama);
			$this->db->set('alamat', $alamat);
			$this->db->set('rt', $rt);
			$this->db->set('rw', $rw);
			$this->db->set('kecamatan', $kecamatan);
			$this->db->set('kabupaten', $kabupaten);
			$this->db->set('provinsi', $provinsi);
			$this->db->where('id_mua', $id);
			$this->db->update('mua');
		}		

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil dirubah</div>');

		$data['profil']=$this->M_Acara->profil_mua($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/edit_profile',$data);
		$this->load->view('template/mua_footer');	
	}

	public function edit_mua_pengaturan($id){
		$status = $this->input->post('status');
		$harga = str_replace(".", "", $this->input->post('harga'));
		$data['profil']=$this->M_Acara->profil_mua($id);

		$this->db->set('harga', $harga);
		$this->db->set('buka', $status);
		$this->db->where('id_mua', $id);
		$this->db->update('mua');

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil dirubah</div>');
		$data['profil']=$this->M_Acara->profil_mua($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/pengaturan',$data);
		$this->load->view('template/mua_footer');

	}

	public function pengaturan()
	{
		$id=1;
		$data['profil']=$this->M_Acara->profil_mua($id);
		$this->load->view('template/mua_header');
		$this->load->view('mua/pengaturan',$data);
		$this->load->view('template/mua_footer');	
	}

	public function action_orderan($id,$action=""){
		if ($action == '1') {
			$this->db->where('id_booking', $id);
			$this->db->update('mua_booking', array('acc' => '1' ));
			$this->session->set_flashdata('orderan', '<div class="alert alert-success text-center" role="alert">Berhasil terima orderan</div>');
			redirect('muach/orderan');
		} elseif($action == '2') {
			$this->db->where('id_booking', $id);
			$this->db->update('mua_booking', array('acc' => '2' ));
			$this->session->set_flashdata('orderan', '<div class="alert alert-danger text-center" role="alert">Berhasil tolak orderan</div>');
			redirect('muach/orderan');
		}else{
			echo "no perintah";
		}
		
	}

	public function add_galery(){
		$id=1;
		$judul = $this->input->post('judul');
		$foto1 = $_FILES['foto1']['name'];
		$foto2 = $_FILES['foto2']['name'];
		$foto3 = $_FILES['foto3']['name'];
		
		if ($foto1) {
			$new_name1="MUA".$id.date('YmdHis')."1";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '2048';
			$config['upload_path'] = './asset/mua';
			$config['file_name'] = $new_name1;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload("foto1")) {
				$fot1 = $this->upload->data('file_name'); 
				if ($foto2) {
					$this->load->library('upload', $config);
					if ($this->upload->do_upload("foto2")) {
						$fot2 = $this->upload->data('file_name'); 
						if ($foto3) {
							$this->load->library('upload', $config);
							if ($this->upload->do_upload("foto3")) {
								$fot3 = $this->upload->data('file_name'); 
								$data = [
									'judul' => $judul,
									'foto1' => $fot1,
									'foto2' => $fot2,
									'foto3' => $fot3,
									'id_mua' => $id
								];
								$this->db->insert('mua_galery', $data);
								$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil tambah galery</div>');
								redirect('muach/galery');
							} else {
								$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal upload foto 3</div>');
							}   
						} 
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal upload foto 2</div>');
					}   
				} 
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal upload foto 1</div>');
			}   
		}
	}

	public function hapus_galery($id){
		$data['foto']= $this->db->get_where('mua_galery', ['id_galery' => $id])->row_array();
		unlink(FCPATH . 'asset/mua/'.$data['foto']['foto1']);
		unlink(FCPATH . 'asset/mua/'.$data['foto']['foto2']);
		unlink(FCPATH . 'asset/mua/'.$data['foto']['foto3']);
		$this->db->delete('mua_galery', array('id_galery' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil hapus galery</div>');
		redirect('muach/galery');
	}


}
