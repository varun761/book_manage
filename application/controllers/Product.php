<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends My_Controller
{
	protected $parent_id;
	protected $child_id;

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation','pagination'));
	}

	public function add_new_view(){
		$this->data['action_mode']='add';
		$this->data['page_title']='Add Product';
		$this->load->view('back/product/add',$this->data);
	}
	public function add_new_product(){
		$this->data=array(
			'product_sku'=>$this->input->post('pro_sku'),
			'product_name'=>$this->input->post('pro_name'),
			'product_des'=>$this->input->post('product_dis'),
			'product_short_des'=>$this->input->post('product_short_dis'),
			'product_category'=>$this->input->post('product_cat'),
			'pro_cp'=>$this->input->post('pro_cp'),
			'pro_sp'=>$this->input->post('pro_sp'),
			'pro_saleprice'=>$this->input->post('pro_saleprice'),
			'product_sale_start_date'=>$this->input->post('sale_start_date'),
			'product_sale_end_date'=>$this->input->post('sale_end_date'),
			'product_image'=>$this->input->post('product_image')
		);
		$this->data=$this->security->xss_clean($this->data);
		print_r($this->data);
	}
}
?>
