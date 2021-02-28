<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_Produk extends CI_Model
{	
	// tampil semua katagori produk
	public function all_katagori(){
		$this->db->select('*');
		$this->db->from('katagori');
		$query = $this->db->get();
		return $query->result_array();
	}

	// tampil semua produk dan katagori
	public function all_produk(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('katagori','katagori.id_katagori=produk.id_katagori');
		$query = $this->db->get();
		return $query->result_array();
	}

	// tampil produk yang ditawarkan
	public function penawaran(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('rekomendasi',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	// tampil katagori yang diingkan
	public function katagori_produk($kat){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_katagori',$kat);
		$query = $this->db->get();
		return $query->result_array();
	}

	// tampil produk dan toko berdasarkan id_produk
	public function toko_produk($id){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('toko','toko.id_toko=produk.id_toko');
		$this->db->where('id_produk',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	// tampil data user sesuai dengan id_user
	public function pembeli($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	// tampil transakasi berdasarkan id user
	public function transaksi($id){
		$this->db->select('*');
		$this->db->from('beli');
		$this->db->join('produk','produk.id_produk=beli.id_produk');
		$this->db->where('id_user',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
}