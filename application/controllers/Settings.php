<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends My_Controller{

  protected $current_action;

  public function __construct(){
    parent::__construct();
    $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','pagination','user_agent','breadcrumb','encryption'));
    $this->addJs('address.js','custom');
    $this->addJs('https://maps.googleapis.com/maps/api/js?key=AIzaSyCaGEqARP5TKLWI1C4vDfKXnQ4R1bKoe_I&libraries=places&callback=initAutocomplete','external');
  }

  public function index($action){
    $this->load->library('encryption');
    $heading_sufix='Settings';
    $this->data['page_title']='Settings : Basic Settings';
    switch($action){
      case 'basic':
      $this->data['settings']=$this->current_action=$this->encryption->encrypt('basic');
      $this->data['heading']=ucfirst($action).' '.$heading_sufix;
      $this->load->view($this->data['active_theme'].'/admin/settings/basic/add',$this->data);
      break;
      case 'contact':
      $this->data['settings']=$this->current_action=$this->encryption->encrypt('contact');
      $this->data['heading']=ucfirst($action).' '.$heading_sufix;
      $this->load->view($this->data['active_theme'].'/admin/settings/contact/add',$this->data);
      break;
      case 'store':
      $this->data['settings']=$this->current_action=$this->encryption->encrypt('store');
      $this->data['heading']=ucfirst($action).' '.$heading_sufix;
      $this->load->view($this->data['active_theme'].'/admin/settings/store/add',$this->data);
      break;
      default:
        show_404();
        break;
    }
  }

  public function validate_settings(){
    $this->form_validation->set_rules('setting_id','Action',array('required',function($str){
      $action=$this->encryption->decrypt($str);
	  print_r($action);
	  die;
      if($action=='basic' || $action=='store' || $action=='contact'){
        return TRUE;
      }
      return FALSE;
    }));

    if($this->form_validation->run()==TRUE){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function save_settings(){
    if($this->validate_settings()==TRUE){
      print_r($_POST);
    }else{
      redirect($this->agent->referrer());
    }
  }

}
