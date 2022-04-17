<?php
use controller\CrudController;
include_once "CrudController.php";
class SaveCurrency extends CrudController
{
	public function saveCurrency(){
		$data=array(
			'name'=> strtolower($this->input->post("nameCurrency")),
			'full_name'=>strtolower($this->input->post("fullNameCurrency"))
		);
		$this->CrudModel->insert_data('currencies',$data);
		redirect(base_url()."index/currency");
	}
}
