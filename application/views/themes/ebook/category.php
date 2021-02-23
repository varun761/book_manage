<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<?=$breadcrumb?>
<div class="main-content">
<div class="container-fluid">
	<div class="col-xs-12 col-lg-11 col-center padding-0 categorydiv">
<div class="col-xs-12 col-lg-12">
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
	<h3 class="category_heading"><?=strtoupper($category_name)?></h3>
	<?php if(isset($category_description) && $category_description!=""){?>
	<div class="row">
	<div class="col-xs-12 category_dis"><?=$category_description?></div>
	</div>
	<?php }?>
	<div class="row">
		<div class="col-sm-12">



<?php if(!empty($view_data)):?>
<?php foreach($view_data as $view_cat){?>
	<div class="col-xs-12 col-sm-3 col-lg-3 pull-left category">
	<div class="category_image"><img src="<?php echo base_url('uploads/category/default/fff.png');?>"></div>
	<div class="category_name">
		<a href="<?php echo base_url('category/').$view_cat['category_slug'].'/action/viewAll';?>"><?=ucfirst($view_cat['category_name'])?></a>
	</div>
	</div>
<?php } ?>
<?php else:?>
<p class="nocontent">No category or product found.</p>
<?php endif;?>
<?php if (isset($links)) { ?>
	<div class="col-xs-12 pull-left page_links text-center">
                <?=$links?>
	</div>
            <?php } ?>
					</div>
</div>
</div>
</div>
</div>
</div>
<?php $CI->get_footer();?>
