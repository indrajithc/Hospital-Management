
$(document).ready(function(e) {

  $(".js-example-basic-single").select2();
$(':checkbox').checkboxpicker();
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

 


$( ".time_pi" ).timeDropper({
    format: 'h:mm a',
    autoswitch: false,
    meridians: false,
    mousewheel: false,
    setCurrentTime: true,
    init_animation: "fadein",
    primaryColor: "#4CAF50",
    borderColor: "#4CAF50",
    backgroundColor: "#FFF",
    textColor: '#555'
  });







$(window).resize(function() {
  console.log($(window).height());
    $('.pakoda_backo_etra').height($(window).height() -330);
});

$(window).trigger('resize');


 

    tinymce.init({
        selector: '#myTextarea',
        height: 300,
        theme: 'modern',
        plugins: [
          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });

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


console.log(response);


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



          $('#mpadanimage>span.fileinput-new').text('No file chosen');
          $('#display_my_image_in_prof').attr('src','');


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
                      msg: 'Duplicate entry ' ,
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




    $('#date_from_, #date_to_').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '0d'
    });



    $('#add_regu_date').click( function(){

      varmonthz ="";
      $('#dmothz').find('input[type=checkbox]').each( function(){

        if ($(this).is(':checked')) {
          if(varmonthz.length >0)
           varmonthz =  varmonthz+"-";
           varmonthz =  varmonthz+$(this).attr('id');

        }
      });

      if(varmonthz.length<1){
                 Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select at least one month ' ,
                      img: $("#loged_in_image").attr("src")
                  });

                  $('#col_motn').addClass('error_shadow');
                              setTimeout(function(){
                        $('#col_motn').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
                 return;
      }

 

      vardayz ="";
      $('#mdayz').find('input[type=checkbox]').each( function(){

        if ($(this).is(':checked')) {
          if(vardayz.length >0)
           vardayz =  vardayz+"-";
           vardayz =  vardayz+$(this).attr('id');

        }
      });

      if(vardayz.length<1){
                 Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select at least one day ' ,
                      img: $("#loged_in_image").attr("src")
                  });
       
                        $('#col_dayzs').addClass('error_shadow');
                              setTimeout(function(){
                        $('#col_dayzs').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
                 return;
      }



time_from  = hhmmss($('#time_from_').val());
time_to  = hhmmss($('#time_to_').val());



   if(Date.parse('01/01/2011 '+time_from) > Date.parse('01/01/2011 '+time_to)){
                     Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select a valid time schedule ' ,
                      img: $("#loged_in_image").attr("src")
                  });
       
                        $('#time_from_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#time_from_').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
                 return;
    }


new_to = time_from.split(':');
b_inf = parseInt(new_to[0])+1;
time_toa= ""+b_inf+":"+new_to[1]+":"+new_to[2];

console.log(time_toa);

    if(Date.parse('01/01/2011 '+time_toa) > Date.parse('01/01/2011 '+time_to)){
                       Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select atleast one hour ' ,
                      img: $("#loged_in_image").attr("src")
                  });

           $('#time_to_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#time_to_').removeClass('error_shadow');
                        //....and whatever else you need to do
                     
                }, 1000);
                 return;
    }



    String_d  = " "+$('#time_from_').val()+" to "+$('#time_to_').val()+
    " every ";

    $month ="";
    $splito = varmonthz.split('-');
    for (i = 0; $splito.length >i; i++) {
      $cvo = $('#'+$splito[i]).closest('.form-group');
      if($month.length >1)
        $month = $month+", ";

      $month =$month+$cvo.find('label.control-label').text();

    }

    $day ="";
    $splito = vardayz.split('-');
    for (i = 0; $splito.length >i; i++) {
      $cvo = $('#'+$splito[i]).closest('.form-group');
      if($day.length >1)
        $day = $day+", ";

      $day =$day+$cvo.find('label.control-label').text();

    }


    String_d = String_d+$day+" of the "+ $month;



    $('#confirm_this_ac').attr('month', '');
    $('#confirm_this_ac').text('');
    $('#confirm_this_ac').attr('day', '');
    $('#confirm_this_ac').attr('time_from', '');
    $('#confirm_this_ac').attr('time_to', '');
   $('#confirm_this_ac').attr('day_from', '');
    $('#confirm_this_ac').attr('day_to', '');


    $('#confirm_this_ac').text(String_d);
    $('#confirm_this_ac').attr('month', varmonthz);
    $('#confirm_this_ac').attr('day', vardayz);
    $('#confirm_this_ac').attr('time_from', time_from);
    $('#confirm_this_ac').attr('time_to', time_to);


    $('#show_the-popupzP_19').click();


    });



    $('#action_ac_t').click(function() {
      $('#ndizmiz_tizzzx').click();
    });




    $('#actionj_perffvt').click( function() {



      idd = $('#my_zxid').attr('did');
    $varmonthz = $('#confirm_this_ac').attr('month');
    $vardayz = $('#confirm_this_ac').attr('day');
    $time_from = $('#confirm_this_ac').attr('time_from');
    $time_to = $('#confirm_this_ac').attr('time_to');



    $day_from = $('#confirm_this_ac').attr('day_from');
    $day_to = $('#confirm_this_ac').attr('day_to');

    $.post('../ajax.php',{action:'add-schedule', 
    id:idd ,
    varmonthz:$varmonthz,
    vardayz:$vardayz,
    time_from:$time_from,
    time_to:$time_to,
    day_from:$day_from,
    day_to:$day_to

    },function(response){
        console.log(response);
        if(response.substring(0, 5) == "Error"){

        console.log("error");
          actual = "0";
        } 
        if (response.trim().length > 1) {
 
          response =$.parseJSON(response);
 
          if(response.success ==1){
  
                





    
 
 $('#ndizmiz_tizzzx').click();

       $('#dmothz').find('div.btn-group').each( function(){

        $(this).children().first().click();




      });
 
       $('#mdayz').find('div.btn-group').each( function(){

        $(this).children().first().click();




      });


$("#date_from_").val("");
$("#date_to_").val("");
real_table1();
real_table2();
real_table3();

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



$('#add_indu_dio').click( function() {





$date_fr = $('#date_from_').val();
$date_t = $('#date_to_').val();
 

if ($date_fr.trim().length<1 ) {
     $('#date_from_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#date_from_').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
    return;

}



if ($date_t.trim().length<1 ) {
     $('#date_to_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#date_to_').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
    return;
}


from = $("#date_from_").val().split("-");
$date_fr = new Date(from[2], from[1] - 1, from[0]);

from = $("#date_to_").val().split("-");
$date_t = new Date(from[2], from[1] - 1, from[0]);
 

 if( $date_fr  > $date_t ){
                     Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select a valid day ' ,
                      img: $("#loged_in_image").attr("src")
                  });
       
                        $('#date_from_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#date_from_').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
                 return;
    }





time_from  = hhmmss($('#date_time_from_').val());
time_to  = hhmmss($('#date_to_from_').val());


 
   if(Date.parse('01/01/2011 '+time_from) > Date.parse('01/01/2011 '+time_to)){
                     Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select a valid time schedule ' ,
                      img: $("#loged_in_image").attr("src")
                  });
       
                        $('#date_time_from_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#date_time_from_').removeClass('error_shadow');
                        //....and whatever else you need to do
                }, 1000);
                 return;
    }


new_to = time_from.split(':');
b_inf = parseInt(new_to[0])+1;
time_toa= ""+b_inf+":"+new_to[1]+":"+new_to[2];
 

    if(Date.parse('01/01/2011 '+time_toa) > Date.parse('01/01/2011 '+time_to)){
                       Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select atleast one hour ' ,
                      img: $("#loged_in_image").attr("src")
                  });

           $('#date_to_from_').addClass('error_shadow');
                              setTimeout(function(){
                        $('#date_to_from_').removeClass('error_shadow');
                        //....and whatever else you need to do
                     
                }, 1000);
                 return;
    }



    String_d  = " "+$('#date_time_from_').val()+" to "+$('#date_to_from_').val()+
    "  , from "+$('#date_from_').val()+" to"+$('#date_to_').val();

   

    $('#confirm_this_ac').attr('month', '');
    $('#confirm_this_ac').text('');
    $('#confirm_this_ac').attr('day', '');
    $('#confirm_this_ac').attr('time_from', '');
    $('#confirm_this_ac').attr('time_to', '');
   $('#confirm_this_ac').attr('day_from', '');
    $('#confirm_this_ac').attr('day_to', '');
   

    $('#confirm_this_ac').text(String_d);
    $('#confirm_this_ac').attr('day_from', $date_fr.yyyymmdd());
    $('#confirm_this_ac').attr('day_to', $date_t.yyyymmdd());
    $('#confirm_this_ac').attr('time_from', time_from);
    $('#confirm_this_ac').attr('time_to', time_to);


    $('#show_the-popupzP_19').click();
 


});





function real_table1 (){
      idd = $('#my_zxid').attr('did');
   $.post('../ajax.php',{action:'get_month',id:idd},function(response){
 
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success;
                    $('#the_display_table_7>tbody').empty();

                    for (i = 0; response.length >i; i++) {
                     
                      $('#the_display_table_7>tbody').prepend(' <tr>'+
                       '<td><p class="">'+return_name_number(response[i].month, 0 )+'</p></td>'+
                        '<td ><button type="button" id="'+response[i].id+'" class="btn btn-default btn-sm action_button_schedule_delet1">Delete<i class="fa fa-trash" aria-hidden="true" style="position: '+
                        'inherit;display: inline-block;font-size: 20px; color: red;"></i></button> </td>'+
                         '</tr>');
                    }
                   
           }

      });
}



function real_table2 (){
      idd = $('#my_zxid').attr('did');
   $.post('../ajax.php',{action:'get_week1',id:idd},function(response){
 
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success;
                    $('#the_display_table_8>tbody').empty();

                    for (i = 0; response.length >i; i++) {
                     
                      $('#the_display_table_8>tbody').prepend(' <tr> '+ 
'<td data-value="'+response[i].day+'" ><p  >'+return_name_number(response[i].day, 1)+'</p></td>'+ 
'<td data-value="'+response[i].tf+'" ><p>'+response[i].time_from+'</p></td>'+ 
'<td data-value="'+response[i].tt+'" ><p>'+response[i].time_to+'</p></td>'+ 
'<td ><button type="button" id="'+response[i].id+'" class="btn btn-default btn-sm action_button_schedule_delet2">Remove<i class="fa '+
' fa-trash" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; color: red;"></i>'+ 
'</button> </td>'+ 
' </tr>');
                    }
                   
           }

      });
}




function real_table3 (){
      idd = $('#my_zxid').attr('did');
   $.post('../ajax.php',{action:'get_week2',id:idd},function(response){
 
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    response = response.success;
                    $('#the_display_table_9>tbody').empty();

                    for (i = 0; response.length >i; i++) {
                     
                      $('#the_display_table_9>tbody').prepend(' <tr>  '+ 
'                            <td><p>'+response[i].date_from+'</p></td>'+ 
'                            <td><p>'+response[i].date_to+'</p></td>'+ 
'<td data-value="'+response[i].tf+'" ><p>'+response[i].time_from+'</p></td>'+ 
'<td data-value="'+response[i].tt+'" ><p>'+response[i].time_to+'</p></td>'+ 
'<td ><button type="button" id="'+response[i].id+'" class="btn btn-default btn-sm action_button_schedule_delet3">Remove<i class="fa fa-trash" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; color: red;"></i>'+ 
'</button> </td>'+ 
' </tr>');
                    }
                   
           }

      });
}




$(document).on('click', '.action_button_schedule_delet1', function() {

      idd = $(this).attr('id');
   $.post('../ajax.php',{action:'delete_doc_schedule', table:'month', id:idd},function(response){
 
  console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    
                    if(response.success == 1){

                      real_table1(); 
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



$(document).on('click', '.action_button_schedule_delet2', function() {
 
      idd = $(this).attr('id');
   $.post('../ajax.php',{action:'delete_doc_schedule', table:'week', id:idd},function(response){
 
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    
                    if(response.success == 1){

                      real_table2(); 
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



$(document).on('click', '.action_button_schedule_delet3', function() {
 
      idd = $(this).attr('id');
   $.post('../ajax.php',{action:'delete_doc_schedule', table:'week', id:idd},function(response){
 
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                    actual = "0";
                  } 
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    
                    if(response.success == 1){

                      real_table3();  
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

  $('.notificationappointments').click( function(e) {
    e.preventDefault(); 
    $li = $(this).parent('li');
    $form = $($li).find('form');
    $($form).find('input[type=submit]').click();
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



    $('#discharge_to_ , #from_pris').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '0d'
    });


  


    $('#to_pris').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '+1d'
    });


$('#iurthyiu5y6098476').click( function(e) {
  e.preventDefault();
    $('#pass_value_here_ac0983').click();
});



$('#beddd').change(  function (event) {
       if($('#bedd').find('option'))
          $('#bedd').select2('destroy').empty();
         $("#bedd").select2();

       if ($(this).is(':checked')) {
          

   $user_id = $('#main_my_zxid').attr('did');

 
    $.post('../ajax.php',{action:'return-bed'  },function(response){

      console.log(response);
    if(response.substring(0, 5) == "Error"){

      console.log("error");
        actual = "0";
      } 
      if (response.trim().length > 1) {

          response =$.parseJSON(response);

          response_Success = response.success;

          if(response_Success.success > 0){
  
            $events = response_Success.patient;

 

          for ( i =0; i< $events.length ; i++ ) {

              $('#bedd').select2({data: [{id: $events[i].id, text: $events[i].type+" - "+$events[i].room_description }]});                    
          }
          if(i !=0 )
       $('#bedd').trigger('change');

 
  

          }

        }

      });









        }


});

/*================================================================================================================*/
/*================================================================================================================*/
//

  $("#subject_for_pri").keyup(function(e) {
    var medicine_c_name = $('#subject_for_pri').val();
    show_status ( this,0, null);
    if( medicine_c_name.trim().length <1 ){
      show_status ( this,2, null);
      return;
    } 

    show_status ( this,1, null);

  });



  $("#myTextarea").keyup(function(e) {
    var medicine_c_name = $('#myTextarea').val();
    show_status ( this,0, null);
    if( medicine_c_name.trim().length <1 ){
      show_status ( this,2, null);
      return;
    } 

    show_status ( this,1, null);

  });


$('#medicines_cat').change( function () {

    $value =  $('#medicines_cat').val();


       if($('#medicines_').find('option'))
          $('#medicines_').select2('destroy').empty();
         $("#medicines_").select2();
 

   $user_id = $('#main_my_zxid').attr('did');

 
    $.post('../ajax.php',{action:'return-medicines5' , id:$value  },function(response){

      console.log(response);
    if(response.substring(0, 5) == "Error"){

      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {

          response =$.parseJSON(response);

          response_Success = response.success;

          if(response_Success.success > 0){
  
            $events = response_Success.patient;

 

          for ( i =0; i< $events.length ; i++ ) {

              $('#medicines_').select2({data: [{id: $events[i].id, text: $events[i].name }]});                    
          }
          if(i !=0 )
       $('#medicines_').trigger('change');

 
  
    show_status ( '#medicines_cat',1, null);

          }

        }



});
 
});



  $("#medicines_").change(function(e) {
    show_status ( '#medicines_',0, null);
    show_status ( '#medicines_',1, null);
  });


  $("#time_of_medic").change(function(e) {
    show_status ( '#time_of_medic',1, null);
  });

   $("#amount").keydown(function (e) { 
      show_status ( '#amount',0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
        show_status ( '#amount',2, null);
                 return;
        } 
        if(parseInt($('#amount').val() )> 0)
      show_status ( '#amount',1, null);
    else 
      show_status ( '#amount',2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });




    $('#from_pris').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '0d'
    });

 

    $('#to_pris').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '+1d'
    });

  $("#to_pris").change(function(e) {
    show_status ( '#to_pris',1, null);
  });

  $("#from_pris").change(function(e) {
    show_status ( '#from_pris',1, null);
  });



    $('#sub_add_this').click( function() {
      show_status ( "#to_pris",99, null);

      $medicines_val = $('#medicines_').val();
      $medicines_ = $('#medicines_ option:selected').text();
      $time_of_medic = $('#time_of_medic').val();
      $amount = $('#amount').val();
      $from_pris = $('#from_pris').val();
      $to_pris = $('#to_pris').val();
      $medicdescription = $('#medicdescription').val();

      if ($medicines_val != null) {
        if( $medicines_val.trim().length <1 ){
          show_status ( "#medicines_",2, null);
          return;
        } 
      }else{
          show_status ( "#medicines_",2, null);
          return;
        }

    if ($medicines_ != null) {
      if( $medicines_.trim().length <1 ){
        show_status ( "#medicines_",2, null);
        return;
      } 
    }else {
        show_status ( "#medicines_",2, null);
        return;
    }

    if ($time_of_medic != null) {
      if( $time_of_medic.trim().length <1 ){
        show_status ( "#time_of_medic",2, null);
        return;
      } 
     }else {
      show_status ( "#time_of_medic",2, null);
      return;
    }


    if ($amount != null) {
      if( $amount.trim().length <1 ){
        show_status ( "#amount",2, null);
        return;
      } 
     }else {
      show_status ( "#amount",2, null);
      return;
    }

    if ($from_pris != null) {
      if( $from_pris.trim().length <1 ){
        show_status ( "#from_pris",2, null);
        return;
      } 
     }else {
      show_status ( "#from_pris",2, null);
      return;
    }

    if ($to_pris != null) {
      if( $to_pris.trim().length <1 ){
        show_status ( "#to_pris",2, null);
        return;
      } 
     }else {
      show_status ( "#to_pris",2, null);
      return;
    }
 console.log($from_pris,$from_pris);
 $plit = $from_pris.split('-');
 $df = $plit[2]+'-'+ $plit[1]+'-'+ $plit[0]; 
 $plit = $to_pris.split('-');
 $dt = $plit[2]+'-'+ $plit[1]+'-'+ $plit[0]; 

   if(Date.parse($df+" 01:01:01") > Date.parse($dt+" 01:01:01")){
                     Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select a valid time schedule ' ,
                      img: $("#loged_in_image").attr("src")
                  });
       
      show_status ( "#from_pris",2, null);
      show_status ( "#to_pris",2, null);
   
                 return;
    }


      $value_query = '<div class="form-group classsism" style="margin-left: 5px;"  >'+  
                      '<div class=" col-sm-3 "><p did="'+$medicines_val +'" class="head_1">'+$medicines_ +'</p> </div>'+
                      '<div class=" col-sm-3 "><p class="head_2">'+$time_of_medic+'</p> </div>'+
                      '<div class=" col-sm-1 "><p class="head_3">'+$amount+'</p> </div>'+
                      '<div class=" col-sm-2 "><p class="head_4">'+$from_pris+'</p> </div>'+
                      '<div class=" col-sm-2 "><p class="head_5">'+$to_pris+'</p> </div>'+
                        '<div class=" col-sm-1 "><p class="head_6" data="'+$medicdescription+'"><i class="fa fa-minus-circle remove_me_b" aria-hidden="true"></i></p> </div>'+
                      '</div>'; 
      $('#added_values').prepend($value_query);  
      $amount = $('#amount').val("");
      $from_pris = $('#from_pris').val("");
      $to_pris = $('#to_pris').val("");
      $('#medicdescription').val("");


    });



    $(document).on( 'click', '.remove_me_b',function(e) {
      e.preventDefault();
      $(this).closest('.form-group').remove();
      console.log($(this).parent().parent());
      console.log($(this).closest('.form-group'));
    });






  $("#bedd").change(function(e) {
    show_status ( '#bedd',1, null);
  });

  $("#discharge_to_from_").change(function(e) {
    show_status ( '#discharge_to_from_',1, null);
  });


  $("#discharge_to_").change(function(e) {
    show_status ( '#discharge_to_',1, null);
  });

 
  $("#medicdescription").keyup(function(e) {
    var medicine_c_name = $('#medicdescription').val();
    show_status ( this,0, null);
    if( medicine_c_name.trim().length <1 ){
      show_status ( this,2, null);
      return;
    } 

    show_status ( this,1, null);

  });





   $("#amount_bloo").keydown(function (e) { 
      // show_status ( '#amount_bloo',0, null);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||  
            (e.keyCode >= 35 && e.keyCode <= 40)) { 
        // show_status ( '#amount_bloo',2, null);
                 return;
        } 
        // if($('#amount_bloo').val() > 0)
      // show_status ( '#amount_bloo',1, null);
    // else 
      // show_status ( '#amount_bloo',2, null);
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



   $('#submit_addedAdd').click( function () {

      $pid = $('#davko_jnako_0934000').attr('did');
      $did = $('#my_zxid').attr('did');

      $subject_for_pri = $('#subject_for_pri').val();
      $myTextarea =tinymce.get('myTextarea').getContent();  
      console.log($myTextarea);
      //$ = $('#added_values').val();
      $bedd = $('#bedd').val();
      if ($bedd == null) 
        $bedd = null;

      $discharge_to_ = $('#discharge_to_').val();
      if ($discharge_to_ == null) 
        $discharge_to_ = null;
      
      $discharge_to_from_ = $('#discharge_to_from_').val();
      $pblood = $('#pblood').val();
      $amount_bloo = $('#amount_bloo').val(); 

      $submit = $('#submit_addedAdd');
      if ($discharge_to_ != null) 
        $discharge_to_ = $discharge_to_+' '+hhmmss($discharge_to_from_);

    $.post('../ajax.php',{action:'add-prescription' , 
      pid: $pid,
      did: $did,
      subject: $subject_for_pri,
      description: $myTextarea,
      bed_id: $bedd,
      discharge: $discharge_to_ 
    },function(response){
      console.log(response);
    if(response.substring(0, 5) == "Error"){
      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {
          response =$.parseJSON(response); 
          if(response.success > 0){

 if($amount_bloo !=null)
   if(parseInt($amount_bloo) >0)
    add_to_bld_m( response.success, $amount_bloo, $pblood);

            $('#added_values').find('.form-group').each( function() {

              $medicines_val = $(this).find('.head_1').attr('did');
              $time_of_medic = $(this).find('.head_2').text();
              $amount = $(this).find('.head_3').text();
              $from_pris = $(this).find('.head_4').text();
              $to_pris = $(this).find('.head_5').text();
              $medicdescription = $(this).find('.head_6').attr('data');
  

 
 $.post('../ajax.php',{action:'add-prescribe' , 
      id: response.success,
      medicines_id: $medicines_val,
      time: $time_of_medic,
      amount: $amount,
      description: $medicdescription ,
      date_from: $from_pris,
      date_to: $to_pris 
    },function(response){
      console.log(response);
    if(response.substring(0, 5) == "Error"){
      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {
          response =$.parseJSON(response); 
          if(response.success > 0){

          }

        }

      });
 
  

              $(this).find('.remove_me_b').click();





            });








     tinymce.get('myTextarea').setContent("");  


$('.makochi').find("input[type=text], input[type=password], input[type=email], textarea").val(""); 
 show_status ( this,99, null);
         
                Lobibox.notify('success', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'successfully deleted' ,
                      img: $("#loged_in_image").attr("src")
                  });



$('#pass_value_here_apx').click();
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


        $submit.removeAttr('disabled');   
});
   });



function add_to_bld_m( $id, $amount, $group) {
 
 $.post('../ajax.php',{action:'add-blood-mang' , 
      id: $id,
      amount: $amount,
      group: $group 
    },function(response){
      console.log(response);
    if(response.substring(0, 5) == "Error"){
      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {
          response =$.parseJSON(response); 
          if(response.success > 0){

          }

        else  {
                         
          Lobibox.notify('error', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'not enough blood' ,
                      img: $("#loged_in_image").attr("src")
                  });   
              }
} 
      });
 
  
 
 

}


$('#amount_bloo').keyup( function() {
   show_status ( this,0, null);
   $gp = $('#pblood').val();
   $amo = $('#amount_bloo').val();

   if($amo == ''){
   show_status ( '#amount_bloo',0, null);
   return;
   }

   $.post('../ajax.php',{action:'check-blood' , 
      id: $gp,
      amount: $amo
    },function(response){
      console.log(response);
    if(response.substring(0, 5) == "Error"){
      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {
          response =$.parseJSON(response); 
          if(response.success > 0){
              show_status ( '#amount_bloo',1, null);

          } else {
              show_status ( '#amount_bloo',3, "not enough blood");

          }

        }

      });
 
  

});

$('.delete_tis_prisc').click( function() {
  $did  =$(this).attr('did');
  $this = this;
  $parent = $(this).parent('div').closest('.main_head_br');
  $.post('../ajax.php',{action:'delete-prescription' , 
      id: $did
    },function(response){
      console.log(response);
    if(response.substring(0, 5) == "Error"){
      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {
          response =$.parseJSON(response); 
          if(response.success > 0){
             
            $($this).remove();
            $($parent).css('background-color', '#ff00004d');
                   Lobibox.notify('success', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'successfully deleted' ,
                      img: $("#loged_in_image").attr("src")
                  });

           } else {
              
          }

        }

      });
 
});




/*================================================================================================================*/








 
 $(document).on( 'click', '.edit_div', function() {



  $('#group_name_x').text("");
  $('#ebdescription').val("");
  $('#quantity').val("");
  $('#quantity').attr("old", "");


  $main = $(this).parent('div.main_blood_grpz');
  $id = $($main).attr('id');
  $name = $($main).find('div.main_blood_det>h1').text();
  
  $description = $($main).find('div.main_blood_det>h1').attr('data-original-title');
  $quantitysz = $($main).find('div.main_blood_det>label.quantitysz').text().match(/\d+/);
 
  $('#group_name_x').text($name);
  $('#ebdescription').val($description);
  $('#quantity').val($quantitysz);
  $('#quantity').attr('old',$quantitysz);

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

  quantity = parseInt(quantity)+parseInt($('#quantity').attr('old'));


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
  

/*================================================================================================================*/
/*================================================================================================================*/





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
 
          show_status ( "#demail", 1, null); 
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




 

  

 
 


  $("#daddress").keyup(function(e) {
      show_status ( this,0, null);
    if($(this).val().trim().length > 2)
      show_status ( this,1, null);
     

  });


$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})

 
    $("#dmphone").intlTelInput();
doTidSd();





    function doTidSd() {
      if ($('#vdmphone').val() ==  null) { return;}
      $("#dmphone").intlTelInput("setNumber", "+"+$('#vdmphone').val()); 
      var emphone_extension = parseInt($("#dmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
      
      emphone_extension = emphone_extension+"";
      var emphone = $('#dmphone').val();
      if(emphone.charAt(0)=='+')
        emphone = emphone.substring(1);

      for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
        if(emphone_extension[ii]==emphone[ii])
          jj++;
      emphone = emphone.substring(jj);
      $("#dmphone").val(emphone);


  

    }



//update_profile




  $("#update_profile").validate({
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
      $idd = $('#my_zxid').attr('did');
         var dfname = $('#dfname').val();
         var dlname = $('#dlname').val();
         var demail = $('#demail').val();
         var dmphone = $('#dmphone').val();
        var daddress = $('#daddress').val();


         var dpassword = $('#dpassword').val();
         var upadanimage = $('#upadanimage>span.fileinput-new').text();
         upadanimage = upadanimage.trim();
         var dmphone_extension = parseInt($("#dmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);




 
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
       

 
      $submit = $('#login_form[type="submit"]');

      $.post('../ajax.php',{action:'update-profile',
        id: $idd,
      dfname: dfname, 
      dlname: dlname,
      demail : demail, 
      dmphone: dmphone_extension+dmphone,
      daddress: daddress,
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
                      msg: 'incorrect password' ,
                      img: $("#loged_in_image").attr("src")
                  });
 
        }
         else{
         
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
  



  $("#new_pass_doc").validate({
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
      $.post('../ajax.php',{action:'doc_pass_new', 
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






    $('#send_this_message').click( function() {

      $text = $('#text_area_oi').val();

            if( $text.trim().length == 0){
          Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'insert some text ' ,
                      img: $("#loged_in_image").attr("src")
                  });
        return;
      }
       

      $idd = $('#my_zxid').attr('did');
      $tid = $('#displsy_mshd').attr('did');

      if($tid == '0') {
                  Lobibox.notify('warning', {
                      size: 'mini',
                      showClass: 'zoomInLeft',
                      hideClass: 'zoomOutRight',
                      msg: 'select a patient ' ,
                      img: $("#loged_in_image").attr("src")
                  });
        return;
      }

    $.post('../ajax.php',{action:'enter_message' , 
      id: $idd,
      to:$tid,
      message:$text 
    },function(response){
      console.log(response);
    if(response.substring(0, 5) == "Error"){
      console.log("error");
        return;
      } 
      if (response.trim().length > 1) {
          response =$.parseJSON(response); 
          if(response.success > 0){
             console.log("hello man");
      $('#text_area_oi').val('');

        $mo_ms =' '+
                                     '<li class="media" did="'+response.success+'"  livestamp="'+return_now(new Date()) +'"   >'+
                                        '<div class="media-body">'+
                                           ' <div class="media">'+
                                               ' <a class="pull-right" href="profile.php">'+
                                               '     <img class="media-object img-circle from_image" src="assets/img/user.png" />'+
                                              '  </a>'+
                                               ' <div class="media-body text_ri" ><p>'+
                                                    $text +
                                                    '</p><br />'+
                                                      ' <i class="fa fa-check readadd" aria-hidden="true" style="color: #d1d1d1;"  data-toggle="tooltip" title="'+response.read_at+'"></i> '+
                                                   '<i style="padding-right: 20px; display: none;" class="fa fa-times remove_meaaa"  did="" aria-hidden="true"></i>'+
                                                  '<small class="text-muted">'+$('#my_name_yar').text()+' |  <span data-livestamp="'+return_now(new Date()) +'"></span></small>'+
                                                    ' <hr />'+
                                                '</div>'+
                                            '</div>'+
                                       '</div>'+
                                   '</li>';






$('#displsy_mshd').append($mo_ms);
$('.from_image').attr('src', $('#user_image').attr('src'));


        $('.pakoda_backo_etra').scrollTop($('#displsy_mshd').height());
           } else {
              
          }

        }

      });





    });



$('#text_area_oi').keyup(function(e){
    if(e.keyCode == 13)
    { 
        document.getElementById("send_this_message").click();
    }
});

  
function di_this_Action() {


        $('#displsy_mshd').empty();
    $('#displsy_mshd').append('<li style=" text-align:center; width:100%;"><div class="col-sm-offset-5 col-md-4" style="   cursor: wait;  " > <div class="loader"></div></div></li>');
}

$(document).on('click', '.click_show', function () {

  di_this_Action();

 
  $thathus = $(this);
      $($thathus).css('cursor', 'wait');
$image0p = null;
  $idd = $(this).attr('did');
$thiza = $(this); 
 
 

      $tid = $('#displsy_mshd').attr('did','' );

      $didd = $('#my_zxid').attr('did');

   $.post('../ajax.php',{action:'get_message_d',pid:$idd, id:$didd, status:1},function(response){
      //  console.log(response);
      if(response.substring(0, 5) == "Error"){

                  console.log("error");
                  return;
                     
                  } else  
                  if (response.trim().length > 1) {
           
                    response =$.parseJSON(response); 
                    console.log(response);
                    response = response.success;

                    if(response.success > 0) {

                    $message = response.message ;
                   
      $tid = $('#displsy_mshd').attr('did',$idd );
$mo_ms ='';


      for( oo = 0; oo<$message.length ; oo++ ) {
$clo0uiu =""; 
$image0p = $message[oo].pimage;
$xolo = 'style="color: #d1d1d1;"  ';
        if($message[oo].readed == 1) {

$xolo = 'style="color: #49BDFF;"  data-toggle="tooltip" title=" '+$message[oo].read_ata+'" ';

        }

        if($message[oo].patient_doctor == 0) {
 


        $mo_ms  +=' '+
                                    '<li class="media" did="'+$message[oo].id+'" livestamp="'+$message[oo].xdate+'"  >'+
                                        '<div class="media-body">'+
                                           ' <div class="media">'+
                                               ' <a class="pull-right" href="profile.php">'+
                                               '     <img class="media-object img-circle from_image" src="assets/img/user.png" />'+
                                              '  </a>'+
                                               ' <div class="media-body text_ri" ><p>'+
                                                   $message[oo].message_description+
                                                    '</p><br />'+
                                                      ' <i class="fa fa-check readadd" aria-hidden="true"  '+$xolo+' ></i> '+
                                                    '<i style="padding-right: 20px; display: none;" class="fa fa-times remove_meaaa"  did="" aria-hidden="true"></i>'+
                                                  '<small class="text-muted">'+$message[oo].doctor+' |  <span data-livestamp="'+$message[oo].xdate+'"></span></small>'+
                                                   ' <hr />'+
                                                '</div>'+
                                            '</div>'+
                                       '</div>'+
                                   '</li>';

        } else if($message[oo].patient_doctor == 1) {




        $mo_ms +=' '+
                                       '<li class="media" did="'+$message[oo].id+'" livestamp="'+$message[oo].xdate+'" >'+
                                        '<div class="media-body">'+
                                           ' <div class="media">'+
   '<form name="photo" action="patient.php" method="post" enctype="multipart/form-data" class="hidden"  >'+
          ' <input type="text" name="id" class="hidden" value="" id="passvaluePo" />'+
' <input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default clcik_fk hidden"   />'+
'</form>'+


                                               ' <a class="pull-left clcik_for_these" href="#">'+
                                               '     <img class="media-object img-circle to_image" src="assets/img/user.png" />'+
                                              '  </a>'+
                                               ' <div class="media-body" ><p>'+
                                                   $message[oo].message_description+
                                                    '</p><br />'+ 
                                                 '<small class="text-muted">'+$message[oo].patient+' |  <span data-livestamp="'+$message[oo].xdate+'"></span></small>'+
                                                    ' <hr />'+
                                                '</div>'+
                                            '</div>'+
                                       '</div>'+
                                   '</li>';

        }


        //$message.length

      }
        $('#displsy_mshd').empty();

$('#displsy_mshd').append($mo_ms);
      $($thathus).css('cursor', 'pointer');

$('.from_image').attr('src', $('#user_image').attr('src'));



if($image0p ==  null ) {
$head = $($thiza).parent('div').closest('.media'); 
console.log($($head).find('a'));

$src = $($head).find('img.img-circle').attr('src');
console.log($src);
$('.to_image').attr('src', $src);

} else {


url = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/patient/images_/"+$image0p;
console.log(url);
  set_image_('.to_image', url) ;


}

        $('.pakoda_backo_etra').scrollTop($('#displsy_mshd').height());

 
}

                   
           }

      });



});





$(document).on( 'click', '.clcik_for_these', function () {

  $media = $(this).parent('div').closest('.media');
  $($media).find('.clcik_fk').click();
});



/*=======================================================================================================================================*/


 $(document).on( 'mouseenter', '.media-body' , function() {
  $(this).find('i.remove_meaaa').css('display', 'inline');
 });



 $(document).on( 'mouseleave', '.media-body' , function() {
  $(this).find('.remove_meaaa').css('display', 'none');
 });




( function sech_msg(){
if($("#helloacjofhiouyr5345897").offset() != null){
if($("#helloacjofhiouyr5345897").offset().top < $(window).scrollTop() + $(window).outerHeight()) {
 


sech_msg_read();


  $last_time = null;
  $last_time =  $('#displsy_mshd').children('li').last().attr('livestamp');

 

      $tid = $('#displsy_mshd').attr('did'  );

      $didd = $('#my_zxid').attr('did');

       //   console.log($didd,$tid , $last_time); 



if($last_time ==  null) {
    setTimeout(sech_msg, 100) 

  } else 
   $.post('../ajax.php',{action:'get-new-one-doc', fid:$tid, tid:$didd, time:$last_time, status:1 },function(response){
  //        console.log(response); 
      if(response.substring(0, 6) == "Error: "){

                  console.log("error");
                    
  setTimeout(sech_msg, 100)
  return;
                  } 
                  if (response.trim().length > 1) {
           
                        
                    response =$.parseJSON(response); 
                  //  console.log(response);
                    response = response.success;

                    if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

                    $message = response.message ;
oo =0;

        $mo_ms =' '+
                                       '<li class="media" did="'+$message[oo].id+'" livestamp="'+$message[oo].xdate+'" >'+
                                        '<div class="media-body">'+
                                           ' <div class="media">'+
   '<form name="photo" action="patient.php" method="post" enctype="multipart/form-data" class="hidden"  >'+
          ' <input type="text" name="id" class="hidden" value="" id="passvaluePo" />'+
' <input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default clcik_fk hidden"   />'+
'</form>'+


                                               ' <a class="pull-left clcik_for_these" href="#">'+
                                               '     <img class="media-object img-circle to_image" src="assets/img/user.png" />'+
                                              '  </a>'+
                                               ' <div class="media-body" >'+
                                                   $message[oo].message_description+
                                                    '<br />'+ 
                                                 '<small class="text-muted">'+$message[oo].patient+' |  <span data-livestamp="'+$message[oo].xdate+'"></span></small>'+
                                                     
                                                    ' <hr />'+
                                                '</div>'+
                                            '</div>'+
                                       '</div>'+
                                   '</li>';



$('#displsy_mshd').append($mo_ms);




url = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/patient/images_/"+$message[oo].pimage;
console.log(url);
  set_image_('.to_image', url) ;


        //$message.length
        console.log($('#displsy_mshd').height());
        $('.pakoda_backo_etra').scrollTop($('#displsy_mshd').height());
 

 }



}
  setTimeout(sech_msg, 100)
                 
      });
 

}
}else {
  setTimeout(sech_msg, 100)

}


})()




$(document).on('click', '.remove_meaaa', function() {
 


         $thispa = $(this).closest('li');


         $idd = $(this).closest('li').attr('did');

            $.post('../ajax.php',{action:'delete-this-msg', id:$idd  },function(response){
        // console.log(response); 
      if(response.substring(0, 6) == "Error: "){

                  console.log("error");
       
  return;
                  } 
                  if (response.trim().length > 1) {

                      response =$.parseJSON(response);
 

                      if(response.success > 0){

                        $($thispa).remove();

}
                  }


                });
           
});




  function sech_msg_read(){

if($("#helloacjofhiouyr5345897").offset().top < $(window).scrollTop() + $(window).outerHeight()) {


      $('#displsy_mshd').find('.readadd').each( function () {
// console.log($(this).css('color') );
         if( $(this).css('color') == 'rgb(209, 209, 209)') {
            $idd = $(this).closest('li').attr('did');

 do_Abv($idd );


         } 




      });

 
 
 

}


} 


function do_Abv($idd ) {

                         $.post('../ajax.php',{action:'get-read-is-doc', id:$idd },function(response){
                            //   console.log(response); 
                            if(response.substring(0, 6) == "Error: "){

                                        console.log("error");
                                          
                                        return;
                                      } 
                                        if (response.trim().length > 1) {
                                 
                                              
                                          response =$.parseJSON(response); 
                                        //  console.log(response); 

                    response = response.success;

                    if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

                    $message = response.message ;
oo =0;

            $('#displsy_mshd').find('li').each( function () {

              if($(this).attr('did') == $idd ){ 

                $(this).find('.readadd').css('color', '#49BDFF');
                $(this).find('.readadd').attr('data-toggle', 'tooltip');
                $(this).find('.readadd').attr('title',$message[oo].read_ata);

$message[oo].message_description
              }



            });



                                           }



                      }

                                       
                            });




}






/*===============================================================*/


/*===============================================================*/

function do_some_stf( $doc_id) {

              $('#all_me_users').find('li').each( function () {
                $sho0d = $(this).find('.click_show');
              if($($sho0d).attr('did') ==  $doc_id ){ 
                  $($sho0d).click();
              }
            });

$('#displsy_mshd').attr('echo','') ;
       $('#displsy_mshd').removeAttr('echo');      
}


( function sech_msg_update(){


  if($('#displsy_mshd').attr('echo') !=null)
    if($('#displsy_mshd').attr('echo') =='not_now')
      if($('#displsy_mshd').attr('did') !=null)
        if($('#displsy_mshd').attr('did') >0 )
          do_some_stf( $('#displsy_mshd').attr('did'));


 
$('div.nobershere').css('background-color', 'white');

$('.id_show_this_messages0').text(0); 

      $didd = $('#my_zxid').attr('did');

                         $.post('../ajax.php',{action:'get-msg_not_read-is-doc-1', id:$didd },function(response){
                            // console.log(response); 
                            if(response.substring(0, 6) == "Error: "){

                                        console.log("error");
                                          
                                        return;
                                      } 
                                        if (response.trim().length > 1) {
                                 
                                              
                                          response =$.parseJSON(response); 
                                        //  console.log(response); 

                    response = response.success;

                    if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

                    $message = response.message ;
oo =0;

 //$message[oo].read_ata
    // avbwkjr345(  );
     for( oo=0; oo< $message.length; oo++){
            $('#all_me_users').find('li').each( function () {
                $sho0d = $(this).find('.click_show');
              if($($sho0d).attr('did') ==  $message[oo].patient_id ){ 
                  $($sho0d).find('div.nobershere>p').text($message[oo].number);
                  $($sho0d).find('div.nobershere').css('background-color', 'blue');
              }
            });
     }

 

$('.id_show_this_messages0').text(oo); 

                                           }



                      }

  setTimeout(sech_msg_update, 1000)

                                       
                            });


})()






$('#cjek893457sdhj').click( function() {





      $didd = $('#my_zxid').attr('did');

                         $.post('../ajax.php',{action:'get-msg_not_read-is-doc-1', id:$didd },function(response){
                            // console.log(response); 
                            if(response.substring(0, 6) == "Error: "){

                                        console.log("error");
                                          
                                        return;
                                      } 
                                        if (response.trim().length > 1) {
                                 
                                              
                                          response =$.parseJSON(response); 
                                        //  console.log(response); 

                    response = response.success;

                    if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

                    $message = response.message ;
oo =0;

oo =$message.length;


$('.id_show_this_messages0').text(oo); 
$append_string = '';

     for( oo=0; oo< $message.length; oo++){
$spolot = $message[oo].image.split('.');
$append_string+=   ''+
                                    '    <li>'+
   
        '<form name="phodo" action="message.php" method="post" enctype="multipart/form-data" id="patiendt_id" class="hidden">'+
        '<input type="text" name="id" class="hidden" value="'+$message[oo].pid+'"   />'+
       ' <input type="submit" name="upload" value="Upload" class="hidden pass_value_heredddd"   />'+

   ' </form>'+                                 
                                    '        <a href="#" class="ackjshflkiutr3e98457">'+
                                     '           <div class="pull-left">'+
                                      '              <img src="" class="img-circle cockl9847654" id="iser_id_tr'+$spolot[0]+'" alt="User Image">'+
                                       '         </div>'+
                                        '        <h4>'+$message[oo].name+
                                          '      <small><i class="fa fa-clock-o"></i> '+$message[oo].number+'messages</small>'+
                                           '   </h4>'+ 
                     '                       </a>'+
                      '                  </li>' ;


                      $messageoo = $message[oo].image;
     } 

     console.log($append_string);
$('#id_show_this_messages1').empty();
$('#id_show_this_messages1').append($append_string );


url = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/patient/images_/"+$messageoo;
console.log(url);
  set_image_('#iser_id_tr'+$spolot[0], url) ;



                                           }



                      }
 
                                       
                            });




});

/*===============================================================*/
  $(document).on( 'click', '.ackjshflkiutr3e98457', function() {

    $(this).parent('li').find('.pass_value_heredddd').click();
console.log($(this).parent('li').find('.pass_value_heredddd'));

  });
/*===============================================================*/

/*================================================ nurs===========================================================*/


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


$('#nback_me_from_top').click( function () {

  $('#add_nurse_here_thiz_5').css('display', 'block');
  $('#dispaly_a_nurse_5').css('display', 'none');

});











/*=============================================================================================================================*/









/*===============================================================*/
/*===============================================================*/
/*===============================================================*/









$(document).on('click', '.clcik_for_show_logCall', function () {
        

        $('#he_re_is_thie_clik').css('display', 'none');

 
  $thathus = $(this);
  $($thathus).css('cursor', 'wait');
  $image0p = null;
  $idd = $(this).attr('did');
  $thiza = $(this);


 // $tid = $('#displsy_mshd').attr('did','' );
 
      $didd = $('#my_zxid').attr('did');


    $.post('../ajax.php',{action:'return-patient_e', id:$idd },function(response){
  //  console.log(response);

    $('#displsy_mshd').empty();

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      return;
      
    } else  
    if (response.trim().length > 1) {
     
      response =$.parseJSON(response); 
     // console.log(response);
      response = response.success;

      if(response.success > 0) {



        $value = response.patient[0] ;
        $('.name_acto').text( $value.fname+' '+ $value.lname);


        $('.name_nemx_depar').text($value.email);

        $('#action_vutton_here_click').html(' '+
         '<form name="photo" action="../video.php" method="post" enctype="multipart/form-data"   class="form-horizontal ">'+
                                           '<input type="text" name="did" class="hidden" value="'+$value.id+'" id="passvaluePo" />'+
                    '<input type="text" name="id" class="hidden" value="'+ $('#my_zxid').attr('did')+'" id="passvaluePo1" />'+
                    '<input type="text" name="user" class="hidden" value="d" id="passvaluePo2" />'+
                    '<input type="text" name="path" class="hidden" value="'+ window.location.href+'" id="passvaluePo3" />'+
                    '<input type="text" name="key" class="hidden" value="0" id="passvaluePo3" />'+
                  
           ' <button class="btn"><i class="fa fa-video-camera " aria-hidden="true"></i>   call</button> '+    
          '</form>'+

          '');
//


        console.log($value);

        

        url      = window.location.href;  
         url = url.substring(0, url.lastIndexOf('/'));
        url = url.substring(0, url.lastIndexOf('/'));



        url = url+"/patient/images_/"+$value.image;
        console.log(url);
        set_image_('.here_the_new_main', url) ;

        $('#clcik_for1').click();
        $('#he_re_is_thie_clik').css('display', 'block');

        

    }

    
  }

});





$('#new_details_desc').empty();

  $.post('../ajax.php',{action:'get_call_log_d',id:$didd, pid:$idd, status:1},function(response){
    console.log(response);
    $('#displsy_mshd').empty();
    if(response.substring(0, 5) == "Error"){

      console.log("error");
      return;
      
    } else  
    if (response.trim().length > 1) {
     
      response =$.parseJSON(response); 
      // console.log(response);
      response = response.success;

      if(response.success > 0) {

        $message = response.message ;
        
      
        //console.log($message);

        $image0p = null;

        for ( ii = 0 ; ii < $message.length ; ii++) {
          //console.log( $message[ii]);


          $ico_status = '   <!-- <i class="fa fa-arrow-down color-green" aria-hidden="true"></i>'+
         '   <i class="fa fa-arrow-up color-blue" aria-hidden="true"></i> '+
         '   <i class="fa fa-bolt color-red" aria-hidden="true"></i>'+
          '   -->' ;
          $statu = '0';
          $time_leng = '';
          $image_clo = '';
          $name = '';


          $image0p = $message[ii].pimage; 




          if($message[ii].patient_doctor == '1') {
            $ico_status = '<i class="fa fa-arrow-down color-green" aria-hidden="true"></i>';
            $statu = '1';
            $image_clo = 'to_image';
            $name = $message[ii].patient;
          }


          if($message[ii].patient_doctor == '0') {
            $ico_status = '<i class="fa fa-arrow-up color-blue" aria-hidden="true"></i>';
            $statu = '2';
            console.log('dddd');
            $image_clo = 'from_image';
            $name = $message[ii].doctor;


          }

          $time_leng = time_between($message[ii].df, $message[ii].dt);

          if ($message[ii].missed == '1') {
            $ico_status =$ico_status + '<i class="fa fa-bolt color-red" aria-hidden="true"></i>';
            
            $statu = '3';
          } else {



          }


            $('#new_details_desc').prepend(' '+
                         ' <li class="each_of_u_here" status="'+$statu+'">'+
                          '  <img src="" class="each_of_u_ '+$image_clo+'">'+
                          '  <span class="name_lrft"> '+$name+'</span>'+
                           ' <span class="manme_cio"> '+
                              $ico_status+
                          ' <span style="padding-left: 20px;"> '+$time_leng+' </span>'+
                        '    <span class="rrignt"> '+$message[ii].date_from+'</span>'+
                        '  </li>'+


           ' ');
        }
 



      $('.from_image').attr('src', $('#user_image').attr('src'));



      if($image0p ==  null ) {
        $head = $($thiza).parent('div').closest('.media'); 
        console.log($($head).find('a'));

        $src = $($head).find('img.img-circle').attr('src');
        console.log($src);
        $('.to_image').attr('src', $src);

      } else {


        url      = window.location.href;  
         url = url.substring(0, url.lastIndexOf('/'));
        url = url.substring(0, url.lastIndexOf('/'));



        url = url+"/patient/images_/"+$image0p;

       // url = "/patient/images_/"+$image0p;
        console.log(url);

        set_image_('.to_image', url) ;

      }




          $($thathus).css('cursor', 'pointer');

      $('.pakoda_backo_etra').scrollTop($('#displsy_mshd').height());
    }

    
  }

});



});



  $('#clcik_for1').click(function(e) {
    e.preventDefault();
    $('#new_details_desc').find('.each_of_u_here').css('display', 'block');
    console.log(' hello ');
  });






  $('#clcik_for2').click(function(e) {

    $('#new_details_desc').find('.each_of_u_here').css('display', 'none');


    $('#new_details_desc').find('.each_of_u_here').each( function() {

      if($(this).attr('status') == '1')
        $(this).css('display', 'block');
    });
  });






  $('#clcik_for3').click(function(e) {

    $('#new_details_desc').find('.each_of_u_here').css('display', 'none');
    $('#new_details_desc').find('.each_of_u_here').each( function() {

      if($(this).attr('status') == '2')
        $(this).css('display', 'block');
    });
  });






  $('#clcik_for4').click(function(e) {

    $('#new_details_desc').find('.each_of_u_here').css('display', 'none');
    $('#new_details_desc').find('.each_of_u_here').each( function() {

      if($(this).attr('status') == '3')
        $(this).css('display', 'block');
    });
  });






/*=======================================================*/

( function sech_call(){
   
        $didd = $('#my_zxid').attr('did');

         //   console.log($didd,$tid , $last_time); 
 


   $.post('../ajax.php',{action:'get-new-call-for-doc', id:$didd,  status:1 },function(response){
  //        console.log(response); 
      if(response.substring(0, 6) == "Error: "){

                  console.log("error");
                    
  setTimeout(sech_call, 100)
  return;
                  } 
                  if (response.trim().length > 1) {
           
                        
                    response =$.parseJSON(response); 
                 //    console.log(response);
                    response = response.success;

$('#show_ringi').removeClass('faa-ring animated');
$('.no_of_notifi').text(""); 

                    if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

 

                    $message = response.message ;
oo =0;

oo =$message.length;


$('.no_of_notifi').text(oo); 
$('#show_ringi').addClass('faa-ring animated');

$append_string = '';

if($message.length <1)
$('#call_here_this').empty();


     for( oo=0; oo< $message.length; oo++){
$spolot = $message[oo].image.split('.');
$append_string+=   ''+
                                    '    <li>'+
    

            '<form name="photo" action="../video.php" method="post" enctype="multipart/form-data"   class=" hidden ">'+
                                           '<input type="text" name="did" class="hidden" value="'+$message[oo].id+'" id="passvaluePo" />'+
                    '<input type="text" name="id" class="hidden" value="'+ $('#my_zxid').attr('did')+'" id="passvaluePo1" />'+
                    '<input type="text" name="user" class="hidden" value="d" id="passvaluePo2" />'+
                    '<input type="text" name="path" class="hidden" value="'+ window.location.href+'" id="passvaluePo3" />'+
                    '<input type="text" name="key" class="hidden" value="'+$message[oo].description+'" id="passvaluePo3" />'+
                  
       ' <input type="submit" name="upload" value="Upload" class="hidden pass_value_heredddd"   />'+   
          '</form>'+


                                    '        <a href="#" class="ackjshflkiutr3e98457">'+
                                     '           <div class="pull-left">'+
                                      '              <img src="" class="img-circle cockl9847654" id="iser_id_tr'+$spolot[0]+'"  >'+
                                       '         </div>'+
                                        '        <h4>'+$message[oo].name+
                                          '      <small><i class="fa fa-clock-o"></i> '+'</small>'+
                                           '   </h4>'+ 
                     '                       </a>'+
                      '                  </li>' ;


                      $messageoo = $message[oo].image;
     } 

  //   console.log($append_string);
$('#call_here_this').empty();
$('#call_here_this').append($append_string );


url = window.location.href;  
 url = url.substring(0, url.lastIndexOf('/'));
url = url.substring(0, url.lastIndexOf('/'));
  url = url+"/patient/images_/"+$messageoo;
console.log(url);
  set_image_('#iser_id_tr'+$spolot[0], url) ;

 

 }



}

  setTimeout(sech_call, 100)
                 
      });
 
 


})()




/*===============================================================*/
/*===============================================================*/
/*===============================================================*/
 
function time_between(start_actual_time, end_actual_time) {

  console.log(start_actual_time, end_actual_time);

  if(end_actual_time == null)
    return '00:00';
   start_actual_time = new Date(start_actual_time);
  end_actual_time = new Date(end_actual_time);

  var diff = end_actual_time - start_actual_time;

  var diffSeconds = diff/1000;
 
  s = diffSeconds;
  var h = Math.floor(s/3600); //Get whole hours
  s -= h*3600;
  var m = Math.floor(s/60); //Get remaining minutes
  s -= m*60;
  console.log("------------------------"+h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s));



  var formatted = h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s);
  return formatted;
}







function return_now (d ) { 
    
var dformat = d.toISOString(); 
     return dformat;
}

function return_now_dt (d ) { 
        dformat =  (d.getFullYear()+'-'+
                    d.getMonth()+1)+'-'+
                    d.getDate()+ ' ' +
                   d.getHours()+':'+
                    d.getMinutes()+':'+
                    d.getSeconds();
     return dformat;
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
     