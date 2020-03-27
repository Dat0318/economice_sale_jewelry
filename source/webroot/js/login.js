$(document).ready(function(){
$('.btn-login').click(function(event) {
		event.preventDefault();
		var data= $('.form-login').serialize();
		$.ajax({

			url:"/login",
			data:data,
			type:"POST",
			dataType:"json",
			success:function(data){
				if(data.result=="success"){
					location.reload();
				}
				else{
					$('.error-message').text(data.error);
				}
			}
		});
	});
	
});
	
