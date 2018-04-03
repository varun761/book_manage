<?php //print_r($view_data);?>
<?php $CI =&get_instance();?>
<?php $category=$CI->_get_category();?>
<div class="customnav">
<?php if(!empty($category)){?>
<ul>
<?php foreach($category as $val){?>
<li>
<a href="<?php echo base_url(); ?>products?pid=<?php echo $val['category_id'];?>">
<?php	echo $val['category_name'];?> 
</a>
	<?php if(!empty($val['childs'])){?>
	<ul>
		<?php foreach($val['childs'] as $val){?>
		<li>
		<a href="<?php echo base_url(); ?>products?pid=<?php echo $val['parent_id'];?>&cid=<?php echo $val['category_id'];?>">
		<?php echo $val['category_name'];?>
		</a>
		<?php if(!empty($val['childs'])){?>
	<ul>
		<?php foreach($val['childs'] as $val){?>
		<li>
		<a href="<?php echo base_url(); ?>products?pid=<?php echo $val['parent_id'];?>&cid=<?php echo $val['category_id'];?>">
		<?php echo $val['category_name'];?>
		</a>
		</li>
		<?php } ?>
	</ul>
	<?php }?>
		</li>
		<?php } ?>
	</ul>
	<?php }?>
</li>
<?php }?>
</ul>
<?php } ?>
</div>