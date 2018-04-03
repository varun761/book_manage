<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends My_Controller{

	protected $data;

	public function __construct(){
		parent::__construct();
		$this->load->helper('form','form_validation');
		$this->load->model('User_Model');
	}

	public function index(){
	
	}

	public function addUsers(){

	}

}

?>
