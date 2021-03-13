<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_Acara extends CI_Model
{	
	
	public function show_acara($id){
		$this->db->select('*');
		$this->db->from('mua_booking');
		$this->db->join('user','user.id_user=mua_booking.id_user');
		$this->db->where('id_mua',$id);
		$this->db->where('acc','1');
		$this->db->where_not_in('id_bayar','0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function show_orderan($id){
		$this->db->select('*');
		$this->db->from('mua_booking');
		$this->db->join('user','user.id_user=mua_booking.id_user');
		$this->db->where('id_mua',$id);
		$this->db->where('acc','0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function num_orderan($id){
		$this->db->select('*');
		$this->db->from('mua_booking');
		$this->db->join('user','user.id_user=mua_booking.id_user');
		$this->db->where('id_mua',$id);
		$this->db->where('acc','0');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function num_jadwal($id){
		$this->db->select('*');
		$this->db->from('mua_booking');
		$this->db->join('user','user.id_user=mua_booking.id_user');
		$this->db->where('id_mua',$id);
		$this->db->where('acc','1');		
		$this->db->where_not_in('id_bayar','0');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function galery($id){
		$this->db->select('*');
		$this->db->from('mua');
		$this->db->join('mua_galery','mua_galery.id_mua=mua.id_mua');
		$this->db->where('mua.id_mua',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function profil_mua($id){
		$this->db->select('*');
		$this->db->from('mua');
		$this->db->where('id_mua',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function pendapatan($id){
		$sql="SELECT mua_booking.id_mua, SUM(bayar.bayar-bayar.potongan) as total FROM mua_booking JOIN bayar ON mua_booking.id_bayar=bayar.id_bayar WHERE mua_booking.id_mua='$id'
";    
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function pendapatan_detail($id){
		$sql="SELECT mua.nama_mua, mua_booking.id_bayar, user.nama_user, bayar.tgl_bayar,(bayar.bayar-bayar.potongan) as total FROM mua_booking JOIN mua ON mua_booking.id_mua=mua.id_mua JOIN user ON user.id_user=mua_booking.id_user JOIN bayar ON mua_booking.id_bayar=bayar.id_bayar WHERE mua_booking.id_mua='$id'

";    
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function penarikan($id){
		$sql="SELECT id_mua,SUM(jumlah)AS tarik FROM penarikan_mua WHERE status=1 AND id_mua='$id'
";    
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function penarikan_detail($id){
		$sql="SELECT * FROM penarikan_mua JOIN mua ON mua.id_mua=penarikan_mua.id_mua WHERE status=1 AND penarikan_mua.id_mua='$id'
";    
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}