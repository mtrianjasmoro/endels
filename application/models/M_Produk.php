<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_Produk extends CI_Model
{
	public function all_katagori(){
		$this->db->select('*');
		$this->db->from('katagori');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function all_produk(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('katagori','katagori.id_katagori=produk.id_katagori');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function katagori_produk($kat){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_katagori',$kat);
		$query = $this->db->get();
		return $query->result_array();
	}
}