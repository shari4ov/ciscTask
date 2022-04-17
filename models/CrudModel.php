<?php

class CrudModel extends CI_Model{
	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}
	public function get_data($table,$select_column){
		$query=$this->db->select($select_column)
						->from($table)
						->get();
		return $query->result_array();
	}
	public function filter_data($table,$select_column,&$resultList){
		$ids=$this->db
			->select('id')
			->from('currencies')
			->where('name',$_POST['currency'])
			->get()->result_array();
		foreach ($ids as $id){
			$result=$this->db->select($select_column)
				->from($table)
				->where('currency_id',$id['id'])->get()->result_array();
			array_push($resultList,$result[0]);
		}
		return $resultList;
	}
}
