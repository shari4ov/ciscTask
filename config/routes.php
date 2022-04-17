<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['currency']='index/currency';
$route['payment']='index/payment';
$route['table']='index/table';
$route['savePaymentType']='savePaymentType';
$route['saveCurrency']='saveCurrency';
$route['savePayment']='savePayment';
$route['fetchData']='fetchData';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
