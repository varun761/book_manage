<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php if(validation_errors()!=""){	echo validation_errors();} ?>
		</div>
<div class="col-xs-12 col-sm-3 col-lg-2 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-lg-9 col-lg-10 pull-left">

	<h3><?=$heading?></h3>

<?=form_open_multipart('admin/settings/basic/save',array('id'=>'category_add'))?>
<div class="form-group">
	<?=form_label('Logo :')?>
	<input type="file" name="website_image" id="website_image">
</div>
<div class="form-group">
	<?=form_label('Favicon :')?>
	<input type="file" name="website_fab" id="website_fab">
</div>
<div class="form-group">
<?=form_label('Website Name :')?>
<?php $website_name=array(
			'name'=>'website_name',
			'class'=>'form-control',
			'value'=>set_value('website_name')
		);?>
<?=form_input($website_name);?>
</div>
<div class="form-group">
<?=form_label('Website Tagline:')?>
<?php $website_tag = array(
		 'name'        => 'website_tag',
		 'class'       => 'form-control',
		 'value'=>set_value('website_tag')
	 );
?>
<?=form_input($website_tag)?>
</div>
<div class="form-group">
<?=form_label('Website Description:')?>
<?php $website_desc = array(
		 'name'        => 'website_desc',
		 'class'       => 'form-control',
		 'rows'				 => 4,
		 'value'=>set_value('website_desc')
	 );
?>
<?=form_textarea($website_desc)?>
</div>
<?=form_hidden('setting_id',$settings);?>
<?=form_submit('save','Save','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
