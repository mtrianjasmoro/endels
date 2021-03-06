<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_Acara extends CI_Model
{	
	// tampil semua katagori produk
	public function show_acara($id){
		$this->db->select('*');
		$this->db->from('mua_booking');
		$this->db->join('user','user.id_user=mua_booking.id_user');
		$this->db->where('id_mua',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
}