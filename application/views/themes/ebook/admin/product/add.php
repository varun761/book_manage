<?php $CI =&get_instance();?>
<?php $CI->get_header();?>
<div class="main-content">
	<div class="container-fluid">
		<div class="col-xs-12 col-lg-10 col-center padding-0">
			<div class="col-xs-12 col-lg-3 pull-left padding-0">
				<?php $CI->get_sidebar_menu();?>
			</div>
			<div class="col-xs-12 col-lg-9 pull-left">
			<?php if($action_mode=='add'):?>
						<h3>Add Product</h3>
			<?php else:?>
						<h3>Update Product</h3>
			<?php endif;?>
			<?php
				if($this->session->flashdata('message')!=null){
						echo '<div class="alert alert-success">'.$this->session->flashdata('message').'! </div>';
					}
			?>
			<?php
			if($this->session->flashdata('error')!=null){
			echo '<div class="alert alert-warning">'.$this->session->flashdata('error').'</div>';
			}
			?>
			<?php if(validation_errors()!=""){	echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
			<?=form_open_multipart('admin/product/add_new')?>

				<div class="form-group">
				<?=form_label('Product Name :')?>
				<?php $product_data=array(
							'name'=>'pro_name',
							'value'=>isset($selected_cat[0]['product_name'])?$selected_cat[0]['product_name']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Product Sku :')?>
				<?php $product_data=array(
							'name'=>'pro_sku',
							'value'=>isset($selected_cat[0]['pro_sku'])?$selected_cat[0]['pro_sku']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Product Description:')?>
				<?php $product_dis = array(
						 'name'        => 'product_dis',
						 'class'       => 'form-control',
						 'rows'        => '5',
						 'cols'        => '20',
						 'value'			 =>  isset($selected_cat[0]['product_description'])?$selected_cat[0]['product_description']:''
					 );
				?>
				<?=form_textarea($product_dis)?>
				</div>
				<div class="form-group">
				<?=form_label('Product Short Description:')?>
				<?php $product_short_dis = array(
						 'name'        => 'product_short_dis',
						 'class'       => 'form-control',
						 'rows'        => '5',
						 'cols'        => '20',
						 'value'			 =>  isset($selected_cat[0]['product_short_description'])?$selected_cat[0]['product_short_description']:''
					 );
				?>
				<?=form_textarea($product_short_dis)?>
				</div>
				<div class="form-group">
				<?=form_label('Category :')?>
				<?php $product_data=array(
							'name'=>'pro_cat',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Cost Price:')?>
				<?php $product_data=array(
							'name'=>'pro_cp',
							'value'=>isset($selected_cat[0]['pro_sku'])?$selected_cat[0]['pro_sku']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Selling Price:')?>
				<?php $product_data=array(
							'name'=>'pro_sp',
							'value'=>isset($selected_cat[0]['pro_sku'])?$selected_cat[0]['pro_sku']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Sale Price:')?>
				<?php $product_data=array(
							'name'=>'pro_saleprice',
							'value'=>isset($selected_cat[0]['pro_sku'])?$selected_cat[0]['pro_sku']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Sale Start Date:')?>
				<?php $product_data=array(
							'name'=>'sale_start_date',
							'value'=>isset($selected_cat[0]['pro_sku'])?$selected_cat[0]['pro_sku']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Sale End Date:')?>
				<?php $product_data=array(
							'name'=>'sale_end_date',
							'value'=>isset($selected_cat[0]['pro_sku'])?$selected_cat[0]['pro_sku']:'',
							'class'=>'form-control'
						);?>
				<?=form_input($product_data);?>
				</div>
				<div class="form-group">
				<?=form_label('Product Catelog Image :')?>
				<?php
					$form_data=array(
						'name'=>'product_image'
					);
				?>
				<?=form_upload($form_data)?>
				</div>
				<?=form_hidden('action',$action_mode);?>
				<?php if($action_mode=='add'):?>
				<?=form_submit('add','Add New Product','class="btn btn-default"');?>
				<?php else:?>
				<?=form_hidden('category_id',$category_id);?>
				<?=form_submit('edit','Update Product','class="btn btn-danger"');?>
				<?php endif;?>
				<?=form_close();?>
				</div>
			</div>
		</div>
</div>
<?php $CI->get_footer();?>
