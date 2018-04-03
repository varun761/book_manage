<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor{

  protected $visitor_data=array();
  protected $visitor;
  protected $browser;
  private $CI;

  public function __construct(){
      $this->CI=&get_instance();
      $this->CI->load->model('Visitor_Model');
      $this->CI->load->model('Browser_Model');
      $this->visitor= new Visitor_Model();
      $this->browser= new Browser_Model();
  }

  public function getIp(){
    return $this->CI->input->ip_address();
  }

  public function getBrowser(){
    return $this->CI->input->user_agent();
  }

  public function visitorDetails(){
    $ip=$this->getIp();
    $browser=$this->getBrowser();
    $visitor_data=array(
      'ip_address'=>$ip,
      'visitor_browser'=>$browser
    );
    return $visitor_data;
  }

  public function checkVisitor($visitor_data){
    $response=$this->visitor->find($visitor_data);
    if(!empty($response)){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  public function checkBrowser($browser_data){
    $response=$this->browser->find($browser_data);
    if(!empty($response)){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function updateVisitor(){
    $visitor_data=$this->visitorDetails();
    if(!$this->checkBrowser(array('browser_name'=>$visitor_data['visitor_browser'])))
    {
      $response=$this->browser->insert(array('browser_name'=>$visitor_data['visitor_browser']));
      if($response->status==TRUE){
        $visitor_data['browser_id']=$response->inserted_id;
      }
    }else{

    }
    unset($visitor_data['visitor_browser']);
  if(!$this->checkVisitor($visitor_data))
    {
      $this->visitor->insert($visitor_data);
    }
  }

}
?>
