<?php
use controller\CrudController;
include_once "CrudController.php";
class SavePaymentType extends CrudController
{
	public function saveData(){
		$data=array(
			'name'=>$this->input->post("name")
		);
		$this->CrudModel->insert_data('payment_types',$data);
	}
}
