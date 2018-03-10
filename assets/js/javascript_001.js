$(document).ready(function(e) {
  	$("#phone").intlTelInput();
  	$('.datepicker').datepicker();
	$('.message a').click(function(){
	   //$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});

	 $("#scrollingElement").scroll(function() {
	  $(window).scroll();
	});

	$("#phone").intlTelInput("setCountry", "in");


	$(".scrollRegClick").on('click',function() {
	    $('html, body').animate({
	        'scrollTop' : $("#dynamictabstrp").position().top+150
	    });
	});
	$(".datepicker").on('change', function(){
    	$(".dropdown-menu").css("display","none");
	});  

	$(".dropdown-menu li").on('click', function(e){
		  
  		var defaultPrevented = $(this).parent().closest('div') ;
   		$("button",defaultPrevented).text($(e.target).text()); // find img inside of closest sub_page
	});

	$("#move_to_to_for_reg").on('click',function(e) {
		e.preventDefault() ;
	    $('html, body').animate({
	        'scrollTop' : $(".login-page").position().top 
	    });
	});


$(function() {
$("#login_form").validate({
		 rules: { 
				 aa1:{
				      required: true,
				      email: true
					},
				 aa2:{  
				 		required: true,
					    minlength: 6
					}
			},
		  messages: {
		    aa1: {
		      email: "Please enter your valid email address "
		    }
		  },

		submitHandler: function(form, event){


			var user_n = $('#user_name').val();
			var pass_w = $('#user_password').val();	
			  
			$submit = $('#login_form[type="submit"] , #login_form button');
			$.post('ajax.php',{action:'user-login',username:user_n, password:pass_w},function(response){
				//$('.div_02').html(data);  
				console.log(response);
				if (response.trim().length > 1) {
					response =$.parseJSON(response);
					var response_success = response.success;
	 
					if (response_success.status !=0 && response_success.valid == 1) {
						$('body').html(response.url);
					} else {
						show_this_page (response_success.status, user_n, response_success.image) ;	
					}
				}




				$submit.removeAttr('disabled');
			});	



	

			
		}
			
	});
		
 




});
  






	function show_this_page ( page_status , user_n_name, image_path) {
		page_user = "";
		here_color = 'green';
		var system_name =$('title').text();
		switch (page_status ){
			case 0 :
				page_user = "Login Form";
				break;
			case 1 :
					page_user = "Admin Login Form";
					here_color = '#FF4900';
				break;
			case 2 :
					page_user = "Doctor Login Form";
					here_color = '#00AEFF';
				break;
			case 3 :
					page_user = "Pharmacist Login Form";
					here_color = '#9D00FF';
				break;
			case 4 :
					page_user = "Patient Login Form";
					here_color = '#18FF00';
				break;
			default:
					page_user = "User Login Form";
					here_color = 'black';


				break;
		}






	$('#i_am_the_body').remove();


	$('#actual_hidden_form').css('display', 'inherit');
	$('#id94969377771').css('border-top', '5px solid '+here_color);
	$('#id94969377772').css('background', here_color);
	$('#id94969377773').css('color', here_color);
	$('#id94969377774').css('background', here_color);

	$('#id94969377701').text(page_user);
	$('#user_name_dyn').val(user_n_name);


	if(image_path)
	$.ajax({
	    url:image_path,
	    type:'HEAD',
	    error: function() {
	        //file not exists
	    },
	    success: function() {
	        //file exists

		$('.image_dynamic_here').css('display', 'inherit');
		$('.image_dynamic_here').attr('src', image_path);

		   }
	});



 
 

	}







$(function() {
$("#login_form_dyn").validate({
		 rules: { 
				 aa1:{
				      required: true,
				      email: true
					},
				 aa2:{  
				 		required: true,
					    minlength: 6
					}
			},
		  messages: {
		    aa1: {
		      email: "Please enter your valid email address "
		    }
		  },

		submitHandler: function(form, event){


			var user_n = $('#user_name_dyn').val();
			var pass_w = $('#user_password_dyn').val();	
			  

			$submit = $('#login_form[type="submit"] , #login_form button');
			$.post('ajax.php',{action:'user-login',username:user_n, password:pass_w},function(response){
				//$('.div_02').html(data); 
				if (response.trim().length > 1) {
					response =$.parseJSON(response);
					var response_success = response.success;
	 
					if (response_success.status !=0 && response_success.valid == 1) {
						$('body').html(response.url);
					} else {
						$('#user_password_dyn').after('<label id="user_password_dyn-error" class="error" for="user_password_dyn">Incorrect Password</label>');
					}
				}




				$submit.removeAttr('disabled');
			});	



	

			
		}
			
	});
		
 




});
  
 








 

	$("#signupEmail").keyup(function(e) {
		var email_ = $('#signupEmail').val();

		show_status ( this,0, null);
		if( email_ == ''){
			return;
		}
console.log(email_);
		$.post('ajax.php',{action:'chk_email', email:email_ },function(response){
				//$('.div_02').html(data);
				 console.log(response);
				response =$.parseJSON(response);
				//console.log(response.success);
				if(response.success == 0){
					show_status ( "#signupEmail", 1, null);
				} else if(response.success <5 ){
					show_status ( "#signupEmail", 3, "already exists");
				}
		
			});	




	});


	$("#add_new_user_self").validate({
		  rules: { 
				 lname:{required: true},
				 fname:{required: true},
				 signupEmail:{
				 	required: true,
				 		email:true
				 },
				 pass1:{  
				 		required: true,
					    minlength: 6
					},
				 pass2: {
		      			equalTo: "#signupPassword"
		  			}

			}, 
		submitHandler: function(form, event){
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var email = $('#signupEmail').val();
			var password = $('#signupPassword').val();	
			fname = fname.trim();
			lname = lname.trim();

			 if( fname.length == 0 || lname.length == 0){

			 	$('#lname').after('<label id="lname-error" class="error" for="lname">Something wrong.Please try again with other information</label>');
						
				return;
			}
			


			$submit = $('#add_new_user_self[type="submit"]');
			 $('#hello_add_me').css('cursor', 'wait');

				 $('#i_am_the_body').css('display', 'none');
				 $('#actual_hidden_form_success00000').css('display', 'inherit');

			$.post('ajax.php',{action:'add-Patient', fname:fname,
														lname:lname,
														email:email,
														password:password
														},function(response){
				//$('.div_02').html(data);

console.log(response);


				response =$.parseJSON(response);

				console.log("xxx1---/"+response.success);
				if(response.success >0 ){

				var domain = email.substring(email.lastIndexOf("@") +1);

				$('#id294969377774').attr('mainl_dom',"https://"+domain);


				$("#add_new_user_self").find("input[type=text], input[type=password], input[type=email]").val("");


				 $('#i_am_the_body').remove();
				 $('#actual_hidden_form_success00000').css('display', 'none');


				 $('#actual_hidden_form_success').css('display', 'inherit');


 
				} else {
					 $('#signupEmail').after('<label id="signupEmail-error" class="error" for="signupEmail">Something wrong.Please try again with other information</label>');
				

				}

		
										
				
				$submit.removeAttr('disabled');				
		
			 $('#hello_add_me').css('cursor', 'pointer');


			});	
			return false;
		}
			
	});












  	function show_status (   diz,   clazz1,   mzg) {
		var parent_base;
  		if(clazz1 ==0) {
			parent_base = $(diz).parent().closest('.form-group');
			parent_base.attr('class', 'form-group has-feedback col-xs-12');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
			return;
  		}
  		if(clazz1 ==9) {

			$(diz).find('.form-group').attr('class', 'form-group has-feedback col-xs-12');
			$(diz).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback');
			$(diz).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(diz).find('.and_user_msg').attr('style', '');
			return;
  		}
		var added_Class1;
		var added_Class2;
  		if(clazz1==1) {
  			added_Class1 = "has-success";
  			added_Class2 = "glyphicon-ok";
  		} else if (clazz1 ==2 ) {
  			added_Class1 = "has-warning";
  			added_Class2 = "glyphicon-warning-sign";


  		} else if (clazz1 ==3 ) {
  			added_Class1 = "has-error";
  			added_Class2 = "glyphicon-remove";


  		} 
		parent_base = $(diz).parent().closest('.form-group');
		parent_base.addClass(added_Class1);
		$(parent_base).find('.glyphicon').addClass(added_Class2);

		if(mzg != null) {
	  			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg help-inline');
	  			$(parent_base).find('.and_user_msg').text(mzg);
	  			if(clazz1==1) {
  					$(parent_base).find('.and_user_msg').attr('style', 'color: #3c763d;font-weight: 500');
		  		} else if (clazz1 ==2 ) {
		  			$(parent_base).find('.and_user_msg').attr('style', 'color: #8a6d3b;font-weight: 500');
		  		} else if (clazz1 ==3 ) {
		  			$(parent_base).find('.and_user_msg').attr('style', 'color: #a94442;font-weight: 500');
		  		} 

		}
		

  	}




	$(document).on('click', "#id94969377772", function(e) {
		e.preventDefault();
		location.reload();

	});


	$(document).on('click', "#id194969377774", function(e) {
		e.preventDefault();
		window.location = ".";

	});



	$(document).on('click', "#id294969377774", function(e) {
		e.preventDefault();
		window.location = $('#id294969377774').attr('mainl_dom');

	});







	$('#signupPassword').keyup(function(e) {
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


 
		
});



///var myURL = document.location;
//document.location = myURL + "?a=paramete