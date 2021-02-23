<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="row">
<div class="col-xs-12 col-sm-3 col-lg-2 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-sm-9 col-lg-10 pull-left">

	<h3>Add New Category</h3>
	<div class="col-xs-12 padding-0">
			<?php if(validation_errors()!=""){	echo validation_errors();} ?>
		</div>
<?=form_open_multipart('admin/category/add',array('id'=>'category_add'))?>
<div class="image_preview">
	<img id="image_prev" src="#" alt="uploaded image" style="height:100px;width:150px;margin-bottom: 10px;"/>
</div>
<div class="form-group">
	<?=form_label('Category Image :')?>
	<input type="file" name="category_image" id="category_image">
</div>
<div class="form-group">
<?=form_label('Category Name :')?>
<?php $category_data=array(
			'name'=>'cat_name',
			'class'=>'form-control',
			'value'=>set_value('cat_name')
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
		 'value'=>set_value('category_dis')
	 );
?>
<?=form_textarea($category_dis)?>
</div>
<div class="form-group">
<?=form_label('Parent Category :')?>
<select name="child_cat" class="form-control">
	<option value="0">Select Parent Category</option>
	<?php foreach($parent_category as $val):?>
		<option value="<?php echo $val['category_id']?>" <?php if(set_value('child_cat')==$val['category_id']){ echo 'selected';}?>><?php echo $val['category_name']?></option>
	<?php endforeach; ?>
</select>
</div>

<?=form_submit('add','Add New Category','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
