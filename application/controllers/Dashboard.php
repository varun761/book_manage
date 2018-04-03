<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller{
  protected $Api_needed=false;
	protected $data;

  public function __construct(){
    parent::__construct();
    $this->load->model('Visitor_Model');
  }

  public function index(){
    echo "hi";
  }

}
?>
