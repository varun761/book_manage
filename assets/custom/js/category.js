$('document').ready(function(){
  $('#child_category').on('keyup',function(event){
    var originalKey=event;
    var invalidkeycode=[38,39,37,40,9,20,16,17,27,112,113,114,115,116,117,118,119,120,121,122,123,44,45,46];
    if(!(invalidkeycode.includes(originalKey.keyCode))){
      getCategories();
    }
  })
  function getCategories(){
	var cookie_value=$.cookie('store_authorised_cookie');
    var dataString=$('#child_category').val();
    if(dataString!=null && dataString!=''){
    var finaldata={
      search_string:dataString,
      store_authorised_token:cookie_value
    };
    $.ajax({
      method: 'POST',
      url:baseUrl+'findCategory',
      data:finaldata,
      success:function(data, textStatus, xhr){
        if(xhr.status==200){
          var response=$.parseJSON(data);
          if(typeof response!==undefined){
			console.log(response)
		    console.log('Type of result: '+typeof response)
		    console.log('Type of length: '+Object.keys(response).length)
			
            
          }
        }
      },
      error:function(xhr, textStatus){
        if(xhr.status==403){
          console.log('Bad Request')
        }
      }
    })
    }
  }
})