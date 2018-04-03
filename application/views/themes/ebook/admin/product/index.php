<?php //print_r($view_data);?>
<?php $CI =&get_instance();?>
<?php $category=$CI->Category_Controller_category();?>
<?php if(!empty($category)){?>
<ul>
<?php foreach($category as $val){?>
<li>
<a href="<?php echo base_url(); ?>?pid=<?php echo $val['category_id'];?>">
<?php	echo $val['category_name'];?> 
</a>
	<?php if(!empty($val['childs'])){?>
	<ul>
		<?php foreach($val['childs'] as $vals){?>
		<li>
		<a href="<?php echo base_url(); ?>?pid=<?php echo $vals['parent_id'];?>&cid=<?php echo $vals['category_id'];?>">
		<?php echo $vals['category_name'];?>
		</a>
		</li>
		<?php } ?>
	</ul>
	<?php }?>
</li>
<?php }?>
</ul>
<?php } ?>
</table>