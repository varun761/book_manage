<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends My_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation','pagination','user_agent'));
    $this->load->helper('form','url');
    $this->load->model('Roles_Model');
  }

  public function index(){
    $this->data['page_title']='Roles';
    $total_records=$this->Roles_Model->countRoles();
    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
    $limit_per_page=5;
    if ($total_records > 0)
        {
			$this->data['role_data']=$this->Roles_Model->RolesTable($limit_per_page,$page);
			$config['base_url'] = base_url().'roles/';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['links'] = $this->pagination->create_links();
		}

    $this->load->view($this->data['active_theme'].'/admin/roles/index',$this->data);
  }
  public function viewForm(){
    $this->data['page_title']='Add Role';
    $this->load->view($this->data['active_theme'].'/admin/roles/add',$this->data);
  }

  public function validateForm(){
    $this->form_validation->set_rules('role_name', 'User Role', 'trim|required|alpha|is_unique[user_role.user_role]',array('is_unique'     => 'This %s already exists.'));
    if ($this->form_validation->run()==FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
  }

  public function addRole(){
    if($this->validateForm()==FALSE){
      $this->viewForm();
    }else{
      $data=array(
        'user_role'=>$this->input->post('role_name')
      );
      $this->addNewRole($data);
      redirect('roles');
    }
  }

  public function addNewRole($data=array()){
    if(!empty($data)){
      foreach($data as $key=>$val){
        $data[$key]=ucfirst($this->cleanInput($val));
      }
    }
    $response=$this->Roles_Model->insert($data);
    $response=json_decode($response);
    if($response->status){
      $this->session->set_flashdata('message','Role Successfully Added');
    }else{
      $this->session->set_flashdata('message','Oops something Went Wrong Adding Role');
    }
  }

  public function cleanInput(string $arg){
		return $this->security->xss_clean($arg);
	}

  public function checkExists(array $arg){
    $response=$this->Roles_Model->viewRoles($arg);
    if(!empty($response)){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function editRoleForm(int $id){
    if($this->checkExists(array('role_id'=>$id))){
      $this->data['page_title']='Edit Roles';
      $this->data['role_data']=$this->Roles_Model->viewRoles(array('role_id'=>$id));
      $this->load->view($this->data['active_theme'].'/admin/roles/edit',$this->data);
    }else{
      $this->session->set_flashdata('error','Role Doesnt exists.');
      redirect('roles');
    }
  }

  public function updateRole(){
    if($this->validateForm()==FALSE){
      $this->session->set_flashdata('error','Oops category cannot updated.');
			redirect($this->agent->referrer());
    }else{
      $edit_id=$this->input->post('edit_id');
  		$update_data=array(
  			'user_role'=>$this->input->post('role_name'),
  		);
      foreach($update_data as $key=>$val){
  			if($val!==null){
  			$args[$key]=$this->cleanInput($val);
  			}
  		}
  		$response=$this->Roles_Model->update($edit_id,$update_data);
  		$response=json_decode($response);
  		if($response->status){
  			$this->session->set_flashdata('message','Role succesfully updated.');
  			redirect('roles');
  		}else{
  			$this->session->set_flashdata('error','Oops role cannot updated.');
  			redirect($this->agent->referrer());
  		}
    }
  }

  public function deleteRole(int $id){
    if($this->checkExists(array('role_id'=>$id))){
      $this->Roles_Model->delete($id);
      $this->session->set_flashdata('message','Role Successfully Deleted');
      redirect('roles');
    }else{
      $this->session->set_flashdata('error','Role Doesnt exists.');
      redirect('roles');
    }
  }

}
?>
