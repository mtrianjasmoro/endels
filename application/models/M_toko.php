<?php 
defined('BASEPATH') or exit('No direct script access allowed');
// saldo OK

// dasboard
	// jumlah produk yg diterima(belum acc)
	// jumlah produk sedang dikirim
	// jumlah produk yg diiklankan

// produk (progres)
	// tambah 
	// ubah
	// hapus
	// iklan

// penjualan
	// Statiska penjualan

// orderan
	// list orderan
		// terima
		// tolak
		// kirim+no resi

// ubah profile

// ubah passwprd

// pengaturan 
	// nama toko
	// logo toko

class M_toko extends CI_Model
{	
	
	public function pendapatan_detail($id){
		$sql="SELECT bayar.tgl_bayar,user.nama_user,toko.nama_toko,(bayar.bayar-bayar.potongan) As pendapatan FROM ((beli JOIN user ON beli.id_user=user.id_user) JOIN (produk JOIN toko ON produk.id_toko=toko.id_toko) ON beli.id_produk=produk.id_produk) JOIN bayar ON beli.id_bayar=bayar.id_bayar WHERE beli.status='lunas' AND produk.id_toko='$id'";    
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function pendapatan($id){
		$sql = "SELECT SUM(bayar.bayar-bayar.potongan) As pendapatan FROM (beli JOIN (produk JOIN toko ON produk.id_toko=toko.id_toko) ON beli.id_produk=produk.id_produk) JOIN bayar ON beli.id_bayar=bayar.id_bayar WHERE beli.status='lunas' AND produk.id_toko='$id'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function penarikan($id){
		$sql="SELECT id_toko,SUM(jumlah)AS tarik FROM penarikan_toko WHERE status='1' AND id_toko='$id'
";    
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function penarikan_detail($id){
		$sql="SELECT * FROM penarikan_toko JOIN toko ON toko.id_toko=penarikan_toko.id_toko WHERE status='1' AND penarikan_toko.id_toko='$id'
";    
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function produk($id){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_toko',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
}