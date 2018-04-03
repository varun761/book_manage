<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_Model extends CI_Model{
  protected $table_name='visitor_ip';
  protected $primary_key='id';

  public function insert($data){
    if($this->db->insert($this->table_name,$data)){
      return TRUE;
    }else{
      return FALSE;
    }
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
