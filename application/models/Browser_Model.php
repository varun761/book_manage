<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browser_Model extends CI_Model{
  protected $table_name='visitor_browser';
  protected $primary_key='id';

  public function insert($data){
    $response=new stdclass();
    if($this->db->insert($this->table_name,$data)){
      $response->status=TRUE;
      $response->inserted_id=$this->db->insert_id();
    }else{
      $response->status=FALSE;
    }
    return $response;
  }

  public function find($where){
    $response=$this->db->select('*')
    ->from($this->table_name)
    ->where($where)
    ->get()->result_array();
    return $response;
  }

}
?>
