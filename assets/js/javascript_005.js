
$(document).ready(function(e) {

  $(".js-example-basic-single").select2();
 
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })



 



var prev_event_id ="";
varox = 0;

  

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
      if (clazz1 == 99) {

        parent_base = $('.form-group');
        parent_base.attr('class', 'form-group has-feedback  ');
        $(parent_base).find('.glyphicon').attr('class' ,'glyphicon  form-control-feedback right--20');
        $(parent_base).find('.and_user_msg').attr('class', 'and_user_msg sr-only');
        $(parent_base).find('.and_user_msg').attr('style', '');
     
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

    function show_hide ( $hide, $show) {
      $($hide).css('display','none');
      $($show).css('display', 'block');
    }



















  $("#medicine_c_name").keyup(function(e) {
    var medicine_c_name = $('#medicine_c_name').val();
    show_status ( this,0, null);
    if( medicine_c_name == ''){
      show_status ( this,2, null);
      return;
    } 


    $.post('../ajax.php',{action:'check_medicine_c_name', medicine_c_name:medicine_c_name },function(response){
         console.log(response);
        response =$.parseJSON(response);
        if(response.success == 0){
          show_status ( "#medicine_c_name", 1, null);
        } else if(response.success <5 ){
          show_status ( "#medicine_c_name", 3, "already exists");
        }
      }); 
  });

  $("#medicine_c_description").keyup(function(e) {
      show_status ( this,0, null);
    if($(this).val().trim().length > 2)
      show_status ( this,1, null);
     

  });
 
 
  $("#add_medicine_c").validate({
      rules: { 
         medicine_c_name:{required: true}
      }, 
    submitHandler: function(form, event){
      var name_n = $('#medicine_c_name').val();
      var desc_n = $('#medicine_c_description').val();  
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
      
console.log("{ddd");

      $submit = $('#add_medicine_c[type="submit"]');

      $.post('../ajax.php',{action:'add_medicine_c',name:name_n,description:desc_n},function(response){
        console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response);
           
                    if(response.success >0){
            
                        actual =response.success;

   var update_tis = '<tr> <td><p>'+name_n+'</p></td> <td><p>'+
                          desc_n+'</p></td> <td ><button type="button" id="'+
                          actual+'" class="btn btn-default btn-sm action_button_medicine">view<i class="fa fa-eye" aria-hidden="true" '+
                          'style="position: inherit;display: inline-block;font-size: 20px;color: green;"></i> </button> </td></tr>'     ;  
          

        $("#the_display_table_1").prepend(update_tis) ;

        
        $("#add_medicine_c").find("input[type=text], textarea").val("");

        show_status ( "#add_medicine_c",9, null);
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
       
      });
        
        
    }




  });




  $(document).on( 'click', '.action_button_medicine', function() {
    $idd = $(this).attr('id');


   $.post('../ajax.php',{action:'get_medicine_c',id:$idd},function(response){
        console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success[0];
                    $appedndata = response.name+"<small>"+response.description+"</small>";
                    $('#edit_clcik_med_cat').attr('did',response.id );
                    $('#header_section_1>h1').html($appedndata);







              $.post('../ajax.php',{action:'get_medicine_c_all'},function(response){

                if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {

                  response =$.parseJSON(response); 

                    update_name_and_id_selet_2( "#emedicine_category", response.success) ;
                    $('#button_statu').click();


                  }
                });



                    show_hide (".show_hide", "#view_medicine_category");
           }

      });

  });


$('#back_to_add_medicine_category').click( function() {
                    show_hide (".show_hide", "#add_medicine_category");

});



 
/*========================== back button =======================================================*/
  var interval = setInterval(function () {
    if($('#view_medicine_category').is(':visible')) {

    window.history.pushState('forward', null, './medicine.php');
    $(window).on('popstate', function(e) {
      e.preventDefault();
       show_hide (".show_hide", "#add_medicine_category");
    });

      clearInterval(interval);
    }  
  }, 200);
/*========================== back button =======================================================*/


$('#edit_clcik_med_cat').click( function() {
    $idd = $(this).attr('did');


   $.post('../ajax.php',{action:'get_medicine_c',id:$idd},function(response){
        console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success[0];
                    $('#emedicine_c_name').val(response.name);
                    $('#emedicine_c_description').val(response.description);





                    $('#show_the-popupzP_9').click();
           }

      });
});










  $("#edit_medicine_c").validate({
      rules: { 
         emedicine_c_name:{required: true}
      }, 
    submitHandler: function(form, event){
    $idd = $('#edit_clcik_med_cat').attr('did');
      var name_n = $('#emedicine_c_name').val();
      var desc_n = $('#emedicine_c_description').val();  
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
       

      $submit = $('#edit_medicine_c[type="submit"]');

      $.post('../ajax.php',{action:'edit_medicine_c',name:name_n,description:desc_n, id:$idd},function(response){
        console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response);
           
                    if(response.success >0){
            
                        actual =response.success;

   var update_tis = '<tr> <td><p>'+name_n+'</p></td> <td><p>'+
                          desc_n+'</p></td> <td ><button type="button" id="'+
                          actual+'" class="btn btn-default btn-sm action_button_medicine">view<i class="fa fa-eye" aria-hidden="true" '+
                          'style="position: inherit;display: inline-block;font-size: 20px;color: green;"></i> </button> </td></tr>'     ;  
          
   $('#the_display_table_1').find('button').each(function() {
 
              if($(this).attr('id') == $idd) { 
                  $(this).closest('tr').remove();

              }
        });
        
        $("#the_display_table_1").prepend(update_tis) ;
        $('#ndizmiz_tizzzx').click();

           $xc = $('table#the_display_table_1').find('button').each(function() {
              if($(this).attr('id') == $idd) {
                  $(this).click();

              }
        });

        $("#edit_medicine_c").find("input[type=text], textarea").val("");

        show_status ( "#add_medicine_c",9, null);
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
       
      });
        
        
    }




  });

/*medicine_category*/

  function update_name_and_id_selet_2( $id, $array) {
    $($id).select2('destroy').empty();
    for (var i =0; i< $array.length ; i++) {

        $($id).select2({data: [{id: $array[i].id, text: $array[i].name }]});                    
    }
    if(i !=0 )
 $($id).trigger('change');
  }

/*===================================Add Medicine===========================================*/


    $("#nmphone").intlTelInput();
    $("#nlphone").intlTelInput();


  $(document).on('change', '#emedicine_category', function() {
      show_status ( this,1, null);
    console.log(this);

  });







  $("#m_name").keyup(function(e) {
    var medicine_c_name = $('#m_name').val();
    show_status ( this,0, null);
    if( medicine_c_name == ''){
      show_status ( this,2, null);
      return;
    } 


    $.post('../ajax.php',{action:'check_medicine_name', medicine_c_name:medicine_c_name },function(response){
         console.log(response);
        response =$.parseJSON(response);
        if(response.success == 0){
          show_status ( "#m_name", 1, null);
        } else if(response.success <5 ){
          show_status ( "#m_name", 3, "already exists");
        }
      }); 
  });

  $("#mdescription").keyup(function(e) {
      show_status ( this,0, null);
    if($(this).val().trim().length > 2)
      show_status ( this,1, null);
     

  });
 




  $(document).on('change', '#m_type', function() {
      show_status ( this,1, null);
    console.log(this);

  });




   $("#m_unit_price").keydown(function (e) { 
      show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
        show_status ( this,2, null);
                 return;
        } 
        $this = $(this).val().trim();
        if($this.length > 0)
      show_status ( this,1, null);
    else 
      show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


  
 

 


  $("#add_medicine").validate({
      rules: { 
         m_name:{
            required: true,
              minlength: 2
            },
        m_unit_price:{
            required: true
            }
        }, 
    submitHandler: function(form, event){
        var emedicine_category = $('#emedicine_category').val(); 
         var m_name = $('#m_name').val();
         var mdescription = $('#mdescription').val();
         var m_unit_price = $('#m_unit_price').val();
        

         var npadanimage = $('#mpadanimage>span.fileinput-new').text();

         
        var m_type = $('#m_type option:selected').text();




 
       if( m_name.length == 0){
          Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'insert some text ,name' ,
                      img: $("#loged_in_image").attr("src")
                  });
        return;
      }
 
      
      





 

 
      $submit = $('#add_medicine[type="submit"]');

      $.post('../ajax.php',{action:'add-medicine',
      emedicine_category: emedicine_category,
      m_name: m_name, 
      mdescription: mdescription,
      npadanimage : npadanimage, 
      m_unit_price : m_unit_price, 
      m_type: m_type

      },function(response){ 
        if(response.substring(0, 5) == "Error"){

        console.log("error");
          return;
        }
        console.log(response);
        if (response.trim().length > 1) {

        response =$.parseJSON(response);
        
        if(response.success>0) { 
                      $here_iz_id = response.success;

          $("#add_medicine").find("input[type=text], input[type=password], input[type=email], textarea").val(""); 
//$("#mydiv")
              show_status (   this,   99,   "");

          

            $.post('../ajax.php',{action:'return_name', table_name:"medicine_category", id:emedicine_category },function(response){
                  
                  console.log(response);
                  if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response);
           
                    if(response.success.length  >0){
            
                        actual =response.success;


$("#the_display_table_2>tbody").prepend('<tr> '+
                            '<td><p  class="category_6">'+actual+'</p></td>'+
                            '<td><p>'+m_name+'</p></td>'+
                            '<td><p>'+mdescription+'</p></td>'+
                            '<td><p>'+m_type+'</p></td>'+
                            '<td><p> 1 </p></td>'+
                            '<td  data-value="'+m_unit_price+'">'+m_unit_price+'</td>'+
                            '<td ><button type="button" id="'+$here_iz_id+'" class="btn btn-default btn-sm action_button_medicine_edit">'+
                            'view<i class="fa fa-eye" aria-hidden="true" style="position: inherit;display: inline-block;font-size:'+
                            '20px; color: green;"></i></button> </td>'+
                          '</tr> ');






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
                
        }
      }); 
      return false;
    }
      
  });
  


  $('#button_statu').click(function() {

    $idd = $('#edit_clcik_med_cat').attr("did");
      $idname = $("#emedicine_category option[value='"+$idd+"']").text();

    if($(this).attr('status')== "1") {

      $("#emedicine_category option").remove();


     $('#emedicine_category').select2({data: [{id: $idd, text: $idname }]});               


     $('#emedicine_category').trigger('change');

     $('#the_display_table_2>tbody').find('p.category_6').each(function() {

        if($(this).text() ==$idname ){

        } else {
          $(this).closest('tr').css('display', 'none');
        }


     });

     $('#button_statu').attr('status', "0");
     $('#button_statu').text('all categorues');

    } else {





              $.post('../ajax.php',{action:'get_medicine_c_all'},function(response){

                if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {

                  response =$.parseJSON(response); 

                    update_name_and_id_selet_2( "#emedicine_category", response.success) ;


                  }
                });




     $('#the_display_table_2>tbody>tr').css('display', '');

      $('#button_statu').attr('status', "1");
     $('#button_statu').text('only this category');
    }



  });


/*============================================================================================================*/



$('#back_to_add_medicine').click( function() {
                    show_hide (".show_hide", "#add_medicine_category");

});

 
$('#back_to_add_medicine_').click( function() {

   show_hide (".show_hide", "view_medicine_category");
setTimeout( function(){ 
   show_hide (".show_hide", "#view_medicine_category");
  }  , 10 );
  setTimeout( function(){ 
   show_hide (".show_hide", "#view_medicine_category");
  }  , 500 );



});


$(document).on('click', '.action_button_medicine_edit', function() {

    $idd = $(this).attr('id');
    $('#passvaluePoa').val($idd);
    $('#pass_value_herea').click();

    /*

*/

});





/*========================== back button =======================================================*/
  var interval = setInterval(function () {
    if($('#header_section_2').is(':visible')) {

    window.history.pushState('forward', null, './medicine.php ');
    $(window).on('popstate', function(e) {
      e.preventDefault();
       show_hide (".show_hide", "#view_medicine_category");

    });

      clearInterval(interval);
    }  
  }, 200);
/*========================== back button =======================================================*/


function show_deta ($idd){
  $('#vView_medicine').find("input[type=text], input[type=password], input[type=email], textarea").val(""); 
$('#display_my_viewf').attr('src', "");
   $.post('../ajax.php',{action:'get_medicine_d',id:$idd},function(response){
        console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success[0];
                    $appedndata = response.name;
                    $('#edit_clcik_med').attr('did',response.id );
                    $('#header_section_2>h1').html($appedndata);
                    $('#mndesc').text(response.description);
                    $('#mntypey').text(response.type);
                    $('#mnpricey').text(response.unit_price);
                    $('#mnstatz').text(response.status);

                    if(response.delete_status == "0")
                      $('#mndeletxxf').text("active");
                   else if(response.delete_status == "1")
                      $('#mndeletxxf').text("deleted");


url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/medicine/images_/"+response.image;

  set_image_('#display_my_viewf', url) ;




            $.post('../ajax.php',{action:'return_name', table_name:"medicine_category", id:response.medicine_category_id },function(response){
                  
                  console.log(response);
                  if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response);
           
                    if(response.success.length  >0){
            
                        actual =response.success;

                        $('#mcyyo').text(actual);





 show_hide (".show_hide", "#view_medicine");

                    } else  {
                          actual = "0";     
                        }

                  }

                }); 
                   
           }

      });
}









$(document).on('click', '#edit_clcik_med', function() {

    $idd = $(this).attr('did');

$('#edit_view_medicine').find("input[type=text], input[type=password], input[type=email], textarea").val(""); 
$('#mdisplay_my_image_in_prof').attr('src', "");




              $.post('../ajax.php',{action:'get_medicine_c_all'},function(response){
                console.log(response);
                if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {

                  response =$.parseJSON(response); 

                    update_name_and_id_selet_2( "#memedicine_category", response.success) ;


                  }
                });





   $.post('../ajax.php',{action:'get_medicine_d',id:$idd},function(response){
        console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success[0];
                    $appedndata = response.name;
                    $('#mm_name').val(response.name);


                    $('#mmdescription').val(response.description); 
                    $('#mm_unit_price').val(response.unit_price);
                    $('#mmnstatus').val(response.status);

                 

$("#memedicine_category").val(response.medicine_category_id).trigger('change'); 




  $('#mm_type optgroup option[text="'+response.type+'"]').prop('selected', true);




 
  texy = response.type;
 

  $me_ma = $("#mm_type option").filter(function() {
    return this.text == texy; 
});
 console.log($me_ma);

  texy = $($me_ma).attr("value");


$("#mm_type").val(texy ).trigger('change');


 $("#mm_type").find('option').each(function() {
    if( $(this).text() == texy){
       $me_ma = this;
    } 
}); 

  texy = $($me_ma).attr("value"); 

$("#mm_type").val(texy).trigger('change');





  if (response.delete_status == 1) {
    $('#delete_thiiz_mdc').removeClass('btn-danger');
    $('#delete_thiiz_mdc').addClass('btn-success');
    $('#delete_thiiz_mdc').text('active');
    $('#delete_thiiz_mdc').attr('status', 0);
  } else if (response.delete_status == 0) {
    $('#delete_thiiz_mdc').removeClass('btn-success');
    $('#delete_thiiz_mdc').addClass('btn-danger');
    $('#delete_thiiz_mdc').text('delete');
    $('#delete_thiiz_mdc').attr('status', 1);
  }

  
 






url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/medicine/images_/"+response.image;

  set_image_('#mdisplay_my_image_in_prof', url) ;

$('#mpadanimage').find('span.fileinput-new').text(response.image);


$('#show_the-popupzP_99').click();
                   
           }

      });


});







/*===================================edit Medicine===========================================*/


    

  $(document).on('change', '#memedicine_category', function() {
      show_status ( this,1, null);
    console.log(this);

  });







  $("#mm_name").keyup(function(e) {
    var medicine_c_name = $('#mm_name').val();
    show_status ( this,0, null);
    if( medicine_c_name == ''){
      show_status ( this,2, null);
      return;
    } 


    $.post('../ajax.php',{action:'check_medicine_name', medicine_c_name:medicine_c_name },function(response){
         console.log(response);
        response =$.parseJSON(response);
        if(response.success == 0){
          show_status ( "#mm_name", 1, null);
        } else if(response.success <5 ){
          show_status ( "#mm_name", 3, "already exists");
        }
      }); 
  });

  $("#mmdescription").keyup(function(e) {
      show_status ( this,0, null);
    if($(this).val().trim().length > 2)
      show_status ( this,1, null);
     

  });
 




  $(document).on('change', '#mm_type', function() {
      show_status ( this,1, null);
    console.log(this);

  });




   $("#mm_unit_price").keydown(function (e) { 
      show_status ( this,0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
        show_status ( this,2, null);
                 return;
        } 
        $this = $(this).val().trim();
        if($this.length > 0)
      show_status ( this,1, null);
    else 
      show_status ( this,2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


  
 

 


  $("#edit_view_medicine").validate({
      rules: { 
         mm_name:{
            required: true,
              minlength: 2
            },
        mm_unit_price:{
            required: true
            }
        }, 
    submitHandler: function(form, event){
        var emedicine_category = $('#memedicine_category').val(); 
         var m_name = $('#mm_name').val();
         var mdescription = $('#mmdescription').val();
         var m_unit_price = $('#mm_unit_price').val();
         var mmnstatus = $('#mmnstatus').val();
        
    $idd = $('#edit_clcik_med').attr('did');


         var npadanimage = $('#mpadanimage>span.fileinput-new').text();

         
        var m_type = $('#mm_type option:selected').text();




 
       if( m_name.length == 0){
          Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'insert some text ,name' ,
                      img: $("#loged_in_image").attr("src")
                  });
        return;
      }
 
      
      





 

 
      $submit = $('#add_medicine[type="submit"]');

      $.post('../ajax.php',{action:'edit-medicine',
        id:$idd,
      emedicine_category: emedicine_category,
      m_name: m_name, 
      mdescription: mdescription,
      npadanimage : npadanimage, 
      m_unit_price : m_unit_price, 
      mmnstatus :mmnstatus,
      m_type: m_type

      },function(response){ 
        if(response.substring(0, 5) == "Error"){

        console.log("error");
          return;
        }
        console.log(response);
        if (response.trim().length > 1) {

        response =$.parseJSON(response);
        
        if(response.success>0) { 
                      $here_iz_id = response.success;

          $("#edit_view_medicine").find("input[type=text], input[type=password], input[type=email], textarea").val(""); 
//$("#mydiv")
              show_status (   this,   99,   "");



              $('#mndesc').text(mdescription);
              $('#header_section_2>h1 ').text(m_name);
              $('#mnpricey').text(m_unit_price);

              $('#mnstatz').text(mmnstatus);
              $('#mntypey').text(m_type);



url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/medicine/images_/"+npadanimage;

  set_image_('#display_my_viewf', url) ;




          

            $.post('../ajax.php',{action:'return_name', table_name:"medicine_category", id:emedicine_category },function(response){
                  
                  console.log(response);
                  if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response);
           
                    if(response.success.length  >0){
            
                        actual =response.success;

                        $('#mcyyo').text(actual);

                    } else  {
                          actual = "0";     
                        }

                  }

                }); 


$('#ndizmiz_tizzzx').click();


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
  





$('#delete_thiiz_mdc').click( function() {

    var idd = $('#edit_clcik_med').attr('did');

      var status = $('#delete_thiiz_mdc').attr('status');

      $.post('../ajax.php',{action:'delete_medicine', id:idd ,status:status},function(response){
        console.log(response);
        if(response.substring(0, 5) == "Error"){

        console.log("error");
          actual = "0";
        } 
        if (response.trim().length > 1) {
 
          response =$.parseJSON(response);
 
          if(response.success ==1){
  
                
      if(status == 1)
            $('#mndeletxxf').text('deleted');
        else if(status == 0)
             $('#mndeletxxf').text('active');


     

            $('#dizmiz_tizzzx').click(); 

          Lobibox.notify('success', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'successfully deleted' ,
                      img: $("#loged_in_image").attr("src")
                  });




    $('#ndizmiz_tizzzx').click();
          



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



  $('.payment_tis_prisc').click( function() {


//  id="echo0002" 
    
    $idd = $(this).attr('did');


$('#echo0005').empty();
  $('#echo0001').text('');
                    $('#echo0003').text('');
                    $('#echo0004').text('');
 
                    $('#echo00010').attr('did', '');
                    $('#echo00011').attr('did', '');
                    $('#echo00011').val('');
   $.post('../ajax.php',{action:'get_for_pamnt',id:$idd},function(response){
 
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success;
                  console.log(response);
 

                    if(response.success > 0) {
                          patient =  response.patient[0];
                          prescribe =  response.prescribe;



                  console.log(patient);
                  console.log(prescribe);
                    $('#echo00010').attr('did', $idd);
                    $('#echo00011').attr('did', $idd);
                    $('#echo00011').val($idd);
                    $('#echo0001').text(patient.fname+" "+patient.lname);
                    $('#echo0003').text(patient.fname+" "+patient.lname);
                    $('#echo0004').text(patient.email);
                    url      = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/patient/images_/"+patient.image;

  set_image_('#echo0002', url) ;

  $('#echo0005').append('<div class="form-group" style="margin-left: 5px;"  > '+
' <div class=" col-sm-7 " style="text-align: center;"> '+
'  <p> <strong   id="echo0002" >medicines</strong></p>'+
' </div> '+
'<div class=" col-sm-3 " style="text-align: center;">'+
'  <p> <strong>Time</strong></p>'+
' </div> <div class=" col-sm-1 " style="text-align: center;">'+
'  <p> <strong>quantity</strong></p>'+ 
' </div>              '+
' <div class=" col-sm-1 " style="text-align: center;">'+
'  <p> <strong>price</strong></p>'+
' </div> '+
' </div>');
$sumto = 0;
                    for( jj=0; jj<prescribe.length; jj++) {

$v = retun_times_number (prescribe[jj].time);
console.log($v);

$v = parseInt($v)* parseInt(prescribe[jj].unit_price);
console.log($v);


$no_dys  =  daydiff(  prescribe[jj].date_from  , prescribe[jj].date_to   ) ;


  $('#echo0005').append('<div class="form-group" style="margin-left: 5px;"  > '+
' <div class=" col-sm-7 " style="text-align: center;"> '+
'  <p>'+prescribe[jj].name+' <span style="padding:10px;"></span> <small>'+$no_dys +' days '+ 
' </div> '+
'<div class=" col-sm-3 " style="text-align: center;">'+
'  <p>'+prescribe[jj].time+'</p>'+
' </div> <div class=" col-sm-1 " style="text-align: center;">'+
'  <p> '+prescribe[jj].amount+'</p>'+ 
' </div>              '+
' <div class=" col-sm-1 " style="text-align: center;">'+
'  <p>'+($v *$no_dys )+'</p>'+
' </div> '+
' </div>');
 $sumto += ($v * $no_dys );


                    }

$('#echo0006').text($sumto);

 $('#head_show_hide2').attr('style','display: block !important');
 $('#head_show_hide1').attr('style','display: none !important');

                    }
             
                   




           }

      });








   });
 
function treatAsUTC(date) {
    var result = new Date(date);
    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
    return result;
}

function daydiff(startDate, endDate) {
    var millisecondsPerDay = 24 * 60 * 60 * 1000;
    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
}





  $('#hello_do_this_back').click( function() {


     $('#head_show_hide1').attr('style','display: block !important');
     $('#head_show_hide2').attr('style','display: none !important');

   });


  $('#echo00010').click( function  () {

    $xid = $(this).attr('did');
    $did = $('#my_zxid').attr('did');
    $amount = $('#echo0006').text();

      $.post('../ajax.php',{action:'add_a_payment', xid:$xid ,did:$did, amount:$amount},function(response){
        console.log(response);
        if(response.substring(0, 5) == "Error"){

        console.log("error"); 
        } 
        if (response.trim().length > 1) {
 
          response =$.parseJSON(response);
 
          if(response.success ==1){
  
     
          Lobibox.notify('success', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'successfully deleted' ,
                      img: $("#loged_in_image").attr("src")
                  });


$('body').find('.main_head_br').each( function () {

    if($(this).attr('did') == $xid )
      $(this).remove();
});


     $('#head_show_hide1').attr('style','display: block !important');
     $('#head_show_hide2').attr('style','display: none !important');

     

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




    $('#show_mr_few').click(function() {
      $status = $(this).attr('status');
      if( $status == 0) {

          $('.main_head_br').attr('style','display: block !important');
           $('#show_mr_few').attr( 'status', '1');
           $('#show_mr_few').text('Last 2 hours');

      } else  {

          $('.main_head_br.varunam').attr('style','display: none !important');
           $('#show_mr_few').attr( 'status', '0');
           $('#show_mr_few').text('pending');
      }

    });














  $("#new_pass_pat").validate({
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
      $idd = $('#my_zxid').attr('did');

      var password0 = $('#password0').val();
      var password1 = $('#password1').val();




      $submit = $('#login_form[type="submit"]  ');
      $.post('../ajax.php',{action:'pha_pass_new', 
                            id: $idd,
                            password0:password0,
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

          $('body').html('<script type="text/javascript">window.location = "index.php";</script>');

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



























 function retun_times_number ( $time) {
    retn =0;
 
    if($time.trim() == "morning and evening")
      retn = 2; 
    if($time.trim() == "morning")
      retn = 1; 
    if($time.trim() == "afternoon")
      retn = 1; 
    if($time.trim() == "evening")
      retn = 1; 
    if($time.trim() == "before sleep")
      retn = 1; 
    if($time.trim() == "three times")
      retn = 3; 
    if($time.trim() == "once")
      retn = 1;
    if($time.trim() == "other")
      retn = 5; 


    return retn;
 }






function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}

/*================================================================================================================*/


function return_name_number( $ch, $dy) {
  $ch =parseInt($ch);
    if($dy == 1)
        switch ($ch) {
            case 1: return "Monday"; break; 
            case 2: return "Tuesday"; break;    
            case 3: return "Wednesday"; break;   
            case 4: return "Thursday "; break;   
            case 5: return "Friday"; break;  
            case 6: return "Saturday "; break;   
            case 7: return "Sunday"; break;  
        }
    if($dy == 0)
        switch ($ch) {
            case 1: return "January"; break;     
            case 2: return "February"; break;    
            case 3: return "March"; break;   
            case 4: return "April"; break;   
            case 5: return "May"; break;     
            case 6: return "June"; break;    
            case 7: return "July"; break;    
            case 8: return "August"; break;  
            case 9: return "September"; break;   
            case 10: return "October"; break;    
            case 11: return "November"; break;   
            case 12: return "December"; break;  
            default: return ""; break;
        }
}




Date.prototype.yyyymmdd = function() {
  var mm = this.getMonth() + 1; // getMonth() is zero-based
  var dd = this.getDate();

  return [this.getFullYear(),
          (mm>9 ? '' : '0') + mm,
          (dd>9 ? '' : '0') + dd
         ].join('-');
};



 function hhmmss(time ) {

  var hours = Number(time.match(/^(\d+)/)[1]);
  var minutes = Number(time.match(/:(\d+)/)[1]);
  var AMPM = time.match(/\s(.*)$/)[1];
  if(AMPM.toLowerCase() == "pm" && hours<12) hours = hours+12;
  if(AMPM.toLowerCase() == "am" && hours==12) hours = hours-12;
  var sHours = hours.toString();
  var sMinutes = minutes.toString();
  if(hours<10) sHours = "0" + sHours;
  if(minutes<10) sMinutes = "0" + sMinutes;
  return (sHours + ":" + sMinutes+":00");
 }







/*========================================================================================================*/
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

 

/*========================================================= doc medi img ========================*/

$(document).on("click", "#mpadanimage", function(e) {
    e.preventDefault();
    $('#upladimageprofselectf').val('');
    $('#upladimageprofselectf').click();
    $('#modal.mmodel').attr("to_this", "mimage_base");
  
    console.log("jjjjjjjjjj");
  
  });


      var cropBoxData;
      var cropBoxData;
      var canvasData;
      var cropper;


$('#upladimageprofselectf').change(function() {
   
   
    $("#upladimageprof").ajaxForm({
     success: function(responseText,statusText) {
      
      $imageHrCro = '../'+responseText.trim();
      $('#cropbox').attr($imageHrCro );
       
      $('.img-container > img').attr('src', $imageHrCro);

      
      }
    }).submit();

 
    $('#upladimagepfinalsub').click();
    
   $('#cropbox').attr('../images_/loader.gif');
  $('#setImg').click();
   
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



      $('#modal.mmodel').on('shown.bs.modal', function () {

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
      $sest_utl_p_ = 'medicine/images_/';
      
  

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



$(document).on("click", "#upadanimage", function(e) {
    e.preventDefault();
    $('#upladimageprofselectf').val('');
    $('#upladimageprofselectf').click();
    $('#modal.dmodel').attr("to_this", "dimage_base");
  
  });
  
  


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
  
 



});
     