<footer class="site-footer">
			<div class="container">
						<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 pull-left">
					<div class="copyright">
					&copy; Copyright by <a href="mailto:sharma.varun76@yahoo.in">Varun Sharma</a>
				</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 pull-left">
					<ul class="footer-links">
					<li><a href="<?=base_url()?>privacy-policy">Privacy Policy</a></li>
					<li><a href="<?=base_url()?>about-us">About Us</a></li>
					<li><a href="<?=base_url()?>our-team">Our Team</a></li>
					<li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
					</ul>
				</div>
			</div>
			</div>
	</footer>
	<?php $CI=&get_instance();?>
	<?php echo $CI->loadJs();?>
<script type='text/javascript'>
var baseUrl='<?php echo base_url();?>';
//var security=$.cookie('<?php echo $this->config->item('csrf_cookie_name')?>');

</script>
	<!--<script src="../custom/js/newsignup.js"></script>-->
</body>
</html>
</html>
