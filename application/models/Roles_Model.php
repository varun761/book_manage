<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_Model extends CI_Model{

  protected $table_name="user_role";
  protected $primary_key="role_id";

  public function RolesTable($limit=null,$start=null,$order_col='updated_at',$order_by='DESC'){
		$query=$this->db->select('*')
			->from($this->table_name)
			->order_by($order_col,$order_by)
      ->limit($limit,$start)
			->get()->result_array();
		return $query;
	}

  public function viewRoles($where_array=array(),$not_column=null,$not_in=null,$order_col='created_at',$order_by='DESC',$limit=null,$start=null){
		$query=$this->db->select('*')
			->from($this->table_name)
			->where_not_in($not_column,$not_in)
			->where($where_array)
			->order_by($order_col,$order_by)
      ->limit($limit,$start)
			->get()->result_array();
		return $query;
	}

  public function countRoles(){
		return $this->db->count_all($this->table_name);
	}

  public function insert($data=array()){
    if($this->db->insert($this->table_name,$data)){
			$response=array('status'=>TRUE,'inserted_id'=>$this->db->insert_id());
			return json_encode($response);
		}else{
			$response=array('status'=>FALSE);
			return json_encode($response);
		}
  }

  public function update($id,$data){
		$date=new DateTime();
		$data['updated_at'] = $date->format('YmdHis');
		$this->db->where($this->primary_key,$id);
		if($this->db->update($this->table_name,$data)){
			$response=array('status'=>true);
			return json_encode($response);
		}else{
			$response=array('status'=>false);
			return json_encode($response);
		}
	}

  public function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
		if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
    }
  }
}
 ?>
