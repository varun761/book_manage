<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="col-xs-12 col-lg-10 col-center padding-0">
<div class="col-xs-12 col-lg-3 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-lg-9 pull-left">
	<h3>User Roles</h3>

	<div class="row">
		<div class="col-sm-12">
			<a href="<?=base_url('admin/role/add')?>" class="pull-right add_new margin-bottom-10">Add New</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
	<?php
		if($this->session->flashdata('message')!=null){
				echo '<div class="alert alert-success">'.$this->session->flashdata('message').'! </div>';
			}
	?>
	<?php
	if($this->session->flashdata('error')!=null){
	echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
	}
	?>
<table class="table table-bordered category_table">
<thead>
	<tr>
	<th>Role Name</th>
	<th>Role Id</th>

	<th>Created At</th>
	<th>Action</th>
	</tr>
</thead>
<tbody>
<?php if(!empty($role_data)):?>
<?php foreach($role_data as $role){?>
	<tr>
	<td><?=ucfirst($role['user_role'])?></td>
	<td><?=$role['role_id']?></td>

	<td><?=date('d-m-Y h:ia',strtotime($role['created_at']))?></td>
	<td>
		<a href="<?=base_url('admin/role/edit/')?><?=$role['role_id']?>"><i class="fa fa-pencil"></i></a>
		<a href="<?=base_url('admin/role/delete/')?><?=$role['role_id']?>"><i class="fa fa-trash"></i></a>
	</td>
	</tr>
<?php } ?>
<?php else:?>
<tr>
	<td colspan="7"><p>No category can match your criteria</p></td>
</tr>
<?php endif;?>
</tbody>
</table>
<?php if (isset($links)) { ?>
                <?=$links?>
            <?php } ?>
					</div>
</div>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
