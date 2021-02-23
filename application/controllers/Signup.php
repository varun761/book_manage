<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends My_Controller{

	protected $signup_data=array();

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','pagination','user_agent'));
		//$this->addJs('additional-methods.min.js','internal');
		$this->addJs('jquery-ui.js','internal');
		$this->addJs('http://cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js','external');
		$this->addJs('https://www.google.com/recaptcha/api.js','external');
  }

	public function index(){
		$this->data['page_title']='oDummy Store | Signup';
		if($this->validate()==FALSE){
			$this->load->view($this->data['active_theme'].'/admin/signup/index',$this->data);
		}else{
			$this->signup_data=array(
			'username'=>$this->input->post('username'),
			'firstname'=>$this->input->post('fname'),
			'lastname'=>$this->input->post('lname'),
			'email'=>$this->input->post('email'),
			'pass_key'=>$this->input->post('password')
			);
			$this->proceedSignup();
		}
	}

	public function validate(){
		$this->form_validation->set_rules('fname', 'First Name', 'required',array('required'=>'First name is required'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array('required'=>'Email is required'));
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]',array('required'=>'Username is required','min-length'=>'Username must be atleast of 5 characters','max-length'=>'Username must not be contains character more than 12','is_unique'=>'Username is exists'));
		$this->form_validation->set_rules('password', 'Password', 'required',array('required'=>'Password is required'));
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]',array('required'=>'Confirm password is required','matches'=>'Confirm password not matched'));
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function proceedLogin(){
		
	}

	public function checkValid(){

	}

}
?>
