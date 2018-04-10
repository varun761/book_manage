<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model{

	protected $table_name="shop_cat";
	protected $category_settings_table="shop_cat_settings";
	protected $primary_key="category_id";

	public function __construct(){
		parent::__construct();
	}
	public function CategoryTable($offest,$records,$where_array=array(),$order_col='created_at',$order_by='DESC'){
		$query=$this->db->select('t1.category_id,t1.category_slug,t1.category_description,t1.category_name,t1.created_at as created_at,t2.category_name as parent_category')
		->from('shop_cat as t1')
		->join('shop_cat as t2','t1.parent_id=t2.category_id','left')
		->where($where_array)
		->order_by($order_col,$order_by)
		->limit($offest,$records)->get()->result_array();
		return $query;
	}
	public function CountCategoryTable($where_array=array()){
		$query=$this->db->select('t1.category_id,t1.category_slug,t1.category_description,t1.category_name,t1.created_at as created_at,t2.category_name as parent_category')
		->from('shop_cat as t1')
		->join('shop_cat as t2','t1.parent_id=t2.category_id','left')
		->where($where_array)
		->get()->num_rows();
		return $query;
	}
/*
*Find category by passing
*search parameter
*not in category
*return @array
*/
	public function viewCategory($where_array=array(),$not_in=null,$order_col='created_at',$order_by='DESC'){
		$query=$this->db->select('t1.category_id,t1.category_slug,t1.category_name,t1.category_description,t1.parent_id,t1.created_at as created_at,t2.category_name as parent_category')
			->from('shop_cat as t1')
			->join('shop_cat as t2','t1.parent_id=t2.category_id','left')
			->where_not_in('t1.category_id',$not_in)
			->where_not_in('t1.parent_id',$not_in)
			->where($where_array)
			->order_by($order_col,$order_by)
			->get()->result_array();
		return $query;

	}

	public function findCategory($where_array=array()){
		$query=$this->db->select('*')
			->from($this->table_name)
			->where($where_array)
			->get()->result_array();
		return $query;
	}

	public function get_total_categories(){
		return $this->db->count_all($this->table_name);
	}

	protected function CategoryTree($level=0){
		$response=$this->db->select('category_id,parent_id,category_name,category_slug')
				->where('parent_id',$level)
				->from($this->table_name)
				->get()->result_array();
		$category=array();
		if(count($response)>0){
		foreach($response as $catkey=>$cat){
			$category[$catkey]=$response[$catkey];
			$category[$catkey]['childs']=$this->CategoryTree($cat['category_id']);
		}
		}
		return $category;
	}

	public function CategoryShow(){
		return $this->CategoryTree();
	}

	public function insert($data){
		if($this->db->insert($this->table_name,$data)){
			$response=array('status'=>true,'inserted_id'=>$this->db->insert_id());
			return json_encode($response);
		}else{
			$response=array('status'=>false);
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
			$response=array(
				'status'=>true
			);
		}else{
			$response=array(
				'status'=>false
			);
		}
		$data = array(
			'parent_id'=>0
		);

		$this->db->where('parent_id', $id);
		$this->db->update($this->table_name, $data);
		return json_encode($response);
	}

	public function getCategorySettings($where_array=array()){
		$query=$this->db->select('*')
			->from($this->category_settings_table)
			->where($where_array)
			->get()->result_array();
		return $query;
	}

	public function insertCategorySettings($data){
		if($this->db->insert($this->category_settings_table,$data)){
			$response=array('status'=>true,'inserted_id'=>$this->db->insert_id());
		}else{
			$response=array('status'=>false);
		}
		return $response;
	}

	public function updateCategorySettings($id,$data){
		$this->db->where($this->primary_key,$id);
		if($this->db->update($this->category_settings_table,$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
