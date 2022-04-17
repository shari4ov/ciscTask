<?php
include_once "CrudController.php";
use controller\CrudController;
class FetchData extends CrudController
{
	private $table='payments';
	private $select_column=array("price","category","review","currency_id");
	public function fetch_data(){
		$resultList=array();
		$datas=array();
		if(isset($_POST['currency'])){
			$this->CrudModel->filter_data($this->table,$this->select_column,$resultList);
		}
		else{
			$resultList=$this->CrudModel->get_data($this->table,$this->select_column);
		}
		$currency=$this->db
			->select('name')
			->from('currencies')
			->join('payments','currency_id=currencies.id')
			->get()
			->result_array();
		$i=0;
		foreach ($resultList as $array){
			$datas[]=array(
				"review"=>$array['review'],
				"withdrawal"=>$array['category']=='Məxaric' ? $array['price']:'',
				"cashin"=>$array['category']=='Mədaxil' ? $array['price'] : '',
				"currency"=> $currency[$i]['name']
			);
			$i++;
		}
		$json_data["data"]=$datas;
		echo json_encode($json_data);
	}
	public function fetch_currency(){
		$table='currencies';
		$select_column=array("name");
		$resultList=$this->CrudModel->get_data($table,$select_column);
		echo json_encode($resultList);
	}
}
