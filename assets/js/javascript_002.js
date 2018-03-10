$(document).ready(function(e) {
  	 
	$(".js-example-basic-single").select2();
  	$("#dmphone").intlTelInput();
  	$("#dlphone").intlTelInput();

 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

  	$("#cick_hover_me").hover(
	    function() {

	      $("#cick_hover_he").css("background-image", 'url(../assets/img/user_btn1.png)'); 

	    },
	    function() {
	      $("#cick_hover_he").css("background-image", 'url(../assets/img/user_btn.png)'); 
    });

/*
  	//$('.datepicker').datepicker();
	$(".datepicker").on('change', function(){
    	$(".dropdown-menu").css("display","none");
	});  

*/

  	function show_status (   diz,   clazz1,   mzg) {
		var parent_base;
  		if(clazz1 ==0) {
			parent_base = $(diz).parent().closest('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
			return;
  		}
  		if(clazz1 ==9) {

			$(diz).find('.form-group').attr('class', 'form-group has-feedback  ');
			$(diz).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
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

// add department and its validation 

	$("#department_name").keyup(function(e) {
		var name_n = $('#department_name').val();

		show_status ( this,0, null);
		if( name_n == ''){
			return;
		}

		$.post('../ajax.php',{action:'chk_department',name:name_n},function(response){
				//$('.div_02').html(data);
				//console.log(response);
				response =$.parseJSON(response);
				//console.log(response.success);
				if(response.success == 0){
					show_status ( "#department_name", 1, null);
				} else if(response.success == 1){
					show_status ( "#department_name", 3, "already exists");
				}
		
			});	




	});

	$("#add_department").validate({
		  rules: { 
				 aa1:{required: true}
			}, 
		submitHandler: function(form, event){
			var name_n = $('#department_name').val();
			var desc_n = $('#department_description').val();	
			name_n = name_n.trim();
			desc_n = desc_n.trim();

			 if( name_n.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			


			$.post('../ajax.php',{action:'add_department',name:name_n,description:desc_n},function(response){
				//$('.div_02').html(data);
				console.log(response);

				response =$.parseJSON(response);
				if(response.success == 1){

				var update_tis = " <div class=\"row new_table_bootsrp padding_left_x \" val_id ='"+name_n+"'> <div class=\"col-md-4\"> <p>"+
				name_n+"</p> </div> <div class=\"col-md-7\"> <textarea class=\"form-control me_my_textarea\" rows=\"4\" cols=\"10\" disabled=\"disabled\">"+
				desc_n+"</textarea> </div> <div class=\"col-md-1\"> <div   class=\" button_element_to_do \"><i class=\"fa fa-pencil-square-o \" aria-hidden=\"true\"  "+
				" style=\"color: red; cursor: pointer;\" ></i> </div> </div> </div>"     ;  
				  

				$("#the_display_table_1").after(update_tis) ;

				
				$("#add_department").find("input[type=text], textarea").val("");

				show_status ( "#add_department",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}

		
										
								
		
			});	
			return false;
		}
			
	});
		
		


	//$('.button_element_to_do').click(function(e) {
	$(document).on('click', "div.button_element_to_do", function() {
		var sup_pere = $(this).closest('.new_table_bootsrp');
		var t_name = $(sup_pere).find('p');
		var t_des = $(sup_pere).find('textarea');

		show_status ( "#department_name_edit",0, null);
		$('.class_ide_94969380').val("");
		$('.class_ide_94969381').val("");
		$('.class_ide_94969380').val(t_name.text());
		$('.class_ide_94969381').val(t_des.val());

		$('.class_ide_94969380').attr('old', t_name.text());
		$('.class_ide_94969381').attr('old', t_des.val())


		$('#show_the-popupzP').click();

	});








	$("#department_name_edit").keyup(function(e) {
		var name_n = $('#department_name_edit').val();

		show_status ( this,0, null);
		if( name_n == ''){
			return;
		}

		$.post('../ajax.php',{action:'chk_department',name:name_n},function(response){
				//$('.div_02').html(data);
				//console.log(response);
				response =$.parseJSON(response);
				//console.log(response.success);
				if(response.success == 0){
					show_status ( "#department_name_edit", 1, null);
				} else if(response.success == 1){
					show_status ( "#department_name_edit", 3, "already exists");
				}
		
			});	




	});

	$("#edit_department").validate({
		  rules: { 
				 aa2:{required: true}
			}, 
		submitHandler: function(form, event){
			var name_n = $('#department_name_edit').val();
			var desc_n = $('#department_description_edit').val();	
			var name_n_old = $('#department_name_edit').attr('old');
			
		 	name_n = name_n.trim();
			desc_n = desc_n.trim();

			 if( name_n.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
 

			$.post('../ajax.php',{action:'edit_department',name:name_n, name_old:name_n_old, description:desc_n},function(response){
				//$('.div_02').html(data);
				console.log(response);

				response =$.parseJSON(response);
				if(response.success == 1){



					var staSta = 0;
					$( "#my_table_bbro" ).find('p').each(function( i ) {
					    if ( name_n_old == $(this).text() ) {
					        $(this).text(name_n);

					         var sup_pere = $(this).closest('.new_table_bootsrp');
							 var t_des = $(sup_pere).find('textarea');
							 t_des.val(desc_n);
				
					        staSta=1;
					    } else {

					    }
					  });
					  if(staSta == 0) {
							Lobibox.notify('warning', {
													size: 'mini',
													showClass: 'zoomInLeft',
													hideClass: 'zoomOutRight',
													msg: 'something`s not right, refresh',
													img: $("#loged_in_image").attr("src")
											});
					  }



				
				$("#edit_department").find("input[type=text], textarea").val("");
				$('#dizmiz_tizzz').click();
				show_status ( "#add_department",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}

		
										
								
		
			});	
			return false;
		}
			
	});
		
		



//



	$("#delete_this_item_here").click(function(e) {
		var name_n = $('#department_name_edit').val();
		var name_n_old = $('#department_name_edit').attr('old');
		
	 	name_n = name_n.trim(); 

		 if( name_n != name_n_old){
				Lobibox.notify('warning', {
										size: 'mini',
										showClass: 'zoomInLeft',
										hideClass: 'zoomOutRight',
										msg: 'something`s not right' ,
										img: $("#loged_in_image").attr("src")
								});
			return;
		}
		
		Lobibox.confirm({
		msg: "Are you sure you want to delete this Department?",
		callback: function ($this, type, ev) {
		    if (type == 'yes') {










			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'delete_department',name:name_n ,function(response){
				//$('.div_02').html(data);
				console.log(response);

				if(true) {
				//response =$.parseJSON(response);
				if(true){

					var staSta = 0;
					$( "#my_table_bbro" ).find('p').each(function( i ) {
					    if ( name_n_old == $(this).text() ) {
					        $(this).text(name_n);

					         var sup_pere = $(this).closest('.new_table_bootsrp');
							 sup_pere.remove();
				
					        staSta=1;
					    } else {

					    }
					  });
					  if(staSta == 0) {
							Lobibox.notify('warning', {
													size: 'mini',
													showClass: 'zoomInLeft',
													hideClass: 'zoomOutRight',
													msg: 'something`s not right, refresh',
													img: $("#loged_in_image").attr("src")
											});
					  }



				
				$("#edit_department").find("input[type=text], textarea").val("");
				$('#dizmiz_tizzz').click();
				show_status ( "#add_department",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}
 					}
		



				$submit.removeAttr('disabled');
			}});	









		    } else {
 
		    }

		}


		});
			




	});


	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		$('span.fileinput-new').html(label);

		});

/*============================================add doc=======================================================*/

	$(document).on('change', '#department_name', function() {
	    show_status ( this,1, null);
		console.log(this);

	});



	$("#dfname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#dlname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#demail").keyup(function(e) {
		var email_ = $('#demail').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#demail", 2, null);
			return;
		}


console.log(email_);
		$.post('../ajax.php',{action:'chk_email', email:email_ },function(response){
				 console.log(response);
				response =$.parseJSON(response);
				if(response.success == 0){
					show_status ( "#demail", 1, null);
				} else if(response.success <5 ){
					show_status ( "#demail", 3, "already exists");
				}
			});	
	});

	$("#dmphone, #dlphone").intlTelInput("setCountry", "in");


	 $("#dmphone, #dlphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





	$("#dmphone").keyup(function(e) {
		var email_ = $('#dmphone').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		}  

console.log(email_);
		$.post('../ajax.php',{action:'chk_mobile', mobile:email_ },function(response){
				 console.log(response);
				response =$.parseJSON(response);
				if(response.success == 0){
					show_status ( "#dmphone", 1, null);
				} else if(response.success <5 ){
					show_status ( "#dmphone", 3, "already exists");
				}
			});	
	});



	$(document).on('change', '#dsex', function() {
	    show_status ( this,1, null);
		 
	});



	$(document).on('change', '#ddob > input[type=text]', function() {
		$date = $('#ddob > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#ddob').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '-20y'
    });




	$("#daddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});


$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})


	$(document).on('change', '#dqualification', function() {
		$dqualification = $("#dqualification option:selected").text();

			show_status ( this,0, null);
	    console.log($dqualification );
		if($dqualification.trim().length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log($dqualification);

	});



	$("#dprev_experiencez").keydown(function (e) { 
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 

	    show_status ( this,2,null);
                 return;
        } 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



	$('#dprev_experiencez').keyup( function() {
	 var innt =parseInt( $(this).val());

	    show_status ( this,0, null);
		console.log(innt); 

        if(innt <40){
	    show_status ( this,1, null);
	}
		else {
	    show_status ( this,2, null);
}

		console.log(innt);

	});


	$(document).on('change', '#djoin_date', function() {
	    show_status ( this,1, null);
		 
	});




	$(document).on('change', '#djoin_date > input[type=text]', function() {
		$date = $('#djoin_date > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#djoin_date').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '1d',
        startDate: '-10d'
    });



	$("#dpassword").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 6)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

 
	function chek_imag () {
		$dimage = $('span.fileinput-new').text();

			show_status ( this,0, null);
	    console.log($dimage );
		if($dimage.trim().length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log($dimage);

	}

 

 


	$("#add_doctor").validate({
		  rules: { 
				 dfname:{
				 		required: true,
				  		minlength: 2
						},
				 dlname:{
				 		required: true,
				  		minlength: 2
						},
				 demail:{
				 		required: true,
				 		email: true
						},
				dmphone:{
				 		required: true,
				  		minlength: 10
						},
				ddob:{
			 		    required: true,
							australianDate: true

						},
	dprev_experiencez:{
			 		    required: true,
						number: true
						},
			djoin_date:{
			 		    required: true,
							australianDate: true
						},
			dpassword:{
			 		    required: true
						}
				}, 
		submitHandler: function(form, event){
				var department_name = $('#department_name').val(); 
				 var dfname = $('#dfname').val();
				 var dlname = $('#dlname').val();
				 var demail = $('#demail').val();
				 var dmphone = $('#dmphone').val();
				 var dlphone = $('#dlphone').val();
				 var dsex = $('#dsex').val();
				 var ddob = $('#ddob> input[type=text]').val();
				var daddress = $('#daddress').val();

				var dqualification = $('#dqualification option:selected').text();

				 var dprev_experiencez = $('#dprev_experiencez').val();
				 var djoin_date = $('#djoin_date> input[type=text]').val();
				 var dpassword = $('#dpassword').val();
				 var upadanimage = $('#upadanimage>span.fileinput-new').text();

				 var dmphone_extension = parseInt($("#dmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 var dlphone_extension = parseInt($("#dlphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);




 
			 if( dfname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( dlname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			






if(dlphone)
	dlphone= dlphone_extension+dlphone+"";

 $('#load_doc_Add').button('loading');

			$submit = $('#add_doctor[type="submit"]');

			$.post('../ajax.php',{action:'add-doctor',
			department_name: department_name,
			dfname: dfname, dlname: dlname,
			demail : demail, 
			dmphone: dmphone_extension+dmphone,
			dlphone: dlphone,
			dsex: dsex,
			ddob: ddob, 
			daddress: daddress,
			dqualification: dqualification, 
			dprev_experiencez: dprev_experiencez,
			djoin_date: djoin_date,
			dpassword: dpassword,
			upadanimage : upadanimage

			},function(response){
				//$('.div_02').html(data);

				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) {
			 				 var parts = ddob.split("-");
    						dob = new Date(parts[2], parts[1] - 1, parts[0]);
			 		        var today = new Date();
					            age = new Date(today - dob).getFullYear();
					            age = parseInt(today.getFullYear())-parseInt(parts[2]);
					            $here_iz_id = response.success;

					$("#add_doctor").find("input[type=text], input[type=password], input[type=email] , textarea").val("");
					$('#dlname, #dfname').val("");
					$('#dmphone, #dlphone').val("");
					$('#upadanimage>span.fileinput-new').text("");
					$('#display_my_image_in_prof').attr("src", "");
//$("#mydiv")

			parent_base = $('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
		 

					

						$.post('../ajax.php',{action:'return_name', table_name:"department", id:department_name },function(response){
									if(response.substring(0, 5) == "Error"){

									console.log("error");
										actual = "0";
									} 
									if (response.trim().length > 1) {
					 
										response =$.parseJSON(response);
					 
										if(response.success.length >0){
					  
												actual =response.success;


$(".my_table_x4>tbody").prepend('<tr><td>'+dfname+' '+dlname+'</td><td><p>'+
						actual +
						'</p></td><td><p>'+demail+'</p></td> <td data-value="'+dmphone_extension+''+dmphone+'">'+
						dmphone_extension+''+dmphone+'</td><td data-value="'+age+'">'+age+
						'</td><td ><button type="button" id="'+$here_iz_id+
						'" class="btn btn-default btn-sm action_button_4">view<i class="fa fa-eye" aria-hidden="true"'+
						'style="position: inherit;display: inline-block;font-size: 20px;color: green;"></i>'+
						'</button> </td> </tr> ');






										} else  {
											 		actual = "0";			
											 	}

									}

								});	





			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				
					
				$submit.removeAttr('disabled');		
 $('#load_doc_Add').button('reset');

								
				}
			});	
			return false;
		}
			
	});
	








function return_new_name( table_name, id) {
		actual = "";
		$.post('../ajax.php',{action:'return_name', table_name:table_name, id:id },function(response){
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {
 
					response =$.parseJSON(response);
 
					if(response.success.length >0){
  
							actual =response.success;

					} else  {
						 		actual = "0";			
						 	}

				}

			});	
		return  actual;
	}



/*====================================================================================================*/

$.validator.addMethod(
    "australianDate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
    },
    "Please enter a date in the format dd-mm-yyyy."
);

/*====================================================================================================*/


$('#back_me_from_top').click( function () {

 	$('#add_here_thiz_5').css('display', 'block');
 	$('#dispaly_a_user_5').css('display', 'none');

});

 $(document).on( 'click', '.action_button_4', function () {
 	$idd = $(this).attr('id');

 	console.log($idd);

 $('#vdstatus').css("color", "inherit");	

 $('#show_image_5').attr("src","");
 $('#vdfname').text("");
 $('#vdlname').text("");
 $('#vddob').text("");
 $('#vdsex').text("");
 $('#vdmphon').text("");
 $('#vdlphone').text("");
 $('#vdaddress').text("");
 $('#vddepartment').text("");
 $('#vdqualification').text("");
 $('#vdljoindate').text("");
 $('#vdprev_experience').text("");

 $('#edit_me_from_top').attr("doc_id", $idd);

$.post('../ajax.php',{action:'return-doctor-details', id:$idd },function(response){

				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {
 
					response =$.parseJSON(response);

 					response_Success = response.success;

					if(response_Success.success == 1){
  
						response_Success = response_Success.value[0];


$morf = "";
if (response_Success.sex == "M") 
	$morf = "MALE";
else if(response_Success.sex == "F") 
	$morf = "FEMALE";

url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
	url = url+"/doctor/images_/"+response_Success.image;

	set_image_('#show_image_5', url) ;
 
 $('#vdfname').text( response_Success.fname);
 $('#vdlname').text( response_Success.lname);
 $('#vddob').text(response_Success.dob+" ("+response_Success.age+")" );
 $('#vdsex').text($morf );
 $('#vdsex').attr("valz", response_Success.sex );
 $('#vdemail').text( response_Success.email);
 $('#vdmphone').text( response_Success.mphone);
 $('#vdlphone').text(response_Success.lphone );
 $('#vdaddress').text(response_Success.address );
 $('#vddepartment').text( response_Success.department);
 $('#vdqualification').text(response_Success.qualification );
 $('#vdljoindate').text( response_Success.join_date);
 $('#vdprev_experience').text(response_Success.prev_experience +"  Years");

 $('#vdstatus').attr("status", response_Success.delete_status);
if(response_Success.delete_status == 0) {

 $('#vdstatus').text("active");		
 $('#vdstatus').css("color", "green");		
} else {

 $('#vdstatus').text("deleted");		
 $('#vdstatus').css("color", "red");	
}


					 	$('#add_here_thiz_5').css('display', 'none');
					 	$('#dispaly_a_user_5').css('display', 'block');

					} else  {
						 		actual = "0";			
						 	}

				}

			});	


 } );















/*============================================edit doc=======================================================*/

	$(document).on('change', '#eepartment_name', function() {
	    show_status ( this,1, null);
		console.log(this);

	});



	$("#efname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#elname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#eemail").keyup(function(e) {
		var email_ = $('#eemail').val();
		show_status ( this,0, null);


		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#eemail", 2, null);
			return;
		}

		show_status ( "#eemail",1, null);

 
	});

	$("#emphone, #elphone").intlTelInput("setCountry", "in");


	 $("#emphone, #elphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





 


	$(document).on('change', '#esex', function() {
	    show_status ( this,1, null);
		 
	});



	$(document).on('change', '#edob > input[type=text]', function() {
		$date = $('#edob > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#edob').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '-20y'
    });




	$("#eaddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});


$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})


	$(document).on('change', '#equalification', function() {
		$dqualification = $("#equalification option:selected").text();

			show_status ( this,0, null);
	    console.log($dqualification );
		if($dqualification.trim().length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log($dqualification);

	});



	$("#eprev_experiencez").keydown(function (e) { 
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 

	    show_status ( this,2,null);
                 return;
        } 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



	$('#eprev_experiencez').keyup( function() {
	 var innt =parseInt( $(this).val());

	    show_status ( this,0, null);
		console.log(innt); 

        if(innt <40){
	    show_status ( this,1, null);
	}
		else {
	    show_status ( this,2, null);
}

		console.log(innt);

	});


	$(document).on('change', '#ejoin_date', function() {
	    show_status ( this,1, null);
		 
	});




	$(document).on('change', '#ejoin_date > input[type=text]', function() {
		$date = $('#ejoin_date > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#ejoin_date').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '1d'
    });


 
 
 

	$("#edit_doctor").validate({
		  rules: { 
				 efname:{
				 		required: true,
				  		minlength: 2
						},
				 elname:{
				 		required: true,
				  		minlength: 2
						},
				 eemail:{
				 		required: true,
				 		email: true
						},
				emphone:{
				 		required: true,
				  		minlength: 10
						},
				edob:{
			 		    required: true,
							australianDate: true

						},
	eprev_experiencez:{
			 		    required: true,
						number: true
						},
			ejoin_date:{
			 		    required: true,
							australianDate: true
						} 
				}, 
		submitHandler: function(form, event){
			var idd = $('#edit_me_from_top').attr("doc_id");
				var eepartment_name = $('#eepartment_name').val(); 
				 var efname = $('#efname').val();
				 var elname = $('#elname').val();
				 var eemail = $('#eemail').val();
				 var emphone = $('#emphone').val();
				 var elphone = $('#elphone').val();
				 var esex = $('#esex').val();
				 var edob = $('#edob> input[type=text]').val();
				var eaddress = $('#eaddress').val();

				var equalification = $('#equalification option:selected').text();

				 var eprev_experiencez = $('#eprev_experiencez').val();
				 var ejoin_date = $('#ejoin_date> input[type=text]').val(); 
				 var epadanimage = $('#epadanimage>span.fileinput-new').text();

				 var emphone_extension = parseInt($("#emphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 var elphone_extension = parseInt($("#elphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);




 
			 if( efname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( elname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			






if(elphone)
	elphone= elphone_extension+elphone+"";

 


 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'edit-doctor',
			id: idd,
			eepartment_name: eepartment_name,
			efname: efname, 
			elname: elname,
			eemail : eemail, 
			emphone: emphone_extension+emphone,
			elphone: elphone,
			esex: esex,
			edob: edob, 
			eaddress: eaddress,
			equalification: equalification, 
			eprev_experiencez: eprev_experiencez,
			ejoin_date: ejoin_date, 
			epadanimage : epadanimage

			},function(response){
				//$('.div_02').html(data);
 
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) {
			 	 
			 				 var parts = edob.split("-");
    						dob = new Date(parts[2], parts[1] - 1, parts[0]);
			 		        var today = new Date();
					            age = new Date(today - dob).getFullYear();
					            age = parseInt(today.getFullYear())-parseInt(parts[2]);
					            $here_iz_id = response.success;

					$("#edit_doctor").find("input[type=text], input[type=password], input[type=email], textarea").val("");
					$('#elname, #efname').val("");
					$('#emphone, #elphone').val("");
					$('#epadanimage>span.fileinput-new').text("");
					$('#eisplay_my_image_in_prof').attr("src", "");
//$("#mydiv")

			parent_base = $('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
		 

					
					

						$.post('../ajax.php',{action:'return_name', table_name:"department", id:eepartment_name },function(response){
									if(response.substring(0, 5) == "Error"){

									console.log("error");
										actual = "0";
									} 
									if (response.trim().length > 1) {
					 
										response =$.parseJSON(response);
					 
										if(response.success.length >0){
					  
												actual =response.success;



					var you_k = $(".my_table_x4>tbody").find('button').each( function() {
							if($(this).attr('id') == $here_iz_id) {

								$(this).parent().closest('tr').remove();
							}

					}
							
						);






$(".my_table_x4>tbody").prepend('<tr><td>'+efname+' '+elname+'</td><td><p>'+
						actual +
						'</p></td><td><p>'+eemail+'</p></td> <td data-value="'+emphone_extension+''+emphone+'">'+
						emphone_extension+''+emphone+'</td><td data-value="'+age+'">'+age+
						'</td><td ><button type="button" id="'+$here_iz_id+
						'" class="btn btn-default btn-sm action_button_4">view<i class="fa fa-eye" aria-hidden="true"'+
						'style="position: inherit;display: inline-block;font-size: 20px;color: green;"></i>'+
						'</button> </td> </tr> ');






										} else  {
											 		actual = "0";			
											 	}

									}

								});	



				 

						$('#dizmiz_tizzzx').click();
						$('#back_me_from_top').click();
						
						var you_k =  $(".my_table_x4>tbody").find('button').each( function() {
							if($(this).attr('id') == $here_iz_id) {

								 $(this).click();
							}

					}
							
						); 


			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				
					
				$submit.removeAttr('disabled');					
								
				}
			});	
			return false;
		}
			
	});
	


















/*=========================================================================================*/




function set_image_($this, $url) {

	url= window.location.href;  
	 url = url.substring(0, url.lastIndexOf('/'));
	url = url.substring(0, url.lastIndexOf('/'));
	$string_trturn = url+"/assets/images/default.png";


	$.ajax({
	    url:$url,
	    type:'HEAD',
	    error: function()
	    {
	    	$($this).attr("src",$string_trturn);
	    },
	    success: function()
	    { 
	    	$($this).attr("src",$url);
	    }
	});

}


  	$("#emphone").intlTelInput();
  	$("#elphone").intlTelInput();

	$("#emphone, #elphone").intlTelInput("setCountry", "in");


$(document).on ( 'click', '#edit_me_from_top' , function() {

  


	$("#elphone").val("");
	$("#eaddress").val(""); 




 	texy = $('#vddepartment').text();
  
	$me_ma = $("#eepartment_name option").filter(function() {
	    return this.text == texy; 
	});
 

	texy = $($me_ma).attr("value"); 

$("#eepartment_name").val(texy ).trigger('change');


	$('#efname').val( $('#vdfname').text());
	$('#elname').val($('#vdlname').text());
	$('#eemail').val($('#vdemail').text()); 
	$('#esex').val($('#vdsex').attr("valz"));


 
	$("#ejoin_date").children('input').val( $('#vdljoindate').text());

	values= $('#vddob').text().split('(');
 
 	var date = values[0].trim().split("-"); 
    console.log(date[0]);
    console.log(date[1]);
    console.log(date[2]); 
	
	$("#edob").children('input').val(date[2]+"-"+date[1]+"-"+date[0]); 

 	var date = $('#vdljoindate').text().split("-"); 
    console.log(date[0]);
    console.log(date[1]);
    console.log(date[2]); 

	$('#ejoin_date').children('input').val(date[2]+"-"+date[1]+"-"+date[0]); 



	$("#emphone").intlTelInput("setNumber", "+"+$('#vdmphone').text()); 
	var emphone_extension = parseInt($("#emphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
	
	emphone_extension = emphone_extension+"";
	var emphone = $('#emphone').val();
	if(emphone.charAt(0)=='+')
		emphone = emphone.substring(1);

	for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
		if(emphone_extension[ii]==emphone[ii])
			jj++;
	emphone = emphone.substring(jj);
	$("#emphone").val(emphone);


  



	



 	if($('#vdlphone').text().length >8){

	$("#elphone").intlTelInput("setNumber", "+"+$('#vdlphone').text()); 
 var elphone_extension = parseInt($("#elphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
	
	elphone_extension = elphone_extension+"";
	var elphone = $('#elphone').val();
console.log(elphone);

	if(elphone.charAt(0)=='+')
		elphone = elphone.substring(1);

	for( ii = 0, jj=0; ii <elphone_extension.length; ii++)
		if(elphone_extension[ii]==elphone[ii])
			jj++;
	elphone = elphone.substring(jj);
console.log(elphone);

	$("#elphone").val(elphone);


 	}



	$('#eaddress').val($('#vdaddress').text());

	$('#equalification option[text="'+$('#vdqualification').text()+'"]').prop('selected', true);




 
 	texy = $('#vdqualification').text();
 

	$me_ma = $("#equalification option").filter(function() {
    return this.text == texy; 
});
 

	texy = $($me_ma).attr("value");


$("#equalification").val(texy ).trigger('change');







	values= $('#vdprev_experience').text().split('Y');
	$('#eprev_experiencez').val(values[0].trim());
	
/*
	$('#ejoin_date> input[type=text]').val($('#vdlphone').text());
*/
 
	$('#epadanimage>span.fileinput-new').text();

	   
 
	filename= $('#show_image_5').attr("src")
	filename = filename.substr(filename.lastIndexOf("/") + 1);


	$('#eimage_base').find('span.fileinput-new').text(filename);
	$('#eimage_base' ).find('img').attr('src',$('#show_image_5').attr("src"));			 

	if ($('#vdstatus').attr("status") == 1) {
		$('#edelete_this_item_here').removeClass('btn-danger');
		$('#edelete_this_item_here').addClass('btn-success');
		$('#edelete_this_item_here').text('active');
		$('#edelete_this_item_here').attr('status', 0);
	} else if ($('#vdstatus').attr("status") == 0) {
		$('#edelete_this_item_here').removeClass('btn-success');
		$('#edelete_this_item_here').addClass('btn-danger');
		$('#edelete_this_item_here').text('delete');
		$('#edelete_this_item_here').attr('status', 1);
	}

  
 




	$('#show_the-popupzP_6').click();
});



$('#edelete_this_item_here').click( function() {

			var idd = $('#edit_me_from_top').attr("doc_id");
			var status = $('#edelete_this_item_here').attr('status');
			$.post('../ajax.php',{action:'delete_doctor', id:idd ,status:status},function(response){
				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {
 
					response =$.parseJSON(response);
 
					if(response.success ==1){
  
							  



		 

						$('#dizmiz_tizzzx').click();
						$('#back_me_from_top').click();


			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully deleted' ,
											img: $("#loged_in_image").attr("src")
									});




		$('#dizmiz_tizzzx').click();
						$('#back_me_from_top').click();
						
						var you_k = $(".my_table_x4>tbody").find('button').each( function() {
							if($(this).attr('id') == idd) {

								$(this).click();
							}

					}
							
						); 



					} else  {
						 						 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all are correct' ,
											img: $("#loged_in_image").attr("src")
									});		
						 	}

				}

			});	

});






















/*============================================add nurse=======================================================*/

  	$("#nmphone").intlTelInput();
  	$("#nlphone").intlTelInput();


	$(document).on('change', '#nepartment_name', function() {
	    show_status ( this,1, null);
		console.log(this);

	});



	$("#nfname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#nlname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#nemail").keyup(function(e) {
		var email_ = $('#nemail').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#nemail", 2, null);
			return;
		}


console.log(email_);
		$.post('../ajax.php',{action:'chk_email', email:email_ },function(response){
				 console.log(response);
				response =$.parseJSON(response);
				if(response.success == 0){
					show_status ( "#nemail", 1, null);
				} else if(response.success <5 ){
					show_status ( "#nemail", 3, "already exists");
				}
			});	
	});

	$("#nmphone, #nlphone").intlTelInput("setCountry", "in");


	 $("#nmphone, #nlphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





	$("#nmphone").keyup(function(e) {
		var email_ = $('#nmphone').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		}  

console.log(email_);
		$.post('../ajax.php',{action:'chk_mobile', mobile:email_ },function(response){
				 console.log(response);
				response =$.parseJSON(response);
				if(response.success == 0){
					show_status ( "#nmphone", 1, null);
				} else if(response.success <5 ){
					show_status ( "#nmphone", 3, "already exists");
				}
			});	
	});



	$(document).on('change', '#nsex', function() {
	    show_status ( this,1, null);
		 
	});



	$(document).on('change', '#ndob > input[type=text]', function() {
		$date = $('#ndob > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#ndob').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '-20y'
    });




	$("#naddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});

 
 


  

	$(document).on('change', '#njoin_date', function() {
	    show_status ( this,1, null);
		 
	});




	$(document).on('change', '#njoin_date > input[type=text]', function() {
		$date = $('#njoin_date > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#njoin_date').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '1d',
        startDate: '-10d'
    });


  
 

 


	$("#add_nurse").validate({
		  rules: { 
				 nfname:{
				 		required: true,
				  		minlength: 2
						},
				 nlname:{
				 		required: true,
				  		minlength: 2
						},
				 nemail:{
				 		required: true,
				 		email: true
						},
				nmphone:{
				 		required: true,
				  		minlength: 10
						},
				ndob:{
			 		    required: true,
							australianDate: true

						}, 
			njoin_date:{
			 		    required: true,
							australianDate: true
						} 
				}, 
		submitHandler: function(form, event){
				var nepartment_name = $('#nepartment_name').val(); 
				 var nfname = $('#nfname').val();
				 var nlname = $('#nlname').val();
				 var nemail = $('#nemail').val();
				 var nmphone = $('#nmphone').val(); 
				 var nsex = $('#nsex').val();
				 var ndob = $('#ndob> input[type=text]').val();
				var naddress = $('#naddress').val();
  
				 var njoin_date = $('#njoin_date> input[type=text]').val(); 
				 var npadanimage = $('#npadanimage>span.fileinput-new').text();

				 var nmphone_extension = parseInt($("#nmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				



 
			 if( nfname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( nlname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			





 
 $('#load_doc_Add').button('loading');

 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'add-nurse',
			nepartment_name: nepartment_name,
			nfname: nfname, nlname: nlname,
			nemail : nemail, 
			nmphone: nmphone_extension+nmphone, 
			nsex: nsex,
			ndob: ndob, 
			naddress: naddress, 
			njoin_date: njoin_date, 
			npadanimage : npadanimage

			},function(response){ 
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) {
			 				 var parts = ndob.split("-");
    						dob = new Date(parts[2], parts[1] - 1, parts[0]);
			 		        var today = new Date();
					            age = new Date(today - dob).getFullYear();
					            age = parseInt(today.getFullYear())-parseInt(parts[2]);
					            $here_iz_id = response.success;

					$("#add_nurse").find("input[type=text], input[type=password], input[type=email], textarea").val("");
					$('#nlname, #nfname').val("");
					$('#nmphone, #nlphone').val("");
					$('#npadanimage>span.fileinput-new').text("");
					$('#nisplay_my_image_in_prof').attr("src", "");
//$("#mydiv")

			parent_base = $('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
		 

					

						$.post('../ajax.php',{action:'return_name', table_name:"department", id:nepartment_name },function(response){
									
									console.log(response);
									if(response.substring(0, 5) == "Error"){

									console.log("error");
										actual = "0";
									} 
									if (response.trim().length > 1) {
					 
										response =$.parseJSON(response);
					 
										if(response.success.length >0){
					  
												actual =response.success;


$(".my_table_x46>tbody").prepend('<tr><td>'+nfname+' '+nlname+'</td><td><p>'+
						actual +
						'</p></td><td><p>'+nemail+'</p></td> <td data-value="'+nmphone_extension+''+nmphone+'">'+
						nmphone_extension+''+nmphone+'</td><td data-value="'+age+'">'+age+
						'</td><td ><button type="button" id="'+$here_iz_id+
						'" class="btn btn-default btn-sm action_button_46">view<i class="fa fa-eye" aria-hidden="true"'+
						'style="position: inherit;display: inline-block;font-size: 20px;color: green;"></i>'+
						'</button> </td> </tr> ');






										} else  {
											 		actual = "0";			
											 	}

									}

								});	





			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				
 $('#load_doc_Add').button('reset');
					
				$submit.removeAttr('disabled');					
								
				}
			});	
			return false;
		}
			
	});
	


/*8****8*****/


$('#nback_me_from_top').click( function () {

 	$('#add_nurse_here_thiz_5').css('display', 'block');
 	$('#dispaly_a_nurse_5').css('display', 'none');

});
 

 $(document).on( 'click', '.action_button_46', function () {
 	$idd = $(this).attr('id');

 	console.log($idd);

 $('#nvdstatus').css("color", "inherit");	

 $('#nshow_image_5').attr("src","");
 $('#nvdfname').text("");
 $('#nvdlname').text("");
 $('#nvddob').text("");
 $('#nvdsex').text("");
 $('#nvdmphon').text(""); 
 $('#nvdaddress').text("");
 $('#nvddepartment').text(""); 
 $('#nvdljoindate').text(""); 

 $('#nedit_me_from_top').attr("doc_id", $idd);

$.post('../ajax.php',{action:'return-nurse-details', id:$idd },function(response){

				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {
 
					response =$.parseJSON(response);

 					response_Success = response.success;

					if(response_Success.success == 1){
  
						response_Success = response_Success.value[0];


$morf = "";
if (response_Success.sex == "M") 
	$morf = "MALE";
else if(response_Success.sex == "F") 
	$morf = "FEMALE";

url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
	url = url+"/nurse/images_/"+response_Success.image;

	set_image_('#nshow_image_5', url) ;

 $('#nvdfname').text( response_Success.fname);
 $('#nvdlname').text( response_Success.lname);
 $('#nvddob').text(response_Success.dob+" ("+response_Success.age+")" );
 $('#nvdsex').text($morf );
 $('#nvdsex').attr("valz", response_Success.sex );
 $('#nvdemail').text( response_Success.email);
 $('#nvdmphone').text( response_Success.mphone); 
 $('#nvdaddress').text(response_Success.address );
 $('#nvddepartment').text( response_Success.department); 
 $('#nvdljoindate').text( response_Success.join_date); 

 $('#nvdstatus').attr("status", response_Success.delete_status);
if(response_Success.delete_status == 0) {

 $('#nvdstatus').text("active");		
 $('#nvdstatus').css("color", "green");		
} else {

 $('#nvdstatus').text("deleted");		
 $('#nvdstatus').css("color", "red");	
}


					 	$('#add_nurse_here_thiz_5').css('display', 'none');
					 	$('#dispaly_a_nurse_5').css('display', 'block');

					} else  {
						 		actual = "0";			
						 	}

				}

			});	


 } );





  	$("#nemphone").intlTelInput(); 

	$("#nemphone, #elphone").intlTelInput("setCountry", "in");


$(document).on ( 'click', '#nedit_me_from_top' , function() {

  

 
	$("#neaddress").val(""); 




 	texy = $('#nvddepartment').text();
  
	$me_ma = $("#neepartment_name option").filter(function() {
	    return this.text == texy; 
	});
 

	texy = $($me_ma).attr("value"); 

$("#neepartment_name").val(texy ).trigger('change');


	$('#nefname').val( $('#nvdfname').text());
	$('#nelname').val($('#nvdlname').text());
	$('#neemail').val($('#nvdemail').text()); 
	$('#nesex').val($('#nvdsex').attr("valz"));


 
	$("#nejoin_date").children('input').val( $('#nvdljoindate').text());

	values= $('#nvddob').text().split('(');
 
 	var date = values[0].trim().split("-"); 
    console.log(date[0]);
    console.log(date[1]);
    console.log(date[2]); 
	
	$("#nedob").children('input').val(date[2]+"-"+date[1]+"-"+date[0]); 

 	var date = $('#nvdljoindate').text().split("-"); 
    console.log(date[0]);
    console.log(date[1]);
    console.log(date[2]); 

	$('#nejoin_date').children('input').val(date[2]+"-"+date[1]+"-"+date[0]); 



	$("#nemphone").intlTelInput("setNumber", "+"+$('#nvdmphone').text()); 
	var emphone_extension = parseInt($("#nemphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
	
	emphone_extension = emphone_extension+"";
	var emphone = $('#nemphone').val();
	if(emphone.charAt(0)=='+')
		emphone = emphone.substring(1);

	for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
		if(emphone_extension[ii]==emphone[ii])
			jj++;
	emphone = emphone.substring(jj);
	$("#nemphone").val(emphone);


  


 


	$('#neaddress').val($('#nvdaddress').text());
 

  
	
/*
	$('#ejoin_date> input[type=text]').val($('#vdlphone').text());
*/
 
	$('#nepadanimage>span.fileinput-new').text();

	   
 
	filename= $('#nshow_image_5').attr("src")
	filename = filename.substr(filename.lastIndexOf("/") + 1);


	$('#neimage_base').find('span.fileinput-new').text(filename);
	$('#neimage_base' ).find('img').attr('src',$('#nshow_image_5').attr("src"));			 

	if ($('#nvdstatus').attr("status") == 1) {
		$('#nedelete_this_item_here').removeClass('btn-danger');
		$('#nedelete_this_item_here').addClass('btn-success');
		$('#nedelete_this_item_here').text('active');
		$('#nedelete_this_item_here').attr('status', 0);
	} else if ($('#nvdstatus').attr("status") == 0) {
		$('#nedelete_this_item_here').removeClass('btn-success');
		$('#nedelete_this_item_here').addClass('btn-danger');
		$('#nedelete_this_item_here').text('delete');
		$('#nedelete_this_item_here').attr('status', 1);
	}

  
 




	$('#nshow_the-popupzP_6').click();
});








$('#nedelete_this_item_here').click( function() {

			var idd = $('#nedit_me_from_top').attr("doc_id");
			var status = $('#nedelete_this_item_here').attr('status');
			if(idd ==  null)
				return;
			$.post('../ajax.php',{action:'delete_nurse', id:idd ,status:status},function(response){
				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {
 
					response =$.parseJSON(response);
 
					if(response.success ==1){
  
							  



		 

						$('#ndizmiz_tizzzx').click();
						$('#nback_me_from_top').click();


			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully deleted' ,
											img: $("#loged_in_image").attr("src")
									});




		$('#ndizmiz_tizzzx').click();
						$('#nback_me_from_top').click();
						
						var you_k = $(".my_table_x46>tbody").find('button').each( function() {
							if($(this).attr('id') == idd) {

								$(this).click();
							}

					}
							
						); 



					} else  {
						 						 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all are correct' ,
											img: $("#loged_in_image").attr("src")
									});		
						 	}

				}

			});	

});








/*============================================edit nurse=======================================================*/

	$(document).on('change', '#neepartment_name', function() {
	    show_status ( this,1, null);
		console.log(this);

	});



	$("#nefname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#nelname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#neemail").keyup(function(e) {
		var email_ = $('#neemail').val();
		show_status ( this,0, null);


		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#neemail", 2, null);
			return;
		}

		show_status ( "#neemail",1, null);

 
	});

	$("#nemphone").intlTelInput("setCountry", "in");


	 $("#nemphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





 


	$(document).on('change', '#nesex', function() {
	    show_status ( this,1, null);
		 
	});



	$(document).on('change', '#nedob > input[type=text]', function() {
		$date = $('#nedob > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#nedob').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '-20y'
    });




	$("#neaddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});


$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})


	$(document).on('change', '#nequalification', function() {
		$dqualification = $("#nequalification option:selected").text();

			show_status ( this,0, null);
	    console.log($dqualification );
		if($dqualification.trim().length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log($dqualification);

	});



	$("#neprev_experiencez").keydown(function (e) { 
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 

	    show_status ( this,2,null);
                 return;
        } 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



	$('#neprev_experiencez').keyup( function() {
	 var innt =parseInt( $(this).val());

	    show_status ( this,0, null);
		console.log(innt); 

        if(innt <40){
	    show_status ( this,1, null);
	}
		else {
	    show_status ( this,2, null);
}

		console.log(innt);

	});


	$(document).on('change', '#nejoin_date', function() {
	    show_status ( this,1, null);
		 
	});




	$(document).on('change', '#nejoin_date > input[type=text]', function() {
		$date = $('#nejoin_date > input[type=text]').val();
	     
			show_status ( this,0, null);
	    console.log($date );
		if($date.length > 2){
			show_status ( this,1, null);
		} else {
			show_status ( this,2, null);
		}


		console.log(this);

	});


 

    $('#nejoin_date').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '1d'
    });


 
 
 

	$("#edit_nurse").validate({
		  rules: { 
				 nefname:{
				 		required: true,
				  		minlength: 2
						},
				 nelname:{
				 		required: true,
				  		minlength: 2
						},
				 neemail:{
				 		required: true,
				 		email: true
						},
				nemphone:{
				 		required: true,
				  		minlength: 10
						},
				nedob:{
			 		    required: true,
							australianDate: true

						}, 
			ejoin_date:{
			 		    required: true,
							australianDate: true
						} 
				}, 
		submitHandler: function(form, event){
			var nidd = $('#nedit_me_from_top').attr("doc_id");
				var neepartment_name = $('#neepartment_name').val(); 
				 var nefname = $('#nefname').val();
				 var nelname = $('#nelname').val();
				 var neemail = $('#neemail').val();
				 var nemphone = $('#nemphone').val(); 
				 var nesex = $('#nesex').val();
				 var nedob = $('#nedob> input[type=text]').val();
				var neaddress = $('#neaddress').val();
 
 
				 var nejoin_date = $('#nejoin_date> input[type=text]').val(); 
				 var nepadanimage = $('#nepadanimage>span.fileinput-new').text();

				 var nemphone_extension = parseInt($("#nemphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 



 
			 if( nefname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( nelname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			





 

 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'edit-nurse',
			nid: nidd,
			neepartment_name: neepartment_name,
			nefname: nefname, 
			nelname: nelname,
			neemail : neemail, 
			nemphone: nemphone_extension+nemphone, 
			nesex: nesex,
			nedob: nedob, 
			neaddress: neaddress, 
			nejoin_date: nejoin_date, 
			nepadanimage : nepadanimage

			},function(response){
				//$('.div_02').html(data);
 
				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) {
			 	 
			 				 var parts = nedob.split("-");
    						dob = new Date(parts[2], parts[1] - 1, parts[0]);
			 		        var today = new Date();
					            age = new Date(today - dob).getFullYear();
					            age = parseInt(today.getFullYear())-parseInt(parts[2]);
					            $here_iz_id = response.success;

					$("#nedit_doctor").find("input[type=text], input[type=password], input[type=email], textarea").val("");
					$('#nelname, #efname').val("");
					$('#nemphone, #elphone').val("");
					$('#nepadanimage>span.fileinput-new').text("");
					$('#neisplay_my_image_in_prof').attr("src", "");
//$("#mydiv")

			parent_base = $('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
		 

					
					

						$.post('../ajax.php',{action:'return_name', table_name:"department", id:neepartment_name },function(response){
									if(response.substring(0, 5) == "Error"){

									console.log("error");
										actual = "0";
									} 
									if (response.trim().length > 1) {
					 
										response =$.parseJSON(response);
					 
										if(response.success.length >0){
					  
												actual =response.success;



					var you_k = $(".my_table_x46>tbody").find('button').each( function() {
							if($(this).attr('id') == $here_iz_id) {

								$(this).parent().closest('tr').remove();
							}

					}
							
						);






$(".my_table_x46>tbody").prepend('<tr><td>'+nefname+' '+nelname+'</td><td><p>'+
						actual +
						'</p></td><td><p>'+neemail+'</p></td> <td data-value="'+nemphone_extension+''+nemphone+'">'+
						nemphone_extension+''+nemphone+'</td><td data-value="'+age+'">'+age+
						'</td><td ><button type="button" id="'+$here_iz_id+
						'" class="btn btn-default btn-sm action_button_46">view<i class="fa fa-eye" aria-hidden="true"'+
						'style="position: inherit;display: inline-block;font-size: 20px;color: green;"></i>'+
						'</button> </td> </tr> ');






										} else  {
											 		actual = "0";			
											 	}

									}

								});	



				 

						$('#ndizmiz_tizzzx').click();
						$('#nback_me_from_top').click();
						
						var you_k = $(".my_table_x46>tbody").find('button').each( function() {
							if($(this).attr('id') == $here_iz_id) {

								 $(this).click();
							}

					}
							
						); 


			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				
					
				$submit.removeAttr('disabled');					
								
				}
			});	
			return false;
		}
			
	});
	

























	 

/*====================================================================================================*/




/*============================================add pharmacist=======================================================*/

  	$("#pmphone").intlTelInput();
  	$("#plphone").intlTelInput();
 



	$(document).on('change', '#pepartment_name', function() {
	    show_status ( this,1, null);
		console.log(this);

	});



	$("#pfname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#plname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#pemail").keyup(function(e) {
		var email_ = $('#pemail').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#pemail", 2, null);
			return;
		}


console.log(email_);
		$.post('../ajax.php',{action:'chk_email', email:email_ },function(response){
				 console.log(response);
				response =$.parseJSON(response);
				if(response.success == 0){
					show_status ( "#pemail", 1, null);
				} else if(response.success <5 ){
					show_status ( "#pemail", 3, "already exists");
				}
			});	
	});

	$("#pmphone, #plphone").intlTelInput("setCountry", "in");


	 $("#pmphone, #plphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





	$("#pmphone").keyup(function(e) {
		var email_ = $('#pmphone').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		}  

console.log(email_);
		$.post('../ajax.php',{action:'chk_mobile', mobile:email_ },function(response){
				 console.log(response);
				response =$.parseJSON(response);
				if(response.success == 0){
					show_status ( "#pmphone", 1, null);
				} else if(response.success <5 ){
					show_status ( "#pmphone", 3, "already exists");
				}
			});	
	});

 

 
 
 	$(document).on('change', '#pduty', function() {
	    show_status ( this,1, null);
		 
	});





	$("#paddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});
 
 




	$("#ppassword").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 6)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

 
 
 

 


	$("#add_pharmacist").validate({
		  rules: { 
				 dfname:{
				 		required: true,
				  		minlength: 2
						},
				 dlname:{
				 		required: true,
				  		minlength: 2
						},
				 demail:{
				 		required: true,
				 		email: true
						},
				dmphone:{
				 		required: true,
				  		minlength: 10
						},   
			dpassword:{
			 		    required: true
						}
				}, 
		submitHandler: function(form, event){ 
				 var pfname = $('#pfname').val();
				 var plname = $('#plname').val();
				 var pemail = $('#pemail').val();
				 var pmphone = $('#pmphone').val();
				 var plphone = $('#plphone').val(); 
				var paddress = $('#paddress').val();
  
				 var pduty = $('#pduty').val();
				 var ppassword = $('#ppassword').val();
				 var ppadanimage = $('#ppadanimage>span.fileinput-new').text();

				 var pmphone_extension = parseInt($("#pmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 var plphone_extension = parseInt($("#plphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);



				 $image = $('#pisplay_my_image_in_prof').attr('src');
 
			 if( pfname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( plname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			






if(plphone)
	plphone= plphone_extension+plphone+"";

 $('#load_doc_Add').button('loading');
 
			$submit = $('#add_pharmacist[type="submit"]');

			$.post('../ajax.php',{action:'add-pharmacist', 
			pfname: pfname, 
			plname: plname,
			pemail : pemail, 
			pmphone: pmphone_extension+pmphone,
			plphone: plphone,
			pduty: pduty, 
			paddress: paddress, 
			ppassword: ppassword,
			ppadanimage : ppadanimage

			},function(response){
				//$('.div_02').html(data);

				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) { 
					            $here_iz_id = response.success;

					$("#add_pharmacist").find("input[type=text], input[type=password], input[type=email], textarea").val("");
					$('#plname, #pfname').val("");
					$('#pmphone, #plphone').val("");
					$('#ppadanimage>span.fileinput-new').text("");
					$('#pisplay_my_image_in_prof').attr("src", "");
//$("#mydiv")

			parent_base = $('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
		 
 
					

 $("#id_my_pharmac_tab").prepend( '<div class="row form_label_main_me"><div class=" col-md-3">'+
                              '<img src="'+$image+'" style="height: 200px; width: 200px;"></div><div class=" col-md-4">'+
                              '<div class="form-horizontal new_edited_pha" ><div class="form-group"><label  class="col-sm-5 control-label">Name</label>'+
                              '<span class="col-sm-7" style="color:inherit;")>'+
                              pfname+' '+plname+'</span></div> <div class="form-group"><label  class="col-sm-5 control-label">Email</label>'+
                              '<span class="col-sm-7">'+pemail+'</span></div><div class="form-group"><label  class="col-sm-5 control-label">mobile phone</label>'+
                               '<span class="col-sm-7">'+pmphone_extension+pmphone+'</span></div><div class="form-group"><label  class="col-sm-5 control-label">landline</label>'+
                               '<span class="col-sm-7">'+plphone+' </span></div></div></div><div class=" col-md-4"><div class="form-horizontal new_edited_pha" >'+
                               '<div class="form-group"><label  class="col-sm-5 control-label">duty</label> <span class="col-sm-7">'+ 
                               pduty+'</span></div><div class="form-group"><label  class="col-sm-5 control-label">address</label>'+
                                '<textarea class="col-sm-7 me_my_textarea_ext" >'+paddress+'</textarea></div></div></div><div class=" col-md-1">'+
                                '<button id="'+$here_iz_id+'" status="0"   class ="btn btn-default button_edit_for_pharmc" > <i class="fa fa-pencil-square-o add_back_button_a" aria-hidden="true"></i>'+
                                'edit </button></div></div>');









			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				
					
				$submit.removeAttr('disabled');					
 $('#load_doc_Add').button('reset');
								
				}
			});	
			return false;
		}
			
	});
	

  	$("#epmphone").intlTelInput();
  	$("#eplphone").intlTelInput();
 




	$(document).on('click', '.button_edit_for_pharmc', function() {

 		$idd = $(this).attr('id');





					$('#epfname').val( "");
					$('#eplname').val("");
					$('#epemail').val(""); 
					$('#epduty').val("");

				  

					$("#epmphone").children("input").val(""); 

					$("#eplphone").children("input").val(""); 


					$('#epaddress').val(""); 
				 

					$('#epimage_base').find('span.fileinput-new').text("");







		$.post('../ajax.php',{action:'return-pharmacist-details', id:$idd },function(response){

				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {

					response =$.parseJSON(response);
 					response_Success = response.success;

					if(response_Success.success == 1){
  
						response_Success = response_Success.value[0];


					$("#epaddress").val(""); 

				 $('#edit_pharmacist').attr('pha_id', $idd);

					$('#epfname').val( response_Success.fname);
					$('#eplname').val(response_Success.lname);
					$('#epemail').val(response_Success.email); 
					$('#epduty').val(response_Success.duty.toLowerCase());

				  

					$("#epmphone").intlTelInput("setNumber", "+"+response_Success.mphone); 
					var emphone_extension = parseInt($("#epmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
					
					emphone_extension = emphone_extension+"";
					var emphone = $('#epmphone').val();
					if(emphone.charAt(0)=='+')
						emphone = emphone.substring(1);

					for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
						if(emphone_extension[ii]==emphone[ii])
							jj++;
					emphone = emphone.substring(jj);
					$("#epmphone").val(emphone);
				 






					$("#eplphone").intlTelInput("setNumber", "+"+response_Success.lphone); 
					emphone_extension = parseInt($("#eplphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
					
					emphone_extension = emphone_extension+"";
					var emphone = $('#eplphone').val();
					if(emphone.charAt(0)=='+')
						emphone = emphone.substring(1);

					for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
						if(emphone_extension[ii]==emphone[ii])
							jj++;
					emphone = emphone.substring(jj);
					$("#eplphone").val(emphone);
				 







					$('#epaddress').val(response_Success.address); 
				 
					$('#eppadanimage>span.fileinput-new').text();

					    

	url      = window.location.href;  
	 url = url.substring(0, url.lastIndexOf('/'));
	url = url.substring(0, url.lastIndexOf('/'));
		url = url+"/pharmacist/images_/"+response_Success.image;

		set_image_('#episplay_my_image_in_prof', url) ;
	 


//episplay_my_image_in_prof

					$('#epimage_base').find('span.fileinput-new').text(response_Success.image);

				 
					if (response_Success.delete_status == 1) {
						$('#eedelete_this_item_here').removeClass('btn-danger');
						$('#eedelete_this_item_here').addClass('btn-success');
						$('#eedelete_this_item_here').text('active');
						$('#eedelete_this_item_here').attr('status', 0);
					} else if (response_Success.delete_status == 0) {
						$('#eedelete_this_item_here').removeClass('btn-success');
						$('#eedelete_this_item_here').addClass('btn-danger');
						$('#eedelete_this_item_here').text('delete');
						$('#eedelete_this_item_here').attr('status', 1);
					}
				 

						$('#show_the-popupzP_6x').click();


					}
				}

			});

 



	});















/*============================================edit pharmacist=======================================================*/

  



	$(document).on('change', '#epepartment_name', function() {
	    show_status ( this,1, null);
		console.log(this);

	});



	$("#epfname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#eplname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#epemail").keyup(function(e) {
		var email_ = $('#epemail').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#epemail", 2, null);
			return;
		}

			show_status ( "#epemail", 1, null);
 
	});

	$("#epmphone, #eplphone").intlTelInput("setCountry", "in");


	 $("#epmphone, #eplphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





	$("#epmphone").keyup(function(e) {
		var email_ = $('#epmphone').val();
		show_status ( this,0, null);
		if( email_ == ''){
			show_status ( this,2, null);
			return;
		}  

			show_status ( this,1, null);
 
	});

 

 
 
 	$(document).on('change', '#epduty', function() {
	    show_status ( this,1, null);
		 
	});





	$("#epaddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});
 
 

 
 
 
 

 


	$("#edit_pharmacist").validate({
		  rules: { 
				 dfname:{
				 		required: true,
				  		minlength: 2
						},
				 dlname:{
				 		required: true,
				  		minlength: 2
						},
				 demail:{
				 		required: true,
				 		email: true
						},
				dmphone:{
				 		required: true,
				  		minlength: 10
						}
				}, 
		submitHandler: function(form, event){ 
				var idd =  $('#edit_pharmacist').attr('pha_id');
				 var pfname = $('#epfname').val();
				 var plname = $('#eplname').val();
				 var pemail = $('#epemail').val();
				 var pmphone = $('#epmphone').val();
				 var plphone = $('#eplphone').val(); 
				var paddress = $('#epaddress').val();
  
				 var pduty = $('#epduty').val(); 
				 var ppadanimage = $('#eppadanimage>span.fileinput-new').text();

				 var pmphone_extension = parseInt($("#epmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 var plphone_extension = parseInt($("#eplphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);



				 $image = $('#episplay_my_image_in_prof').attr('src');
 
			 if( pfname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( plname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			






if(plphone)
	plphone= plphone_extension+plphone+"";

 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'edit-pharmacist', 
			id: idd,
			pfname: pfname, 
			plname: plname,
			pemail : pemail, 
			pmphone: pmphone_extension+pmphone,
			plphone: plphone,
			pduty: pduty, 
			paddress: paddress, 
			ppadanimage : ppadanimage

			},function(response){
				//$('.div_02').html(data);

				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) { 
					            $here_iz_id = response.success;

					$("#edit_pharmacist").find("input[type=text], input[type=password], input[type=email], textarea").val("");
					$('#eplname, #epfname').val("");
					$('#epmphone, #eplphone').val("");
					$('#eppadanimage>span.fileinput-new').text("");
					$('#episplay_my_image_in_prof').attr("src", "");
//$("#mydiv")

			parent_base = $('.form-group');
			parent_base.attr('class', 'form-group has-feedback  ');
			$(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
			$(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
			$(parent_base).find('.and_user_msg').attr('style', '');
		 
 
					$('#id_my_pharmac_tab> div.row').find('button').each(function() {

						if($(this).attr('id') == $here_iz_id) {
							$this = this;
							$($this).parent('div').closest('.row').remove();
						}
					});	

 $("#id_my_pharmac_tab").prepend( '<div class="row form_label_main_me"><div class=" col-md-3">'+
                              '<img src="'+$image+'" style="height: 200px; width: 200px;"></div><div class=" col-md-4">'+
                              '<div class="form-horizontal new_edited_pha" ><div class="form-group"><label  class="col-sm-5 control-label">Name</label>'+
                              '<span class="col-sm-7" style="color:inherit;")>'+
                              pfname+' '+plname+'</span></div> <div class="form-group"><label  class="col-sm-5 control-label">Email</label>'+
                              '<span class="col-sm-7">'+pemail+'</span></div><div class="form-group"><label  class="col-sm-5 control-label">mobile phone</label>'+
                               '<span class="col-sm-7">'+pmphone_extension+pmphone+'</span></div><div class="form-group"><label  class="col-sm-5 control-label">landline</label>'+
                               '<span class="col-sm-7">'+plphone+' </span></div></div></div><div class=" col-md-4"><div class="form-horizontal new_edited_pha" >'+
                               '<div class="form-group"><label  class="col-sm-5 control-label">duty</label> <span class="col-sm-7">'+ 
                               pduty+'</span></div><div class="form-group"><label  class="col-sm-5 control-label">address</label>'+
                                '<textarea class="col-sm-7 me_my_textarea_ext" >'+paddress+'</textarea></div></div></div><div class=" col-md-1">'+
                                '<button id="'+$here_iz_id+' status="0" " class ="btn btn-default button_edit_for_pharmc" > <i class="fa fa-pencil-square-o add_back_button_a" aria-hidden="true"></i>'+
                                'edit </button></div></div>');






 					$('#dizmiz_tizzzx').click();


			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				
					
				$submit.removeAttr('disabled');					
								
				}
			});	
			return false;
		}
			
	});
	




 

/*====================================================================================================*/
 

$('#eedelete_this_item_here').click( function() {

				var idd =  $('#edit_pharmacist').attr('pha_id');
			var status = $('#eedelete_this_item_here').attr('status');
			$.post('../ajax.php',{action:'delete_pharmacist', id:idd ,status:status},function(response){
				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {
 
					response =$.parseJSON(response);
 
					if(response.success ==1){
  
							  



		 

 					$('#dizmiz_tizzzx').click();
 

			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully deleted' ,
											img: $("#loged_in_image").attr("src")
									});



  
					 



					} else  {
						 						 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all are correct' ,
											img: $("#loged_in_image").attr("src")
									});		
						 	}

				}

			});	

});







/*========================================================= = = = = = = = = = = =================================*/


	$('#nedit_blood_from_top').click( function () {
		var array_b = ["A+","O+","B+" ,"AB+" ,"A-","O-","B-","AB-"];

						$.post('../ajax.php',{action:'return_blood_gp'},function(response){
									
									console.log(response);
									if(response.substring(0, 5) == "Error"){

									console.log("error");
										actual = "0";
									} 
									if (response.trim().length > 1) {
					 
										response =$.parseJSON(response);
					 					response_Success = response.success;

										if(response_Success.success == 1){
  
										response_Success = response_Success.value;
 									$('#select_blood').select2('destroy').empty();
									console.log(response_Success); 
									 for( jj=0; jj<array_b.length; jj++) {
									 	 xop=0;
												for (var ii =0; response_Success.length > ii; ii++) {
													
											
											 		if(array_b[jj] == response_Success[ii].group_name)
											 			xop = 1;
											 	}


											 if(xop == 0) { 
											$('#select_blood').select2({data: [{id: array_b[jj], text: array_b[jj] }]});

											 }
										
										}

										$('#nedelete_this_item_here').css('display', 'none');
										//
										$('#show_the-popupzP_9').click();
										}

									}
							});
						/* Let select2 do whatever it likes with this */
$("#select_blood").trigger('change');


		
	}) ;















	$("#add_aBlood").validate({
		
		submitHandler: function(form, event){ 
				 var group = $('#select_blood').val(); 
				var description = $('#bdescription').val(); 
 
			 if( group.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , group' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			 
			 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'add-blood-group', 
			group: group,
			description: description

			},function(response){
				//$('.div_02').html(data);

				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) { 
				 
					

			 		$('#added_grpz').append( ' <div class="col-md-3 main_blood_grpz" id="'+response.success+'">'+
          			'  <i class="fa fa-pencil-square edit_div" aria-hidden="true"></i>  <div class="">   '+
          			'<div class="col-md-5"> <i class="fa fa-tint blood_dro" aria-hidden="true"></i>'+
            		'</div> <div class="col-md-7 main_blood_det"> '+
            		'<h1  data-toggle="tooltip" data-placement="top" title="'+description+'" > '+group+'</h1> <label for="firstName" class="col-sm-12 control-label quantitysz">'+
            		'0 ml</label> <label for="firstName" class="col-sm-12 control-label thiz">in-'+current_time()+'</label> <label for="firstName" class="col-sm-12 control-label thiz">out-'+
            		'</label> </div></div></div>'    );






					$('#ndizmiz_tizzzx').click();
				$submit.removeAttr('disabled');					
								
					}			
				}
			});	
			return false;
		}
			
	});
	





function current_time(){
	var currentdate = new Date(); 
var datetime =   currentdate.getDate() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getFullYear() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

     return datetime;
}



$('.row').click( function(){


});




 
 $(document).on( 'click', '.edit_div', function() {



 	$('#group_name_x').text("");
 	$('#ebdescription').val("");
 	$('#quantity').val("");


 	$main = $(this).parent('div.main_blood_grpz');
 	$id = $($main).attr('id');
 	$name = $($main).find('div.main_blood_det>h1').text();
 	
 	$description = $($main).find('div.main_blood_det>h1').attr('data-original-title');
 	$quantitysz = $($main).find('div.main_blood_det>label.quantitysz').text().match(/\d+/);
 
 	$('#group_name_x').text($name);
 	$('#ebdescription').val($description);
 	$('#quantity').val($quantitysz);

 	$('#setbg').click();
 });





 


	$("#update_blood").validate({
		  rules: {  
				quantity:{
			 		    required: true,
						number: true
						}
				}, 
		submitHandler: function(form, event){
			var name = $('#group_name_x').text().trim();
				var quantity = $('#quantity').val(); 
				 var ebdescription = $('#ebdescription').val();


				console.log(",,,,,,,,,,,"+name+"-"+quantity+"-"+ebdescription);

 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'edit-blood',
			name: name,
			quantity: quantity,
			ebdescription: ebdescription

			},function(response){
				//$('.div_02').html(data);
 console.log(response);


				if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) {
			 	  





 	$('#group_name_x').text("");
 	$('#ebdescription').val("");
 	$('#quantity').val("");
 	$('#close_meee').click();



 				xmain = $('#added_grpz').find('div.main_blood_grpz').each( function() {
 					if($(this).attr('id') == response.success) {

 						$main = $(this);

 						$($main).find('div.main_blood_det>h1').attr('data-original-title',ebdescription );
 							$($main).find('div.main_blood_det>label.quantitysz').text(quantity+' ml');
 
 					}

 				});




 	 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



  
					 




			 	}  
				$submit.removeAttr('disabled');					
								
				}
			});	 
		}
			
	});
	


/*==============================================================================================================*/
/*===============================================admin==========================================================*/
	$('.admin_main').click( function() { 
		$("body").load("profile.php");
	});

  	$("#amphone").intlTelInput();
  	$("#alphone").intlTelInput();


  	var maxTime = 2000; // 2 seconds
	var time = 0;

	var interval = setInterval(function () {
	  if($('#add_admin_deta_5').is(':visible')) {
	    // visible, do something
	    dithiz_admin();
	    clearInterval(interval);
	  } else {
	    if (time > maxTime) {
	      // still hidden, after 2 seconds, stop checking
	      clearInterval(interval);
	      return;
	    }

	    // not visible yet, do something
	    time += 100;
	  }
	}, 200);


 function dithiz_admin() {




					$('#afname').val( "");
					$('#alname').val("");
					$('#aemail').val(""); 
					$('#asex').val("");

				  
  	$("#amphone").children("type").val("");
  	$("#alphone").children("type").val("");
 


					$('#aaddress').val(""); 
				 
					$('#adescription').val("");

					$('#aimage_base').find('span.fileinput-new').text("");







		$.post('../ajax.php',{action:'return-admin-details' },function(response){

				console.log(response);
				if(response.substring(0, 5) == "Error"){

				console.log("error");
					actual = "0";
				} 
				if (response.trim().length > 1) {

					response =$.parseJSON(response);
 					response_Success = response.success;

					if(response_Success.success == 1){
  
						response_Success = response_Success.value[0];

 
 
					$('#afname').val( response_Success.fname);
					$('#alname').val(response_Success.lname);
					$('#aemail').val(response_Success.email); 
					$('#asex').val(response_Success.sex);

				  

					$("#amphone").intlTelInput("setNumber", "+"+response_Success.mphone); 
					var emphone_extension = parseInt($("#amphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
					
					emphone_extension = emphone_extension+"";
					var emphone = $('#amphone').val();
					if(emphone.charAt(0)=='+')
						emphone = emphone.substring(1);

					for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
						if(emphone_extension[ii]==emphone[ii])
							jj++;
					emphone = emphone.substring(jj);
					$("#amphone").val(emphone);
				 






					$("#alphone").intlTelInput("setNumber", "+"+response_Success.lphone); 
					emphone_extension = parseInt($("#alphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
					
					emphone_extension = emphone_extension+"";
					var emphone = $('#alphone').val();
					if(emphone.charAt(0)=='+')
						emphone = emphone.substring(1);

					for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
						if(emphone_extension[ii]==emphone[ii])
							jj++;
					emphone = emphone.substring(jj);
					$("#alphone").val(emphone);
				 







					$('#aaddress').val(response_Success.address); 
				 
					$('#adescription').val(response_Success.description); 
				 
				 
					    

	url      = window.location.href;  
	 url = url.substring(0, url.lastIndexOf('/'));
	url = url.substring(0, url.lastIndexOf('/'));
		url = url+"/admin/images_/"+response_Success.image;

		set_image_('#aisplay_my_image_in_prof', url) ;
	 


//episplay_my_image_in_prof

					$('#aimage_base').find('span.fileinput-new').text(response_Success.image);

				 


					}
				}

			});

 



	}




/*============================================== edit==================================================================*/


/*============================================edit nurse=======================================================*/
 

	$("#amphone, #alphone").intlTelInput("setCountry", "in");

	$("#afname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#alname").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
		console.log(this);

	});

	$("#aemail").keyup(function(e) {
		var email_ = $('#aemail').val();
		show_status ( this,0, null);


		if( email_ == ''){
			show_status ( this,2, null);
			return;
		} 
		if (! validateEmail(email_) ){
			show_status ( "#aemail", 2, null);
			return;
		}

		show_status ( "#aemail",1, null);

 
	});

	$("#amphone").intlTelInput("setCountry", "in");


	 $("#amphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



	 $("#alphone").keydown(function (e) { 
	    show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
	    	show_status ( this,2, null);
                 return;
        } 
        if($(this).val().trim().length > 8)
	    show_status ( this,1, null);
		else 
	    show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });





 


	$(document).on('change', '#asex', function() {
	    show_status ( this,1, null);
		 
	});
 
  

	$("#aaddress").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});

 
 
 
 
	$("#adescription").keyup(function(e) {
	    show_status ( this,0, null);
		if($(this).val().trim().length > 2)
	    show_status ( this,1, null);
		 

	});

 
 
 
 
 

	$("#edit_admin").validate({
		  rules: { 
				 afname:{
				 		required: true,
				  		minlength: 2
						},
				 alname:{
				 		required: true,
				  		minlength: 2
						},
				 aemail:{
				 		required: true,
				 		email: true
						},
				amphone:{
				 		required: true,
				  		minlength: 10
						},
				 apassword:{
				 		required: true,
				  		minlength: 6
						}
				}, 
		submitHandler: function(form, event){   
				 var nefname = $('#afname').val();
				 var nelname = $('#alname').val();
				 var neemail = $('#aemail').val();
				 var nemphone = $('#amphone').val(); 
				 var nelphone = $('#alphone').val(); 
				 var nesex = $('#asex').val(); 
				var neaddress = $('#aaddress').val();
				var adescription = $('#adescription').val();
				var apassword = $('#apassword').val();
 
  
				 var nepadanimage = $('#aadanimage>span.fileinput-new').text();
  
				 var mnemphone_extension = parseInt($("#amphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 var lnemphone_extension = parseInt($("#alphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
				 



 
			 if( nefname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , first name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			if( nelname.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text , last name' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
			



if(nelphone)
	nelphone= lnemphone_extension+nelphone+"";



 console.log(nefname);// nefname, 
console.log(nelname);// nelname,
console.log(neemail );// neemail, 
console.log(mnemphone_extension+nemphone);// mnemphone_extension+nemphone, 
console.log(nelphone);// alphone,
console.log(nesex);// nesex,  
console.log(neaddress);// neaddress, 
console.log(adescription);// adescription, 
console.log(nepadanimage );// nepadanimage,
console.log(apassword);//apassword
 
			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'edit-admin',
			nefname: nefname, 
			nelname: nelname,
			neemail : neemail, 
			nemphone: mnemphone_extension+nemphone, 
			alphone: nelphone,
			nesex: nesex,  
			neaddress: neaddress, 
			adescription: adescription, 
			nepadanimage : nepadanimage,
			apassword:apassword
			},function(response){
				//$('.div_02').html(data);
 
				console.log(response);
						if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				console.log(response);
				if (response.trim().length > 1) {

				response =$.parseJSON(response);
			 	
			 	if(response.success>0) {


			 		Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	} else if(response.success== -1)  {
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Duplicate entry, email id or mobile number ' ,
											img: $("#loged_in_image").attr("src")
									});
 

			 	} else if(response.success== -2){
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Password incorrect' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				
				

						}
				 
				$submit.removeAttr('disabled');	
								
			});	 
		}
			
	});
	


//new_pass_admin


	$("#new_pass_admin").validate({
		  rules: { 
				 password0:{  
				 		required: true,
					    minlength: 6
					},
				 password1:{  
				 		required: true,
					    minlength: 6
					},
				 password2: {
		      			equalTo: "#password1"
		  			}

			}, 
		submitHandler: function(form, event){
			var password0 = $('#password0').val();
			var password1 = $('#password1').val();




			$submit = $('#login_form[type="submit"]  ');
			$.post('../ajax.php',{action:'admin_pass_new', password0:password0,
														password1:password1
														},function(response){
				//$('.div_02').html(data);

				console.log(response);
						if(response.substring(0, 5) == "Error"){

				console.log("error");
					return;
				}
				response =$.parseJSON(response);
 
				if(response.success == 1){


			 $('#password0').val("");
			 $('#password1').val("");
			 $('#password2').val("");

 					Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});



			 	}  else if(response.success== -2){
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'Password incorrect' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	} else{
				 
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});
 
			 	}
				

		
										
				
				$submit.removeAttr('disabled');				
		
			});	 
		}
			
	});












	$("#bed_name").keyup(function(e) {
		var name_n = $('#bed_name').val();

		show_status ( this,0, null);
		if( name_n.trim().length <1){
			return;
		}
 
					show_status ( "#bed_name", 1, null);
				 



	});




	$("#add_bed").validate({
		  rules: { 
				 baa1:{required: true}
			}, 
		submitHandler: function(form, event){
			var name_n = $('#bed_name').val();
			var desc_n = $('#bed_description').val();	
			name_n = name_n.trim();
			desc_n = desc_n.trim();

			 if( name_n.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			


			$.post('../ajax.php',{action:'add_bed',name:name_n,description:desc_n},function(response){
				//$('.div_02').html(data);
				console.log(response);

				response =$.parseJSON(response);
				if(response.success > 0){

				var update_tis = " <div class=\"row new_table_bootsrp padding_left_x \" val_id ='"+response.success+"'> <div class=\"col-md-4\"> <p>"+
				name_n+"</p> </div> <div class=\"col-md-7\"> <textarea class=\"form-control me_my_textarea\" rows=\"4\" cols=\"10\" disabled=\"disabled\">"+
				desc_n+"</textarea> </div> <div class=\"col-md-1\"> <div   class=\" button_element_to_do_bed \"><i class=\"fa fa-pencil-square-o \" aria-hidden=\"true\"  "+
				" style=\"color: red; cursor: pointer;\" ></i> </div> </div> </div>"     ;  
				  

				$("#the_display_table_1").after(update_tis) ;

				
				$("#add_bed").find("input[type=text], textarea").val("");

				show_status ( "#add_bed",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}

		
										
								
		
			});	
			return false;
		}
			
	});
		

	$(document).on('click', "div.button_element_to_do_bed", function() {
		var sup_pere = $(this).closest('.new_table_bootsrp');
		var idd = $(sup_pere).attr('val_id');

		var t_name = $(sup_pere).find('p');
		var t_des = $(sup_pere).find('textarea');

		show_status ( "#ebed_name_edit",0, null);
		$('.class_ide_84969380').val("");
		$('.class_ide_84969381').val("");
		$('.class_ide_84969380').val(t_name.text());
		$('.class_ide_84969381').val(t_des.val());

		$('.class_ide_84969380').attr('old', idd);
		$('.class_ide_84969381').attr('old', t_des.val())


		$('#show_the-popupzP').click();

	});








	$("#ebed_name_edit").keyup(function(e) {
		var name_n = $('#ebed_name_edit').val();

	
		show_status ( this,0, null);
		if( name_n.trim().length <1){
			return;
		}

 	show_status ( "#ebed_name_edit", 1, null);
				 



	});

	$("#edit_bed").validate({
		  rules: { 
				 eaa2:{required: true}
			}, 
		submitHandler: function(form, event){
			var name_n = $('#ebed_name_edit').val();
			var desc_n = $('#ebed_description_edit').val();	
			var name_n_old = $('#ebed_name_edit').attr('old');
			
		 	name_n = name_n.trim();
			desc_n = desc_n.trim();

			 if( name_n.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
			
 

			$.post('../ajax.php',{action:'edit_bed',name:name_n, id:name_n_old, description:desc_n},function(response){
				//$('.div_02').html(data);
				console.log(response);

				response =$.parseJSON(response);
				if(response.success == 1){



					var staSta = 0;
					$( "#my_table_bbro" ).find('.new_table_bootsrp').each(function( i ) {
					    if ( name_n_old == $(this).attr('val_id') ) {

					         var sup_pere = this;
					        $(this).find('p').text(name_n);

							 var t_des = $(sup_pere).find('textarea');
							 t_des.val(desc_n);
				
					        staSta=1;
					    } else {

					    }
					  });
					  if(staSta == 0) {
							Lobibox.notify('warning', {
													size: 'mini',
													showClass: 'zoomInLeft',
													hideClass: 'zoomOutRight',
													msg: 'something`s not right, refresh',
													img: $("#loged_in_image").attr("src")
											});
					  }



				
				$("#edit_bed").find("input[type=text], textarea").val("");
				$('#dizmiz_tizzz').click();
				show_status ( "#edit_bed",9, null);
				if(staSta == 1)
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}

		
										
								
		
			});	
			return false;
		}
			
	});
		
		



//



	$("#bdelete_this_item_here").click(function(e) {
		var name_n = $('#ebed_name_edit').val(); 
			var name_n_old = $('#ebed_name_edit').attr('old');

		
	 	name_n = name_n.trim(); 
 
		
		Lobibox.confirm({
		msg: "Are you sure you want to delete this bed?",
		callback: function ($this, type, ev) {
		    if (type == 'yes') {










			$submit = $('#login_form[type="submit"]');

			$.post('../ajax.php',{action:'delete_bed',id:name_n_old ,function(response){
				//$('.div_02').html(data);
				console.log(response);

				if(true) {
				//response =$.parseJSON(response);
				if(true){

					var staSta = 0;

					$( "#my_table_bbro" ).find('.new_table_bootsrp').each(function( i ) {

					 
						if ( name_n_old == $(this).attr('val_id') ) {

					         var sup_pere = this;

					          var sup_pere = $(this).closest('.new_table_bootsrp');
							 sup_pere.remove();
				
					        staSta=1;
					    } else {

					    }

					  });
					  if(staSta == 0) {
							Lobibox.notify('warning', {
													size: 'mini',
													showClass: 'zoomInLeft',
													hideClass: 'zoomOutRight',
													msg: 'something`s not right, refresh',
													img: $("#loged_in_image").attr("src")
											});
					  }



				
				$("#edit_bed").find("input[type=text], textarea").val("");
				$('#dizmiz_tizzz').click();
				show_status ( "#edit_bed",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}
 					}
		



				$submit.removeAttr('disabled');
			}});	









		    } else {
 
		    }

		}


		});
			




	});














$('.button_view_patn45').click( function() {







  $idd = $( this).attr('did');
    $.post('../ajax.php',{action:'return-patient_e',id:$idd },function(response){
 
    if(response.substring(0, 5) == "Error"){

      console.log("error");
        actual = "0";
      } 
      if (response.trim().length > 1) {

          response =$.parseJSON(response);

          response_Success = response.success;

          if(response_Success.success > 0){
  
            $patient = response_Success.patient[0];
 
//$appedndata = $patient.fname+" "+ $patient.lname+"<small>"+$patient.description+"</small>";
//$appedndata = $patient.fname+" "+ $patient.lname+"<small>"+"</small>";

if($patient.description ==  null)
	$appedndata = $patient.fname+" "+ $patient.lname+"<small>"+"</small>";
else
	$appedndata = $patient.fname+" "+ $patient.lname+"<small>"+$patient.description+"</small>";




 $('#192168001').html($appedndata);


url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/patient/images_/"+$patient.image;

  set_image_('#show_image_5', url) ;


$('#prescribe_this').attr('value', $idd);


 $('#vdfname').text($patient.fname);
 
 
  

 $('#vdlname').text($patient.lname);
 $('#vddob').text($patient.fdob);
 $('#vdsex').text($patient.sex);
 $('.mu_row_status_samll_5').css('background-color', $patient.colour);
 $('#vdemail').text($patient.email);
 $('#vdmphone').text($patient.mphone);
 $('#vdlphone').text($patient.lphone);
 $('#vdaddress').text($patient.address);
 $('#vddoctor').text($patient.doctor);
 $('#vddepartment').text($patient.department);
 $('#vddemail').text($patient.demail);
 $('#vdblood_group_id').text($patient.group_name);
 $('#vdstart_date').text($patient.fstart_date);
 $('#vddescription').text($patient.description);

 $('#vdstatus').text('deleted' );
 if($patient.status_delete == 0)
 $('#vdstatus').text('Active' );


 $('#vdgrelation').text($patient.grelation);
 $('#vdgname').text($patient.gname);
 $('#vdgmphone').text($patient.gmphone);
 $('#vdglphone').text($patient.glphone);
 $('#vdgaddress').text($patient.gaddress);




  $('#patient_id_new').css('display', 'block');
  $('.main_head_br').remove();
 $('#davko_jnako_0934000').attr('style','display: block !important');
 $('#davko_jnako_0934001').attr('style','display: none !important');

          }

        }

      });



});








$('#viewAll_djrh3ki4').click( function () {


 $('#davko_jnako_0934001').attr('style','display: block !important');
 $('#davko_jnako_0934000').attr('style','display: none !important');
});















/*=============================================================end===============================================*/
/*================================================================================================================*/
















	$("#asubject").keyup(function(e) {
		var name_n = $('#asubject').val();

		show_status ( '#asubject',0, null);
		if( name_n == ''){
			return;
		} 
	 show_status ( "#asubject", 1, null); 


	});


	$("#add_noticeboard").validate({
		  rules: { 
				 asubject:{required: true}
			}, 
		submitHandler: function(form, event){
			var name_n = $('#asubject').val();
			var desc_n = $('#asdescription').val();	
			name_n = name_n.trim();
			desc_n = desc_n.trim();

			 if( name_n.length == 0){
					Lobibox.notify('warning', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'insert some text' ,
											img: $("#loged_in_image").attr("src")
									});
				return;
			}
			
				console.log('resposssssssnse');



			$.post('../ajax.php',{action:'add_noticeboard', name:name_n, description:desc_n},function(response){
				//$('.div_02').html(data);
				console.log(response);

				response =$.parseJSON(response);
				if(response.success > 0){

				var update_tis = " <div class=\"row new_table_bootsrp padding_left_x \" val_id ='"+response.success+"'> <div class=\"col-md-4\"> <p>"+
				name_n+"</p> </div> <div class=\"col-md-7\"> <textarea class=\"form-control me_my_textarea\" rows=\"4\" cols=\"10\" disabled=\"disabled\">"+
				desc_n+"</textarea> </div> <div class=\"col-md-1\"> <div   class=\" button_element_to_doa \"><i class=\"fa fa-trash \" aria-hidden=\"true\"  "+
				" style=\"color: red; cursor: pointer;\" ></i> </div> </div> </div>"     ;  
				  

				$("#the_display_table_91").after(update_tis) ;

				
				$("#add_noticeboard").find("input[type=text], textarea").val("");

				show_status ( "#add_noticeboard",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}

		
										
								
		
			});	
			return false;
		}
			
	});
		
		
	$(document).on('click', '.button_element_to_doa', function () {
		$idd = $(this).parent('div').closest('.new_table_bootsrp').attr('val_id');
		$thisz = $(this).parent('div').closest('.new_table_bootsrp');


console.log($idd); 

			$.post('../ajax.php',{action:'delete_noticeboard', id:$idd},function(response){
				//$('.div_02').html(data);
				console.log(response);

				response =$.parseJSON(response);
				if(response.success > 0){

				 $thisz.remove();

				show_status ( "#add_department",9, null);
				Lobibox.notify('success', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated' ,
											img: $("#loged_in_image").attr("src")
									});
				} else {
					Lobibox.notify('error', {
											size: 'mini',
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'make sure that all details are correct' ,
											img: $("#loged_in_image").attr("src")
									});

				}

		
										
								
		
			});	
	});

 



/***************************** table felxi***********************************************************************/

var headertext = [],
headers = document.querySelectorAll(".miyazaki th"),
tablerows = document.querySelectorAll(".miyazaki th"),
tablebody = document.querySelector(".miyazaki tbody");
if(tablebody) {
for(var i = 0; i < headers.length; i++) {
  var current = headers[i];
  headertext.push(current.textContent.replace(/\r?\n|\r/,""));
} 

for (var i = 0, row; row = tablebody.rows[i]; i++) {
  for (var j = 0, col; col = row.cells[j]; j++) {
    col.setAttribute("data-th", headertext[j]);
  } 
}

}

/*============================================end doc=======================================================*/




























function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}
/***********************************uplad image only **************************************/


$(document).on("click", "#upadanimage", function(e) {
		e.preventDefault();
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
		$('#modal.dmodel').attr("to_this", "dimage_base");


	
	});
	
	

$('#upladimageprofselectf').change(function() {
	 
	 
		$("#upladimageprof").ajaxForm({

		 success: function(responseText,statusText) {

         console.log("<><><"+responseText+"<><><"+statusText);
			
			$imageHrCro = '../'+responseText.trim();
			$('#cropbox').attr($imageHrCro );
			 
			$('.img-container > img').attr('src', $imageHrCro);

			
		  }
		}).submit();

 
		$('#upladimagepfinalsub').click();
		
	 $('#cropbox').attr('../images_/loader.gif');
 	$('#setImg').click();
	 
});
 

      var cropBoxData;
      var cropBoxData;
      var canvasData;
      var cropper;

      $('#modal.dmodel').on('shown.bs.modal', function () {
        cropper = new Cropper(document.getElementById('image'), {	
          autoCropArea: 0.5,
          aspectRatio: 16 / 16,
          guides: true,
          minContainerWidth :350,
          minContainerHeight : 350,
          ready: function () {

            // Strict mode: set crop box data first
            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
			 
          }, crop: function(e) {
          		updateCoords(e);

			  }
        });
      }).on('hidden.bs.modal', function () {
      
          cropBoxData = cropper.getCropBoxData();
      	  canvasData = cropper.getCanvasData();
          cropper.destroy();


			var x_ = $('#x').val();
			var y_ = $('#y').val();
			var w_ = $('#w').val();
			var h_ = $('#h').val();
			var TARGET_W = 300;
			var TARGET_H = 300;

			var photo_url_ = $('#image').attr('src');
			photo_url_ = photo_url_.substr(3);
			

			photo_url_ = photo_url_.replace(/^.*[\\\/]/, '');
			$sest_utl_p_ = 'doctor/images_/';
			
  

			$.post('../crop_photo.php', {
				 x:x_, 
				 y:y_, 
				 w:w_, 
				 h:h_, 
				 photo_url:photo_url_, 
				 targ_w:TARGET_W, 
				 targ_h:TARGET_H, 
				 sest_utl_p_:$sest_utl_p_ },
				 function(response){ 
				 	console.log(response);
					if (response.trim().length > 1) { 

  				response =$.parseJSON(response); 
  				if(response.success == 1) {   

  					$to_image = $('#modal').attr("to_this");
  					$('#'+$to_image).find('span.fileinput-new').text(response.name);
  					$('#'+$to_image).find('span.fileinput-new').attr("path",response.path+response.name);
  					$('#'+$to_image).find('img').attr('src',"http://"+response.full);
  					// no nd
  					chek_imag();
  				}



	 			//
	 			 }
		
			});	
 
 

      });
	
 
function updateCoords(e) {
	$('#x').val(e.detail.x);
	$('#y').val(e.detail.y);
	$('#w').val(e.detail.width);
	$('#h').val(e.detail.height);

	$('#r').val(e.detail.rotate);
	$('#sx').val(e.detail.scaleX);
	$('#sy').val(e.detail.scaleY);
}


/**************************************end image edit *************************************************/
		


/***********************************dup sett only uplad image only **************************************/


$(document).on("click", "#epadanimage", function(e) {
		e.preventDefault();
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
		$('#modal.dmodel').attr("to_this", "eimage_base");
	
	});
	
/*========================================================= dif nurse img ========================*/

$(document).on("click", "#npadanimage", function(e) {
		e.preventDefault();
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
		$('#modal.nmodel').attr("to_this", "edimage_base");
	
		console.log("jjjjjjjjjj");
	
	});


      $('#modal.nmodel').on('shown.bs.modal', function () {
        cropper = new Cropper(document.getElementById('image'), {	
          autoCropArea: 0.5,
          aspectRatio: 16 / 16,
          guides: true,
          minContainerWidth :350,
          minContainerHeight : 350,
          ready: function () {

            // Strict mode: set crop box data first
            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
			 
          }, crop: function(e) {
          		updateCoords(e);

			  }
        });
      }).on('hidden.bs.modal', function () {
      
          cropBoxData = cropper.getCropBoxData();
      	  canvasData = cropper.getCanvasData();
          cropper.destroy();


			var x_ = $('#x').val();
			var y_ = $('#y').val();
			var w_ = $('#w').val();
			var h_ = $('#h').val();
			var TARGET_W = 300;
			var TARGET_H = 300;

			var photo_url_ = $('#image').attr('src');
			photo_url_ = photo_url_.substr(3);
			

			photo_url_ = photo_url_.replace(/^.*[\\\/]/, '');
			$sest_utl_p_ = 'nurse/images_/';
			
  

			$.post('../crop_photo.php', {
				 x:x_, 
				 y:y_, 
				 w:w_, 
				 h:h_, 
				 photo_url:photo_url_, 
				 targ_w:TARGET_W, 
				 targ_h:TARGET_H, 
				 sest_utl_p_:$sest_utl_p_ },
				 function(response){ 
					if (response.trim().length > 1) { 

  				response =$.parseJSON(response); 
  				if(response.success == 1) {   

  					$to_image = $('#modal').attr("to_this");
  					$('#'+$to_image).find('span.fileinput-new').text(response.name);
  					$('#'+$to_image).find('span.fileinput-new').attr("path",response.path+response.name);
  					$('#'+$to_image).find('img').attr('src',"http://"+response.full);
  					// no nd
  					chek_imag();
  				}



	 			//
	 			 }
		
			});	
 
 

      });
 
 

/**************************************dup end image edit *************************************************/


/*========================================================= pharmacist nurse img ========================*/

$(document).on("click", "#ppadanimage", function(e) {
		e.preventDefault();
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
		$('#modal.pmodel').attr("to_this", "pdimage_base");
	
		console.log("jjjjjjjjjj");
	
	});


      $('#modal.pmodel').on('shown.bs.modal', function () {
        cropper = new Cropper(document.getElementById('image'), {	
          autoCropArea: 0.5,
          aspectRatio: 16 / 16,
          guides: true,
          minContainerWidth :350,
          minContainerHeight : 350,
          ready: function () {

            // Strict mode: set crop box data first
            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
			 
          }, crop: function(e) {
          		updateCoords(e);

			  }
        });
      }).on('hidden.bs.modal', function () {
      
          cropBoxData = cropper.getCropBoxData();
      	  canvasData = cropper.getCanvasData();
          cropper.destroy();


			var x_ = $('#x').val();
			var y_ = $('#y').val();
			var w_ = $('#w').val();
			var h_ = $('#h').val();
			var TARGET_W = 300;
			var TARGET_H = 300;

			var photo_url_ = $('#image').attr('src');
			photo_url_ = photo_url_.substr(3);
			

			photo_url_ = photo_url_.replace(/^.*[\\\/]/, '');
			$sest_utl_p_ = 'pharmacist/images_/';
			
  

			$.post('../crop_photo.php', {
				 x:x_, 
				 y:y_, 
				 w:w_, 
				 h:h_, 
				 photo_url:photo_url_, 
				 targ_w:TARGET_W, 
				 targ_h:TARGET_H, 
				 sest_utl_p_:$sest_utl_p_ },
				 function(response){ 
					if (response.trim().length > 1) { 

  				response =$.parseJSON(response); 
  				if(response.success == 1) {   

  					$to_image = $('#modal').attr("to_this");
  					$('#'+$to_image).find('span.fileinput-new').text(response.name);
  					$('#'+$to_image).find('span.fileinput-new').attr("path",response.path+response.name);
  					$('#'+$to_image).find('img').attr('src',"http://"+response.full);
  					// no nd
  					chek_imag();
  				}



	 			//
	 			 }
		
			});	
 
 

      });
 
 

/**************************************pharmacist end image edit *************************************************/
		
$(document).on("click", "#eppadanimage", function(e) {
		e.preventDefault();
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
		$('#modal.pmodel').attr("to_this", "epimage_base");
	
	});
	



/*========================================================= admin self img ========================*/

$(document).on("click", "#aadanimage", function(e) {
		e.preventDefault();
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
		$('#modal.amodel').attr("to_this", "aimage_base");
	
		console.log("jjjjjjjjjj");
	
	});


      $('#modal.amodel').on('shown.bs.modal', function () {
        cropper = new Cropper(document.getElementById('image'), {	
          autoCropArea: 0.5,
          aspectRatio: 16 / 16,
          guides: true,
          minContainerWidth :350,
          minContainerHeight : 350,
          ready: function () {

            // Strict mode: set crop box data first
            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
			 
          }, crop: function(e) {
          		updateCoords(e);

			  }
        });
      }).on('hidden.bs.modal', function () {
      
          cropBoxData = cropper.getCropBoxData();
      	  canvasData = cropper.getCanvasData();
          cropper.destroy();


			var x_ = $('#x').val();
			var y_ = $('#y').val();
			var w_ = $('#w').val();
			var h_ = $('#h').val();
			var TARGET_W = 300;
			var TARGET_H = 300;

			var photo_url_ = $('#image').attr('src');
			photo_url_ = photo_url_.substr(3);
			

			photo_url_ = photo_url_.replace(/^.*[\\\/]/, '');
			$sest_utl_p_ = 'admin/images_/';
			
  

			$.post('../crop_photo.php', {
				 x:x_, 
				 y:y_, 
				 w:w_, 
				 h:h_, 
				 photo_url:photo_url_, 
				 targ_w:TARGET_W, 
				 targ_h:TARGET_H, 
				 sest_utl_p_:$sest_utl_p_ },
				 function(response){ 
					if (response.trim().length > 1) { 

  				response =$.parseJSON(response); 
  				if(response.success == 1) {   

  					$to_image = $('#modal').attr("to_this");
  					$('#'+$to_image).find('span.fileinput-new').text(response.name);
  					$('#'+$to_image).find('span.fileinput-new').attr("path",response.path+response.name);
  					$('#'+$to_image).find('img').attr('src',"http://"+response.full);
  					// no nd
  					chek_imag();
  				}



	 			//
	 			 }
		
			});	
 
 

      });
 
 
/*=========================================================================================================*/











 


	$('.main-menu:hover, nav.main-menu.expanded').on('touchstart', function (e) {
        'use strict'; //satisfy code inspectors
        var link = $(this); //preselect the link
        if (link.hasClass('hover')) {
            return true;
        } else {
            link.addClass('hover');
            $('a.taphover').not(this).removeClass('hover');
            e.preventDefault();
            return false; //extra, and to make sure the function has consistent return points
        }
    });
		




});

