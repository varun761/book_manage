'use strict'
$('document').ready(function(){
	$('.image_preview').hide()
  $('#category_image').change(function(){
	  
	if (this.files && this.files[0]) {
		if(this.files[0].size > 2450000){
			
		}
		var reader = new FileReader();
		reader.onload = function(e) {
		$('.image_preview').show()
		$('#image_prev').attr('src', e.target.result);
		}
		reader.readAsDataURL(this.files[0]);
		}
  })
})