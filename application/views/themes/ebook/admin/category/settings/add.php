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
<div class="col-xs-12 col-sm-9 col-lg-10 pull-left">

	<h3><?=$page_heading?></h3>
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
<?=form_open('admin/category/settings/save',array('id'=>'category_add'))?>

<div class="form-group">
<?=form_label('Meta Keywords :')?>
<?php $category_data=array(
			'name'=>'cat_metakey',
			'class'=>'form-control',
			'value'=>set_value('cat_metakey')
		);?>
<?=form_textarea($category_data);?>
</div>
<div class="form-group">
<?=form_label('Meta Description:')?>
<?php $category_dis = array(
		 'name'        => 'category_metadis',
		 'class'          => 'form-control',
		 'rows'        => '5',
		 'cols'        => '20',
		 'value'=>set_value('category_metadis')
	 );
?>
<?=form_textarea($category_dis)?>
</div>
<div class="form-group">
	<?=form_label('Show Subcategory or products :')?>
	<?php $options=array(
		'0'=>'Both',
		'1'=>'Subcategories',
		'2'=>'Products'
	);
	?>
<?=form_dropdown('choice', $options, '0',$extras=array('class'=>'form-control'))?>
</div>
<div class="form-group">
	<?=form_checkbox('showdis', 1, TRUE);?>
	<?=form_label('Show Category Description ? ')?>
</div>
<?=form_hidden('verify',$verification_id);?>
<?=form_submit('save','Save Settings','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
