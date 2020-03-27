<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends My_Controller{

	protected $title;
	protected $description;
	protected $data;
	protected $category_breads=array();
	protected $category_crumbs=array();
	protected $category_admin='admin/category';
	protected $category_front='category/action/viewAll';

	public static $model;

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','pagination','user_agent','breadcrumb'));
		$this->load->model('Category_Model');
		$this->category=new Category_Model();
		self::$model=&$this->category;
		$this->addJs('category_image.js','custom');
		//$this->output->enable_profiler(TRUE);

	}


	public function admincategoryData($url='category/',$segment=2,$limit_per_page=5,$where_array=array(),$sort_order=null,$order_by=null){
		$total_records=$this->category->CountCategoryTable($where_array);
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
		if ($total_records > 0)
        {
			$this->data['view_data']=$this->category->CategoryTable($limit_per_page,$page,$where_array,$sort_order,$order_by);
			$config['base_url'] = base_url().$url;
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = $segment;
			$config['full_tag_open']='<ul class="pagination">';
			$config['full_tag_close']='</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$this->data['links'] = $this->pagination->create_links();
		}
		return $this->data;
	}

	protected function generateBread($where_array=array()){
		$category_data=$this->category->findCategory($where_array);

		if(!empty($category_data)){
			array_push($this->category_breads,$category_data[0]['category_name']);
			if($category_data[0]['parent_id']!==0){
					$this->generateBread($where_array=array('category_id'=>$category_data[0]['parent_id']));
			}
		}

		return $this->category_breads;
	}

	protected function generateCrumbs($category_breads=array()){
		foreach($this->category_breads as $val){
			$category=$this->category->findCategory($where_array=array('category_name'=>$val));
			array_push($this->category_crumbs,$category[0]['category_slug']);
		}
		return $this->category_crumbs;
	}

	/*
	Generate Category Breadcrumbs
	@function
	@where_array=array(
	'category_id'=>'category_id_value',
	'category_name'=>'category_name',
	'category_slug'=>'category_slug'
	);
	*/
	public function generateBreadCrumbs($where_array=array()){
		$this->category_breads=array_reverse($this->generateBread($where_array));
		$this->category_crumbs=$this->generateCrumbs($this->category_breads);
		$bread_crumbs=array_combine($this->category_crumbs,$this->category_breads);
		return $bread_crumbs;
	}

	public function storeView($parent=0){
		if($parent==null){
			$where_array=array('t1.parent_id'=>$parent);
			$url=$this->category_front;
			$segment=4;
			$this->data['category_description']=null;
			$this->data['category_name']='Categories';
			//$this->breadcrumb->add('Categories', base_url('category/action/viewAll'));
		}else{
			$where=array('category_slug'=>$parent);
			if(self::categoryExists($where)==TRUE){
				$category_data=$this->category->findCategory($where=array('category_slug'=>$parent));
				$category_id=$category_data[0]['category_id'];
				$where_array=array('t1.parent_id'=>$category_id);
				$url='category/'.$parent.'/action/viewAll';
				$segment=5;
				$this->data['meta_keywords']=($this->getMetaKeyword($category_id)!=null)?$this->getMetaKeyword($category_id):$category_data[0]['category_name'];
				$this->data['meta_description']=$this->getMetaDescription($category_id);
				$this->data['show_description']="";
				$this->data['category_name']=$category_data[0]['category_name'];
				$this->data['category_description']=$category_data[0]['category_description'];
				$this->breadcrumb->add('Categories', base_url($this->category_front));
				$category_bread=$this->generateBreadCrumbs($where=array('category_slug'=>$parent));
				foreach($category_bread as $key=>$val){
					$category_url='category/'.$key.'/action/viewAll';
					$this->breadcrumb->add($val, base_url($category_url));
				}
			}
		}
		$this->data=$this->admincategoryData($url,$segment,$limit_per_page=10,$where_array,$sort_order='category_name',$order_by='ASC');
		$this->data['total_records']=$this->category->CountCategoryTable($where_array);
		$this->data['breadcrumb']=$this->breadcrumb->render();
		$this->data['page_title']='All Categories';
		$this->load->view($this->data['active_theme'].'/category',$this->data);
	}

	public function admin_view(){
		$this->data=$this->admincategoryData($this->category_admin,$segment=3,$limit_per_page=10,$where_array=array(),$sort_order='created_at',$order_by='DESC');
		$this->data['total_records']=$this->category->CountCategoryTable();
		$this->data['page_title']='View All Category';
		$this->load->view($this->data['active_theme'].'/admin/category/index',$this->data);
	}


	public function categorySettings($id){
		$this->load->library('encryption');
		$where=array(
			'category_id'=>$id
		);
		if(self::categoryExists($where)){
		$category=$this->category->findCategory($where);
		if(!empty($category)){
			$this->data['verification_id']=$this->encryption->encrypt($category[0]['category_id']);
			$this->data['page_heading']=$this->data['page_title']='Category Settings: '.$category[0]['category_name'];
			if(!empty($category_settings=$this->category->getCategorySettings($where))){
				$this->data['category_settings']=unserialize($category_settings[0]['settings']);
				$this->load->view($this->data['active_theme'].'/admin/category/settings/edit',$this->data);
			}else{
				$this->load->view($this->data['active_theme'].'/admin/category/settings/add',$this->data);
			}
		}
	}else{
		$this->session->set_flashdata('error',"OOPs! Category Doesn't Exists.");
		redirect('admin/category');
	}

	}

	public function settingsValidation(){
		$this->load->library('encryption');
		$this->form_validation->set_rules('cat_keywords', 'lang:Meta Keywords', 'trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('category_metadis', 'lang:Meta Description', 'trim|max_length[250]|alpha_numeric_spaces');
		$this->form_validation->set_rules('choice', 'lang:Show Subcategory or Products?','required|numeric|in_list[0,1,2]');
		$this->form_validation->set_rules('verify', 'lang:No Product Id',array('required',function($str){
				if(!self::categoryExists(array('category_id'=>$this->encryption->decrypt($str)))){
						return FALSE;
					}else{
						return TRUE;
						}
			}));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function saveSettings(){
		$this->load->library('encryption');
		if($this->settingsValidation()==TRUE){
			if($this->input->post('cat_metakey')!=null){
				$cat_meta=rtrim(implode(',',explode(PHP_EOL,$this->input->post('cat_metakey'))),',');
			}
			$category_settings=array(
				'cat_metakey'=>($this->input->post('cat_metakey')!=null)?$this->removeTags($cat_meta):$this->input->post('cat_metakey'),
				'cat_metadis'=>($this->input->post('category_metadis')!=null)?$this->removeTags($this->input->post('category_metadis')):$this->input->post('category_metadis'),
				'choice'=>$this->input->post('choice'),
				'show_description'=>$this->input->post('showdis')
			);

			foreach($category_settings as $key=>$val){
				if($val!==null){
				$category_settings[$key]=$this->cleanInput($val);
				}
			}
			if(!empty($this->category->getCategorySettings(array('category_id'=>$this->encryption->decrypt($this->input->post('verify')))))) {
				$category_id=$this->encryption->decrypt($this->input->post('verify'));
				$data=array('settings'=>serialize($category_settings));
				$response=$this->category->updateCategorySettings($category_id,$data);
				if($response){
					$this->session->set_flashdata('message','Category Settings Successfully Updated');
				}else{
					$this->session->set_flashdata('message','Something Went Wrong While Updating Your Data');
				}
			}else{
				$final_settings=array(
						'category_id'=>$this->encryption->decrypt($this->input->post('verify')),
						'settings'=>serialize($category_settings)
				);
				$response=$this->category->insertCategorySettings($final_settings);

				if($response['status']){
					$this->session->set_flashdata('message','Category Settings Successfully Saved');
				}else{
					$this->session->set_flashdata('message','Something Went Wrong While Saving Your Data');
				}
			}
     redirect('admin/category/settings/'.$this->encryption->decrypt($this->input->post('verify')));

		}else{
			redirect('admin/category');
		}
	}

	public function addCategoryform(){
		$this->data['parent_category']=$this->category->viewCategory($where_array=array(),$not_in=null,$order_col='category_name',$order_by='ASC');
		$this->data['page_title']='Add Category';
		if ($this->validatecategory() == FALSE){
			$this->load->view($this->data['active_theme'].'/admin/category/add',$this->data);
		}else{
			$input_array=array(
				'category_name'=>$this->input->post('cat_name'),
				'category_description'=>$this->input->post('category_dis'),
				'parent_id'=>$this->input->post('child_cat')
			);
			$this->add_category($input_array);
		}
	}

	public function add_category($args){
		foreach($args as $key=>$val){
			if($val!==null){
			$args[$key]=$this->cleanInput($val);
			}
		}
			$args['category_name']=ucfirst($this->removeTags($args['category_name']));
			$args['category_slug']=$this->categorySlug($args['category_name']);
			if(self::categoryExists($where=array('category_name'=>$args['category_name'])) && self::categoryExists($where=array('category_slug'=>$args['category_slug']))){
				$this->session->set_flashdata('error',$args['category_name'].'This category already exists');
				redirect('category/add');
			}
			$response=$this->uploadCatimage();
			print_r($response);
			die;
			if($response['status']=='success'){

			}else{

			}

			$response=$this->category->insert($args);
			$response=json_decode($response);
			if($response->status){
				$this->session->set_flashdata('inserted_id',$response->inserted_id);
				$this->session->set_flashdata('message','Category Successfully Added');
				redirect('admin/category');
			}else{
				redirect('category/add');
			}
	}

	public static function categoryExists($where=array(),$data_type=null){
		$result=self::$model->findCategory($where);
		if(!empty($result)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function categorySlug($category_slug){
		$category_slug=$this->removeTags($category_slug);
		$category_slug=trim($category_slug);
		$category_slug=strtolower($category_slug);
		$category_slug=preg_replace('/[^A-Za-z0-9- ]/','',$category_slug);
		$category_slug=(explode(' ',$category_slug));
		foreach($category_slug as $key=>$val){
			if($val==null){
				unset($category_slug[$key]);
			}
		}
		$category_slug=implode('-',$category_slug);
		return $category_slug;
	}

	public function cleanInput(string $arg){
		return $this->security->xss_clean($arg);
	}

	public function removeTags(string $args){
		return strip_tags($args);
	}

	public function uploadCatimage($field_name='category_image'){
		$imagename=time().$_FILES[$field_name]['name'];
		$image_config['file_name']= $imagename;
		$image_config['upload_path']= './uploads/category/';
		$image_config['allowed_types']= 'jpg|png';
		$image_config['max_size'] = 2048;
		$image_config['encrypt_name']= TRUE;
		$image_config['remove_spaces']= TRUE;
		$this->load->library('upload', $image_config);
		if(!$this->upload->do_upload($field_name))
		{
			$response = array('status'=>'error','data' => $this->upload->display_errors());
		}else{
			$upload_data=$this->upload->data();
			$resize_config['image_library'] = 'gd2';
			$resize_config['source_image'] = $upload_data['full_path'];
			$resize_config['create_thumb'] = TRUE;
			$resize_config['maintain_ratio'] = TRUE;
			$resize_config['width']         = 237;
			$resize_config['height']       = 237;
			$this->load->library('image_lib', $resize_config);
			$this->image_lib->resize();
			$response= array('status'=>'success','data' => $upload_data);
		}
		return $response;
	}

	public function deleteCategory($id){
		$where=array(
			'category_id'=>$id
		);
		if(self::categoryExists($where)){
			$response=$this->category->delete($id);
			$response=json_decode($response);
			if($response->status){
				$this->session->set_flashdata('status',$response->status);
				$this->session->set_flashdata('message','Category Successfully Deleted');
			}else{
				$this->session->set_flashdata('error','OOPs Something Went Wrong');
			}
		}else{
			$this->session->set_flashdata('error','OOPs! You are trying to access non accessable category');
		}
		redirect('admin/category');
	}

	public function editCategoryform($id){
		$this->data['editid']=$id;
		$where=array(
			'category_id'=>$id
		);
		if(!self::categoryExists($where)){
			$this->session->set_flashdata('error','OOPs! You are trying to access non accessable category');
			redirect('admin/category');
		}
		$this->data['product']=$this->category->viewCategory($where_array=array('t1.category_id'=>$id));
		$this->data['parent_category']=$this->category->viewCategory($where_array=array(),$not_in=$id,$order_col='category_name',$order_by='ASC');
		$this->data['page_title']='Update Category';
		$this->load->view($this->data['active_theme'].'/admin/category/edit',$this->data);
	}
	/*
	Validate the category form data
	*/
	public function validatecategory(){
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required|min_length[2]|is_unique[shop_cat.category_name]',array('is_unique'     => 'This %s already exists.'));
		$this->form_validation->set_rules('category_dis', 'Category Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('child_cat', 'Parent Category','numeric|callback_validate_parent');
		$this->form_validation->set_rules('category_image','Category Image','numeric|callback_validate_image');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function validate_parent(){
		if($_POST['child_cat']==0){
			return TRUE;
		}
		if(self::categoryExists($where=array('category_id'=>$_POST['child_cat']))==FALSE){
			$this->form_validation->set_message('validate_category_child', 'The child category does not exists');
			return FALSE;
		}
		return TRUE;
	}
	
	public function validate_image(){
		if(isset($_FILES['category_image']['size']) && $_FILES['category_image']['size']/1000000>2){
			$this->form_validation->set_message('validate_image', 'The category image should not be greater than 2MB');
    	return FALSE;
		}else{
			return TRUE;
		}
	}

	public function editValidation(){
		$response=new stdclass();
		$this->form_validation->set_rules('cat_name', 'lang:Category Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('category_dis', 'lang:Category Description', 'trim|max_length[250]');
		$this->form_validation->set_rules('child_cat', 'lang:Parent Category','required|numeric');
		if ($this->form_validation->run() == FALSE){
			$response->status=FALSE;
			$response->errors=validation_errors();
		}else{
			$response->status=TRUE;
		}
		return $response;
	}

	public function updateCategory(){
	$response=$this->editValidation();
	if($response->status==FALSE){
			$this->session->set_flashdata('error',$response->errors);
			redirect($this->agent->referrer());
		}
		$edit_id=$this->input->post('edit_id');
		$update_data=array(
			'category_name'=>$this->input->post('cat_name'),
			'category_description'=>$this->input->post('category_dis'),
			'parent_id'=>$this->input->post('child_cat')
		);
		foreach($update_data as $key=>$val){
			if($val!==null){
			$args[$key]=$this->cleanInput($val);
			}
		}
		$update_data['category_name']=ucfirst($this->removeTags($this->input->post('cat_name')));
		$update_data['category_description']=$this->removeTags($this->input->post('category_dis'));
		$update_data['category_slug']=$this->categorySlug($this->input->post('cat_name'));
		$update_data['parent_id']=$this->input->post('child_cat');
		$response=$this->category->update($edit_id,$update_data);
		$response=json_decode($response);
		if($response->status){
			$this->session->set_flashdata('message','Category succesfully updated.');
			redirect('admin/category');
		}else{
			$this->session->set_flashdata('error','Oops category cannot updated.');
			redirect($this->agent->referrer());
		}
	}

	protected function getSettings(int $category_id,string $setting_name){
		$where_array=array(
			'category_id'=>$category_id
		);
		$category_settings=$this->category->getCategorySettings($where_array);
		if(empty($category_settings)){
			return;
		}

		$settings=unserialize($category_settings[0]['settings']);

		if(!isset($setting_name)){
			return $settings;
		}
		if(array_key_exists($setting_name,$settings)){
			return $settings[$setting_name];
		}else{
			return;
		}
	}

	public function getMetaKeyword(int $category_id){
		$category_meta="Online Store, New Arrivals";
		$category_meta=$this->getSettings($category_id,'cat_metakey');
		return $category_meta;
	}
	public function getMetaDescription(int $category_id){
		$category_description="This is the online Product shop";
	  $category_description=$this->getSettings($category_id,'cat_metadis');
		return $category_description;
	}
	public function handleCategory(){
	 if($this->input->post('search_string')!==null){
		 $result=$this->category->SearchCategory($this->input->post('search_string'));
		 echo json_encode($result);
	 }else{
		 http_response_code(403);
	 }
	}
}
?>
