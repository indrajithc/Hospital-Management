$(document).ready(function(e) {
	
	  	// Toggle Function
	$('.toggle').click(function(){
	  // Switches the Icon
	  $(this).children('i').toggleClass('fa-pencil');
	  // Switches the forms  
	  $('.form').animate({
	    height: "toggle",
	    'padding-top': 'toggle',
	    'padding-bottom': 'toggle',
	    opacity: "toggle"
	  }, "slow");
	});
		

		$(function() {
$("#reser_pass_1 form").validate({
		 rules: { 
				 aa1:{
				      required: true,
				      email: true
					},
				 
			},
		  messages: {
		    aa1: {
		      email: "Please enter your valid email address "
		    }
		  },

		submitHandler: function(form, event){


			var user_n = $('#my_email_id').val();
			  
			$submit = $('#login_form[type="submit"] , #login_form button');
			$.post('../ajax.php',{action:'reset-password',username:user_n },function(response){
				//$('.div_02').html(data);  
				console.log(response);
				if (response.trim().length > 1) {
					response =$.parseJSON(response);
					var response_success = response.success;
	 
					if (response_success.status !=0  ) {
						if (response_success.image)
						$.ajax({
						    url:response_success.image,
						    type:'HEAD',
						    error: function() {
						        //file not exists
						    },
						    success: function() {
						        //file exists

							$('.image_dynamic_here').css('display', 'inherit');
							$('.image_dynamic_here').attr('src', response_success.image);

							   }
						});

						$('#reser_pass_1').css('display', 'none');
						$('#reser_pass_2').css('display', 'block');

					} else {
						$('#my_email_id').after('<label id="my_email_id-error" class="error" for="my_email_id">Your search did not return any results. Please try again with other information.</label>');
					
					}
				}




				$submit.removeAttr('disabled');
			});	

			
		}
			
	});
		
 




});
	






$(function() {
$("#reser_pass_2 form").validate({
		 rules: { 
				 options:{
				      required: true 
					} 
				 
			},
		  messages: {
		    options: {
		      required: "Please Select option "
		    }
		  },

		submitHandler: function(form, event){

			var user_n = $('#my_email_id').val();
 
			  
			$submit = $('#login_form[type="submit"] , #login_form button');
			$.post('../ajax.php',{action:'confirm-email',email:user_n },function(response){
				//$('.div_02').html(data);  
				console.log(response);
				if (response.trim().length > 1) {
					response =$.parseJSON(response);
					var response_success = response.success;
	 
					if (response_success == 1  ) {
						$('.class_defalt_hidden').css('display', 'none');
						$('#reser_pass_5').css('display', 'block');

					} else {
						$('#option1').after('<label id="option1-error" class="error" for="option1">Something wrong.Please Contact Your Administrator</label>');
					
					}
				}




				$submit.removeAttr('disabled');
			});	

			
		}
			
	});
		
 




});
	









$(function() {
$("#reser_pass_3 form").validate({
		   rules: {
			    pass1: {
			    	required: true,
					minlength: 6
			    }  ,
			    pass2: {
			      equalTo: "#pass1"
			  			}
			    } ,
		submitHandler: function(form, event){

			var pass1 = $('#pass1').val();
 
			var email = $('#reser_pass_3').attr('email');
 
			var code = $('#reser_pass_3').attr('code');
 
			  
			$submit = $('#login_form[type="submit"] , #login_form button');
			$.post('../ajax.php',{action:'new-password',email:email, code:code, password:pass1 },function(response){
				//$('.div_02').html(data);  
				console.log(response);

				if (response.trim().length > 1) {
					response =$.parseJSON(response);
					var response_success = response.success;
	 
					if (response_success.status !=0 && response_success.valid == 1) {
							$('body').html(response.url);
					} else {
						

						
						$('.class_defalt_hidden').css('display', 'none');
						$('#reser_pass_4').css('display', 'block');


						}
				}




				$submit.removeAttr('disabled');
			});	

			
		}
			
	});
		
 




});
	






$(function() {
$("#reser_pass_5 form").validate({
		

		submitHandler: function(form, event){

			var user_n = $('#my_email_id').val();
 
			  
			$submit = $('#login_form[type="submit"] , #login_form button');
			$.post('../ajax.php',{action:'re-confirm-email',email:user_n },function(response){
				//$('.div_02').html(data);  
				console.log(response);
				if (response.trim().length > 1) {
					response =$.parseJSON(response);
					var response_success = response.success;
	 
					if (response_success == 1  ) {
						$('.class_defalt_hidden').css('display', 'none');
						$('#reser_pass_5').css('display', 'block');

					} else {
						$('#option1').after('<label id="option1-error" class="error" for="option1">Something wrong.Please Contact Your Administrator</label>');
					
					}
				}




				$submit.removeAttr('disabled');
			});	

			
		}
			
	});
		
 




});
	











$('#pass1').keyup(function(e) {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (false == enoughRegex.test($(this).val())) {
             $('#passstrength').html('More Characters');
     } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html('Strong!');
     } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $('#passstrength').html('Medium!');
     } else {
             $('#passstrength').className = 'error';
             $('#passstrength').html('Weak!');
     }
     return true;
});




$('#back_secin').click(function(e){
		e.preventDefault();
	$('.class_defalt_hidden').css('display', 'none');
	$('#reser_pass_1').css('display', 'block');

});



 

 


$('#option1').click(function() {
    var checked = $(this).attr('checked');
    if (checked) {
        $(this).attr('checked', false);
    }
    else {
        $(this).attr('checked', true);
    }
});





});
