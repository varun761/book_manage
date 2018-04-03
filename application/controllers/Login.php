<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller{

	protected $login_data=array();

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','pagination','user_agent'));
		$this->load->model('Category_Model');
		$this->addCss('https://fonts.googleapis.com/css?family=Berkshire+Swash','external');
		$this->addCss('https://fonts.googleapis.com/css?family=Berkshire+Swash','external');
		$this->addCss('signup.css','custom');
		$this->addJs('jquery.min.js','internal');
		$this->addJs('bootstrap.min.js','internal');
		//$this->addJs('additional-methods.min.js','internal');
		$this->addJs('jquery-ui.js','internal');

		$this->addJs('http://cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js','external');
		$this->addJs('login.js','custom');
  }

	public function index(){
		$this->data['page_title']='Login';
		if($this->validateLogin()==FALSE){
		$this->load->view($this->data['active_theme'].'/admin/login/index',$this->data);
	}else{
		$this->login_data=array(
			'pass_name'=>$this->input->post('username'),
			'pass_key'=>$this->input->post('password')
		);
		$this->proceedLogin();
	}
	}

	public function validateLogin(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function proceedLogin(){
		if(!empty($this->login_data)){

		}


	}

	public function checkValid(){

	}

}
?>
