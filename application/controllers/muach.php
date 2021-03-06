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
		$data['events']=$this->M_Acara->show_acara($id);
		$this->load->view('mua/index',$data);	
	}

	public function jad()
	{
		$id=1;
		$data['events']=$this->M_Acara->show_acara($id);
		$this->load->view('mua/jadwal',$data);	
	}

		
}
