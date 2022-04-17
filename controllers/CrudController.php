<?php

namespace controller;

class CrudController extends \CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("CrudModel");
		$this->load->database();
	}
}
