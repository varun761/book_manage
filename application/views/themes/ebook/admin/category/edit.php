<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="col-xs-12 col-lg-10 col-center padding-0">
<div class="col-xs-12 col-lg-3 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-lg-9 pull-left">

	<h3>Update Category</h3>
	<div class="col-xs-12 padding-0">
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

		</div>
<?=form_open_multipart('admin/category/update',array('id'=>'categoryedit'),array('edit_id'=>$editid))?>
<div class="form-group">
	<?=form_label('Category Image :')?>
	<?php $image_data=array(
				'name'=>'category_image'
			);?>
	<?=form_upload($image_data)?>
</div>
<div class="form-group">
<?=form_label('Category Name :')?>
<?php $category_data=array(
			'name'=>'cat_name',
			'value'=>isset($product[0]['category_name'])?$product[0]['category_name']:'',
			'class'=>'form-control'
		);?>
<?=form_input($category_data);?>
</div>
<div class="form-group">
<?=form_label('Category Description:')?>
<?php $category_dis = array(
		 'name'        => 'category_dis',
		 'class'          => 'form-control',
		 'rows'        => '5',
		 'cols'        => '20',
		 'value'			 =>  isset($product[0]['category_description'])?$product[0]['category_description']:''
	 );
?>
<?=form_textarea($category_dis)?>
</div>
<div class="form-group">
<?=form_label('Parent Category :')?>
<select name="child_cat" class="form-control">
	<option value="0">Select Parent Category</option>
	<?php foreach($parent_category as $val):?>
		<option value="<?=$val['category_id']?>" <?php if(isset($product[0]['parent_id'])){if($product[0]['parent_id']==$val['category_id']){ echo "selected";}}?>><?=$val['category_name']?></option>
	<?php endforeach; ?>
</select>
</div>
<?=form_submit('update','Update Category','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
