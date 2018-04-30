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

<?=form_open('admin/settings/contact/save',array('id'=>'category_add'))?>
<div class="form-group">
<?=form_label('Basic Email Address:')?>
<?php $website_email = array(
		 'name'        => 'email_address',
		 'class'       => 'form-control',
		 'value'=>set_value('email_address')
	 );
?>
<?=form_input($website_email)?>
</div>
<div class="form-group">
<?=form_label('Support Email Address:')?>
<?php $support_email_address = array(
		 'name'        => 'support_email_address',
		 'class'       => 'form-control',
		 'value'=>set_value('support_email_address')
	 );
?>
<?=form_input($support_email_address)?>
</div>
<div class="form-group">
<?=form_label('Cyber Security Email Address:')?>
<?php $cbsupport_email_address = array(
		 'name'        => 'cbsupport_email_address',
		 'class'       => 'form-control',
		 'value'=>set_value('cbsupport_email_address')
	 );
?>
<?=form_input($cbsupport_email_address)?>
</div>
<div class="form-group">
<?=form_label('Facebook Link:')?>
<?php $facebook_link = array(
		 'name'        => 'facebook_link',
		 'class'       => 'form-control',
		 'value'=>set_value('facebook_link')
	 );
?>
<?=form_input($facebook_link)?>
</div>
<div class="form-group">
<?=form_label('Twitter Link:')?>
<?php $twiiter_link = array(
		 'name'        => 'twiiter_link',
		 'class'       => 'form-control',
		 'value'=>set_value('twitter_link')
	 );
?>
<?=form_input($twiiter_link)?>
</div>
<div class="form-group">
<?=form_label('Google Plus Link:')?>
<?php $facebook_link = array(
		 'name'        => 'googleplus_link',
		 'class'       => 'form-control',
		 'value'=>set_value('googleplus_link')
	 );
?>
<?=form_input($facebook_link)?>
</div>



<?=form_submit('save','Save','class="btn btn-default"');?>
<?=form_close();?>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
