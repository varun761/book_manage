<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="row">
<div class="col-xs-12 col-lg-3 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-lg-9 pull-left">
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
	<h3>Categories</h3>
	<div class="row">
		<div class="col-sm-12">
			<a href="<?=base_url()?>admin/category/add" class="pull-right add_new margin-bottom-10">Add New</a>
		</div>
	</div>
	<div class="row">
		<?php if(!empty($view_data)):?>
			<div class="col-sm-12 total_records">
			<?php echo "Total Categories:".$total_records.'<br>';?>
			</div>
		<?php endif;?>
		<div class="col-sm-12">

<table class="table table-bordered category_table">
<thead>
	<tr>
	<th>Category Name</th>
	<!--<th>Category Slug</th>-->
	<th>Parent Category</th>
	<th>Is Parent</th>
	<th>Created At</th>
	<th>Action</th>
	</tr>
</thead>
<tbody>
<?php if(!empty($view_data)):?>
<?php foreach($view_data as $view_cat){?>
	<tr>
	<td><?=ucfirst($view_cat['category_name'])?></td>
	<!--<td><?php //$view_cat['category_slug']; ?></td>-->
	<td><?php echo ($view_cat['parent_category'])?$view_cat['parent_category']:"<i class='fa fa-times'></i>";?></td>
	<td><?php echo ($view_cat['parent_category'])?"<i class='fa fa-times'></i>":"<i class='fa fa-check'></i>";?></td>
	<td><?=date('d-m-Y h:ia',strtotime($view_cat['created_at']))?></td>
	<td>
		<a href="<?=base_url('admin/category/edit/')?><?=$view_cat['category_id']?>"><i class="fa fa-pencil"></i></a>
		<a href="<?=base_url('admin/category/delete/')?><?=$view_cat['category_id']?>"><i class="fa fa-trash"></i></a>
		<a href="<?=base_url('admin/category/settings/')?><?=$view_cat['category_id']?>"><i class="fa fa-cog"></i></a>
		<a href="<?=base_url('category/')?><?=$view_cat['category_slug']?>/action/viewAll"><i class="fa fa-eye"></i></a>
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
