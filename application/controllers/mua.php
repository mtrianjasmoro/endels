<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mua extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Produk', '', TRUE);
    }

	public function index()
	{
		echo "MUA";
	
	}
}
