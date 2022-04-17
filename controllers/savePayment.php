<?php
include_once "CrudController.php";
use controller\CrudController;
class SavePayment extends CrudController
{
	public function savePayment(){
		$dataCurrency=array('name'=>strtolower($this->input->post('currency')));
		$dataType=array('name'=>strtolower($this->input->post('type')));
		$this->db->insert('currencies',$dataCurrency);
		$lastCid=$this->db->insert_id();
		$this->db->insert('payment_types',$dataType);
		$lastTid=$this->db->insert_id();
		$data=array(
			'price'=>$this->input->post("price"),
			'category'=>$this->input->post("category"),
			'review'=>$this->input->post("review"),
			'payment_type_id'=>$lastTid,
			'currency_id'=> $lastCid
		);
		$this->CrudModel->insert_data('payments',$data);
		redirect(base_url()."index/payment");
	}
}
