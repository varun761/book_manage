<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="col-xs-12 col-lg-10 col-center padding-0">
<div class="col-xs-12 col-lg-3 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-lg-9 pull-left">
<h3>Edit Role</h3>
<?php
	if($this->session->flashdata('message')!=null){
			echo '<div class="alert alert-success">'.$this->session->flashdata('message').'! </div>';
		}
?>
<?php
if($this->session->flashdata('error')!=null){
echo '<div class="alert alert-warning">'.$this->session->flashdata('error').'</div>';
}
?>
<?php if(validation_errors()!=""){	echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
<?=form_open_multipart('admin/role/update',array('id'=>'role_form'),array('edit_id'=>$role_data[0]['role_id']))?>
<div class="form-group">
<?=form_label('Role Name :')?>
<?php $role=array(
			'name'=>'role_name',
			'value'=>$role_data[0]['user_role'],
			'class'=>'form-control'
		);?>
<?=form_input($role);?>
</div>
<?=form_submit('update','Update Role','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
