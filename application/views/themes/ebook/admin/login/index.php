<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
	<section id="main-body">
		<div class="container-fluid">
		<div class="row">
			<div class="container">


				<div class="loginform col-xs-12 col-sm-6 col-md-5 col-sm-offset-3 col-md-offset-4">
					<h3 class="maintitle text-center">HELLO GUEST</h3>
					<div class="col-xs-12 padding-0">
						<?php if(validation_errors()!=""){	echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
					</div>
					<?=form_open_multipart('login',array('id'=>'login-here'))?>

						<div class="col-xs-12 col-sm-12 form-group">
							<?=form_label('Username or email :')?>
							<?php $username_data=array(
										'name'=>'username',
										'class'=>'form-control',
										'value'=>set_value('username'),
										'id'=>'username',
										'placeholder'=>'Username or email'
									);?>
							<?=form_input($username_data);?>
							</div>

						<div class="col-xs-12 col-sm-12 form-group padding-0">
							<?=form_label('Password :')?>
							<div class="inner-addon right-addon signuppass">
							<i class="glyphicon icon-eye-open glyphicon-eye-open show-pass"></i>
							<?php $password_data=array(
										'name'=>'password',
										'class'=>'form-control',
										'value'=>set_value('password'),
										'id'=>'password',
										'placeholder'=>'Password'
									);?>
							<?=form_password($password_data);?>
							</div>
						</div>
						<div class="col-xs-12 form-group checkbox">
							<label><input type="checkbox" name="remember_me" value="remember"> Remember Me</label>
						</div>
						<?=form_submit('login','Login',array('class'=>'login btn btn-default','onclick'=>'validateLogin()'));?>


					</form>
					<div class="col-xs-12 text-center">
						<p>Trouble in login ?</p>
						<p><a href="http://localhost/book_manage_html/front_html/forgot.html">Forgot password or email ?</a></p>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>
	<?php $CI->get_footer();?>
