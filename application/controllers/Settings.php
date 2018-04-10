<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends My_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','pagination','user_agent','breadcrumb'));
    $this->addCss('signup.css','custom');
		$this->addCss('https://fonts.googleapis.com/css?family=Berkshire+Swash','external');
		$this->addCss('https://fonts.googleapis.com/css?family=Berkshire+Swash','external');
		$this->addJs('jquery.min.js','internal');
		$this->addJs('bootstrap.min.js','internal');
		$this->addJs('jquery-ui.js','internal');
		$this->addJs('cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js');
  }

  public function index(){
    $this->data['page_title']='Settings : Basic Settings';
    $this->load->view($this->data['active_theme'].'/admin/settings/add',$this->data);
  }

}
