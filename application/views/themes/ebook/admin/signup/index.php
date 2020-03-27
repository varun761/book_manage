<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
	<section id="main-body">
		<div class="container-fluid">
		<div class="row">
			<div class="container">


				<div class="loginform col-xs-12 col-sm-6 col-md-5 col-sm-offset-3 col-md-offset-4">
					<h3 class="maintitle text-center">CREATE NEW ACCOUNT</h3>
					<div class="col-xs-12 padding-0">
						<?php if(validation_errors()!=""){	echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
					</div>
					<?=form_open_multipart('signup',array('id'=>'signup-here'))?>
						<div class="col-xs-12 col-sm-12 form-group">
							<?=form_label('First Name *')?>
							<?php $username_data=array(
										'name'=>'fname',
										'class'=>'form-control',
										'value'=>set_value('fname'),
										'id'=>'fname',
										'placeholder'=>'First Name'
									);?>
							<?=form_input($username_data);?>
						</div>
						<div class="col-xs-12 col-sm-12 form-group">
							<?=form_label('Last Name')?>
							<?php $username_data=array(
										'name'=>'lname',
										'class'=>'form-control',
										'value'=>set_value('lname'),
										'id'=>'fname',
										'placeholder'=>'Last Name'
									);?>
							<?=form_input($username_data);?>
						</div>
						<div class="col-xs-12 col-sm-12 form-group">
							<?=form_label('Email *')?>
							<?php $username_data=array(
										'name'=>'email',
										'class'=>'form-control',
										'value'=>set_value('email'),
										'id'=>'email',
										'placeholder'=>'Email Address'
									);?>
							<?=form_input($username_data);?>
						</div>
						<div class="col-xs-12 col-sm-12 form-group">
							<?=form_label('Username *')?>
							<?php $username_data=array(
										'name'=>'username',
										'class'=>'form-control',
										'value'=>set_value('username'),
										'id'=>'username',
										'placeholder'=>'Username'
									);?>
							<?=form_input($username_data);?>
						</div>

						<div class="col-xs-12 col-sm-12 form-group padding-0">
							<?=form_label('Password *')?>
							<?php $password_data=array(
										'name'=>'password',
										'class'=>'form-control',
										'value'=>set_value('password'),
										'id'=>'password',
										'placeholder'=>'Password'
									);?>
							<?=form_password($password_data);?>
						</div>
						<div class="col-xs-12 col-sm-12 form-group padding-0">
							<?=form_label('Confirm Password *')?>
							<?php $password_data=array(
										'name'=>'cpassword',
										'class'=>'form-control',
										'value'=>set_value('cpassword'),
										'id'=>'cpassword',
										'placeholder'=>'Confirm Password'
									);?>
							<?=form_password($password_data);?>
						</div>
						<div class="col-xs-12 col-sm-12 form-group padding-0">
							<?=form_label('Signup as a *')?>
							<?php $role_data=array(
										'name'=>'role',
										'class'=>'form-control',
										'value'=>'customer',
										'id'=>'role'
									);?>
							<?=form_label('Customer')?>
							<?=form_radio($role_data);?>
							<?php $role_data=array(
										'name'=>'role',
										'class'=>'form-control',
										'value'=>'dealer',
										'id'=>'role'
									);?>
							<?=form_label('Dealer')?>
							<?=form_radio($role_data);?>
							<?php $role_data=array(
										'name'=>'role',
										'class'=>'form-control',
										'value'=>'delivery',
										'id'=>'role'
									);?>
							<?=form_label('Delivery')?>
							<?=form_radio($role_data);?>
						</div>
						<div class="col-xs-12 form-group checkbox">
							<label><input type="checkbox" name="agreepolicy" value="agree"> I read all your privacy policies and agree to use your service.</label>
						</div>
						<div class="col-xs-12 form-group checkbox">
							<label><input type="checkbox" name="newsletter" value="newsletter">Subscribe to our newsletter.</label>
						</div>
						<?=form_submit('signup','Signup',array('class'=>'login btn btn-default','onclick'=>'validate()'));?>


					</form>
				</div>

			</div>
		</div>
		</div>
	</section>
	<?php $CI->get_footer();?>
