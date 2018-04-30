<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
<div class="container-fluid">
	<div class="col-xs-12 col-lg-10 col-center padding-0">
		<div class="col-xs-12 padding-0">
			<?php if(validation_errors()!=""){	echo validation_errors();} ?>
		</div>
<div class="col-xs-12 col-lg-3 pull-left padding-0">
	<?php $CI->get_sidebar_menu();?>
</div>
<div class="col-xs-12 col-lg-9 pull-left">

	<h3><?=$heading?></h3>

<?=form_open('admin/settings/store/save',array('id'=>'settings_store'))?>

<div class="form-group">
<?=form_label('Address Line:')?>
<?php $store_address1=array(
			'name'=>'store_addressline',
			'class'=>'form-control',
			'value'=>set_value('store_addressline'),
			'onfocus'=>'geolocate()',
			'id'=>'autocomplete'
		);?>
<?=form_input($store_address1);?>
</div>

<div class="form-group">
<?=form_label('City:')?>
<?php $store_city=array(
			'name'=>'store_city',
			'class'=>'form-control',
			'value'=>set_value('store_city'),
			'id'=>'locality'
		);?>
<?=form_input($store_city);?>
</div>
<div class="form-group">
<?=form_label('State :')?>
<?php $store_country=array(
			'name'=>'store_state',
			'class'=>'form-control',
			'value'=>set_value('store_state'),
			'id'=>'administrative_area_level_1'
		);?>
<?=form_input($store_country);?>
</div>
<div class="form-group">
<?=form_label('Country :')?>
<?php $store_country=array(
			'name'=>'store_country',
			'class'=>'form-control',
			'value'=>set_value('store_country'),
			'id'=>'country'
		);?>
<?=form_input($store_country);?>
</div>
<div class="form-group">
<?=form_label('Pincode :')?>
<?php $store_pincode=array(
			'name'=>'store_pincode',
			'class'=>'form-control',
			'value'=>set_value('store_pincode'),
			'id'=>'postal_code'
		);?>
<?=form_input($store_pincode);?>
</div>
<?=form_submit('save','Save','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
