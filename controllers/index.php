<?php
class index extends CI_Controller{
	// Payment type load
	public function index(){
		$this->load->view("paymentType");
	}
	//Currency load
	public function currency(){
		$this->load->view("currency");
	}
	// Payment load
	public function payment(){
		$this->load->view("payment");
	}
	// Table load
	public function table(){
		$this->load->view("table");
	}
}

