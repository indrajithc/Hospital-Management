
$(document).ready(function(e) {

  $(".js-example-basic-single").select2();
  $(':checkbox').checkboxpicker();
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })




  $(window).resize(function() {
    console.log($(window).height());
    $('.pakoda_backo_etra').height($(window).height() -330);
  });

  $(window).trigger('resize');



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



  $('#show-prff').click( function() {
    
    if($(this).attr("show") == "0") {

      $("#fodqwe").addClass("crossRotate-d");
      $("#show_this_s").animate( { "opacity": "show", top:"50"} , 5 );
      $('#show_this_s').focus();
      $(this).attr("show", "1");

    } else {

      $("#fodqwe").removeClass("crossRotate-d");
      $("#show_this_s").animate( { "opacity": "hide", top:"50"} , 500 );
      $(this).attr("show", "0");
    }
  });


  $('#show_this_s').focusout(function() {
    if($('#show-prff').attr("show") == "1") {
     $("#show_this_s").animate( { "opacity": "hide", top:"50"} , 500 );
     $("#fodqwe").removeClass("crossRotate-d");
   }
 });


  function update_name_and_id_selet_2( $id, $array) {
    varo =0;
    $($id).find('option').each(function() {
      if(varo == 0)
        $($id).select2('destroy').empty();
      varo =1;
    });

    for (var i =0; i< $array.length ; i++) {
      if( $array[i].name)
        $($id).select2({data: [{id: $array[i].id, text: $array[i].name }]});   
      else
       $($id).select2({data: [{id: $array[i].id, text: $array[i].fname+" "+$array[i].lname }]});                     
   }

   $($id).trigger('change');

 }

 


 /*======================================================== add details======================================================*/
 for_abv ();

 $(document).on('change', '#department_name', function() {
   
  for_abv ();


});

 function for_abv (){

  $department_name = $('#department_name').val();


  if ($department_name == null) { return; }
  $.post('../ajax.php',{action:'get-add-doc',department_name:$department_name },function(response){

    


   console.log(response);

   if(response.substring(0, 5) == "Error"){

    console.log("error");
    actual = "0";
  } 
  if (response.trim().length > 1) {

    response =$.parseJSON(response); 
    console.log(response.success);
    update_name_and_id_selet_2( "#doctor_name", response.success) ;

    show_status ( '#department_name',1, null);
  }
});



}

$(document).on('change', '#doctor_name', function() {
  $('.doc_details').css('display', 'none');
  $('.doc_details>img').attr('src', '');
  $('.doc_details>h1').text('');
  $('.oc_details>h2').text('');
  $('.doc_details>p').text('');

  
  $doctor_name = $('#doctor_name').val();
  $.post('../ajax.php',{action:'get-one-doc',doctor_name:$doctor_name },function(response){

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      actual = "0";
    } 
    if (response.trim().length > 1) {

      response =$.parseJSON(response); 
      response =response.success[0];
      
      if(response){
        console.log(response.email);

        $('.doc_details>h1').text(response.fname+" "+response.lname);
        $('.doc_details>h2').text(response.email);
        $('.doc_details>p').text(response.mphone);

        $('.doc_details').css('display', 'block');


        set_image_('.doc_details>img', "/doctor/images_/"+response.image);

        show_status ( '#doctor_name',1, null);

      }

    }
  });


});



$("#pmphone, #plphone").intlTelInput();

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
  
  if($(this).val().trim().length < 10){
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



$(document).on('change', '#psex', function() {
  show_status ( this,1, null);
  
});



$(document).on('change', '#pdob > input[type=text]', function() {
  $date = $('#pdob > input[type=text]').val();
  
  show_status ( this,0, null);
  console.log($date );
  if($date.length > 2){
    show_status ( this,1, null);
  } else {
    show_status ( this,2, null);
  }


  console.log(this);

});


$('#pdob').datepicker({
  format: 'dd-mm-yyyy',
  endDate: '1d'
});


$("#paddress").keyup(function(e) {
  show_status ( this,0, null);
  if($(this).val().trim().length > 2)
    show_status ( this,1, null);
  

});
$(document).on('change', '#pblood_group', function() {
 
  show_status ( this,1, null);


});








$("#add_profile").validate({
  rules: {  
    pmphone:{
      required: true,
      minlength: 10
    },
    pdob:{
      required: true,
      australianDate: true

    } 
  }, 
  submitHandler: function(form, event){
    console.log("dddddd");



    var idd = $('#my_zxid').attr('did');
    var doctor_name = $('#doctor_name').val(); 

    console.log("dddddd");

    var dmphone = $('#pmphone').val();
    var dlphone = $('#plphone').val();
    var dsex = $('#psex').val();
    var ddob = $('#pdob> input[type=text]').val();
    var daddress = $('#paddress').val();
    var pblood_group = $('#pblood_group').val();



    var upadanimage = $('#pimage_base').find('span.fileinput-new').text();


    var dmphone_extension = parseInt($("#pmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
    var dlphone_extension = parseInt($("#plphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);


    




    if(dlphone)
      dlphone= dlphone_extension+dlphone+"";

    
    $submit = $('#login_form[type="submit"]');

    $.post('../ajax.php',{action:'add-profile',
      id:idd,
      doctor_name: doctor_name, 
      dmphone: dmphone_extension+dmphone,
      dlphone: dlphone,
      dsex: dsex,
      ddob: ddob, 
      daddress: daddress,
      pblood_group: pblood_group,  
      upadanimage : upadanimage

    },function(response){
        //$('.div_02').html(data);

        console.log(response);
        if(response.substring(0, 5) == "Error"){

          console.log("error");
          return;
        }
        if (response.trim().length > 1) {

          response =$.parseJSON(response);
          
          if(response.success>0) {
           $('#doc_details').css('display', 'none');
           $('.doc_details>img').attr('src', '');
           $('.doc_details>h1').text('');
           $('.doc_details>h2').text('');
           $('.doc_details>p').text('');


           $("#add_profile").find("input[type=text], input[type=password], input[type=email] , textarea").val("");
           $('body').html('<script type="text/javascript">window.location = "index.php";</script>');
           
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

  }
  


});

//



$('#xdepartment_name').change(function() {
 

  xfor_abv ();


});

function xfor_abv (){

  $department_name = $('#xdepartment_name').val();
  $.post('../ajax.php',{action:'get-add-doc',department_name:$department_name },function(response){

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      actual = "0";
    } 
    if (response.trim().length > 1) {

      response =$.parseJSON(response); 
      
      update_name_and_id_selet_2( "#xdoctor_name", response.success) ;

      show_status ( '#xdepartment_name',1, null);
    }
  });



}




$('#xdoctor_name').change(function() {
  $('.new_cla_cli').css('display', 'none');
  $('.xdoc_details>img').attr('src', '');
  $('.xdoc_details>h1').text('');
  $('.xdoc_details>h2').text('');
  $('.xdoc_details>h3').text('');
  $('.xdoc_details>p').text('');
  $('#necy_appo_1').attr('did', '');

  
  $doctor_name = $('#xdoctor_name').val();

  if ($doctor_name == null) { return;}
  $.post('../ajax.php',{action:'get-one-doc',doctor_name:$doctor_name },function(response){

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      actual = "0";
    } 
    if (response.trim().length > 1) {

      response =$.parseJSON(response); 
      response =response.success[0];
      
      if(response){
        console.log(response.email);

        $('.xdoc_details>h1').text(response.fname+" "+response.lname);
        $('.xdoc_details>h2').text(response.email);
        $('.xdoc_details>h3').text(response.mphone);
        $('.xdoc_details>p').text(response.qualification);


        $('#necy_appo_1').attr('did', response.id);

        $('.new_cla_cli').css('display', 'block');


        set_image_('.xdoc_details>img', "/doctor/images_/"+response.image);

        show_status ( '#xdoctor_name',1, null);

      }

    }
  });


});




$('.click_id_d1').click(function() {

  show_hide ( '.show_hide_here', '#show_hide_1');
  $('.new_cla_cli').css('display', 'none');
  $('.xdoc_details>img').attr('src', '');
  $('.xdoc_details>h1').text('');
  $('.xdoc_details>h2').text('');
  $('.xdoc_details>h3').text('');
  $('.xdoc_details>p').text('');
  $('#necy_appo_1').attr('did', '');

  show_status ( this,99 , null);

  $('#xdoctor_name').trigger('change');

});



$('#necy_appo_1').click( function(){
  $doc_id = $(this).attr('did');
  if ($doc_id.trim().length<1) {
    return;
  }

  $('#show_hide_2').attr('did', $doc_id );

  $doctor_name = $('#show_hide_2').attr('did');
  $.post('../ajax.php',{action:'doctor_schedule',doctor_name:$doctor_name },function(response){


    if(response.substring(0, 5) == "Error"){

      console.log("error");
      actual = "0";
    } 
    if (response.trim().length > 1) {

      response =$.parseJSON(response);

      response_Success = response.success;

      if(response_Success.success > 0){


        $month = response_Success.month;
        $day = response_Success.day;
        $week1 = response_Success.week1;
        $week2 = response_Success.week2;

        if($week1.length >0 || $week2.length >0) {

          show_hide ( '.show_hide_here', '#show_hide_2');

          if(varox == 0){
            initial();

            varox++;
          }


          setcalendar();
        } else {
          Lobibox.notify('warning', {
            size: 'mini',
            showClass: 'zoomInLeft',
            hideClass: 'zoomOutRight',
            msg: 'you can`t get an appointment with this doctor' ,
            img: $("#loged_in_image").attr("src")
          });
          

        }

      }
    }
  });



});




/*======================================================== bgng fullcalendar======================================================*/

function initial() {

  var fix_date = function(date) {  // 17:48:56 -> 17:30:00
    date = new Date(date);
    if (date.getMinutes() > 30)
      date.setMinutes(30);
    else
      date.setMinutes(0);
    date.setSeconds(0);
    return date;
  }; 
  
  scheduler.config.xml_date="%Y-%m-%d %H:%i"; 
  scheduler.config.api_date="%Y-%m-%d %H:%i";
  scheduler.locale.labels.workweek_tab = "2 x Week";
  scheduler.config.container_autoresize = true; 
  scheduler.config.resize_month_events = true; 

  scheduler.config.details_on_dblclick = true; 
  scheduler.config.auto_end_date = true;


  scheduler.attachEvent("onTemplatesReady",function(){
      //normal 2 x Week configuration
      scheduler.date.workweek_start = scheduler.date.week_start;
      scheduler.date.get_workweek_end=function(date){ 
        return scheduler.date.add(date,14,"day"); 
      };
      scheduler.date.add_workweek=function(date,inc){ 
        return scheduler.date.add(date,inc*14,"day");
      };
      scheduler.templates.workweek_date = scheduler.templates.week_date;
      scheduler.templates.workweek_scale_date = scheduler.date.date_to_str("%D, %d");
    });



  scheduler.init('scheduler_here',new Date(),"week");
  



  var marked = null;
  var marked_date = null;
  var event_step = 30;
  scheduler.attachEvent("onEmptyClick", function(date, native_event){
    scheduler.unmarkTimespan(marked);
    marked = null;

    var fixed_date = fix_date(date);
    scheduler.addEventNow(fixed_date, scheduler.date.add(fixed_date, event_step, "minute"));
  });
  
  scheduler.attachEvent("onMouseMove", function(event_id, native_event) {
    var date = scheduler.getActionData(native_event).date;
    var fixed_date = fix_date(date);

    if (+fixed_date != +marked_date) {
      scheduler.unmarkTimespan(marked);

      marked_date = fixed_date;
      marked = scheduler.markTimespan({
        start_date: fixed_date,
        end_date: scheduler.date.add(fixed_date, event_step, "minute"),
        css: "highlighted_timespan"
      });
    }
  });

  
  
  function block_readonly(id){
    if (!id) return true;
    return !this.getEvent(id).readonly;
  }
  scheduler.attachEvent("onBeforeDrag",block_readonly)
  scheduler.attachEvent("onClick",block_readonly)

/*
    scheduler.addMarkedTimespan({
      days: new Date(2017,1,1),
      zones: "fullday",
      type: "dhx_time_block",
      css:"red_section"
    });
    */
    
    scheduler.attachEvent("onDragEnd", function(e){
     ev = scheduler.getEvent(e); 
     xpo =  check2hr(  ev, 0 );

     if(!xpo){
      $end_time = ev.start_date;

      $end_time.setTime($end_time.getTime() + (2*60*60*1000)); 

      scheduler.deleteEvent(ev.id);
      

    } 

    if(ev != null) 
      prev_event_id = ev.id;


  });
    scheduler.attachEvent("onEventSave",function(id, ev, is_new){
      ev = scheduler.getEvent(id); 

      xpo =  check2hr(  ev, 0 );

      if(!xpo){
        $end_time = ev.start_date;

        $end_time.setTime($end_time.getTime() + (2*60*60*1000)); 

        scheduler.deleteEvent(ev.id);
        
        return false;
      } 

      return true;
    });

    scheduler.attachEvent("onEventChanged", function(id,ev){
     ev = scheduler.getEvent(id); 

     xpo =  check2hr(  ev, 0 );

     if(!xpo){
      $end_time = ev.start_date;

      $end_time.setTime($end_time.getTime() + (2*60*60*1000)); 

      scheduler.deleteEvent(ev.id);
      
      return false;
    } 

    return true;
  });





    scheduler.config.limit_start = new Date(); 

    
    $_year = new Date().getFullYear().toString();
    $_month = new Date().getMonth();
    $_day = new Date().getDate();

    scheduler.config.limit_end = new Date($_year, (parseInt($_month)+6),$_day); 

    $_date_from = $_year+'-'+(parseInt($_month)+1)+'-'+$_day+' 00:00:00';
    $_date_to = $_year+'-'+(parseInt($_month)+6)+'-'+$_day+' 00:00:00';
    








    scheduler.attachEvent("onEventCreated", function(id){
     ev = scheduler.getEvent(id); 

     if(ev == null) {
       Lobibox.notify('warning', {
        size: 'mini',
        showClass: 'zoomInLeft',
        hideClass: 'zoomOutRight',
        msg: 'This time, you can`t get an appointment' ,
        img: $("#loged_in_image").attr("src")
      });
       
     } else{
       if(Date.parse(ev.start_date) >= Date.parse($_date_from) && Date.parse( ev.start_date) <= Date.parse($_date_to) ){

        if(prev_event_id > 0)
          scheduler.deleteEvent(prev_event_id);

      } else {
        
      }
    }

    
  });


    
    

  }


  function setcalendar () {

    scheduler.clearAll();




    $doctor_name = $('#show_hide_2').attr('did');
    $.post('../ajax.php',{action:'doctor_schedule',doctor_name:$doctor_name },function(response){

      console.log(response);
      if(response.substring(0, 5) == "Error"){

        console.log("error");
        actual = "0";
      } 
      if (response.trim().length > 1) {

        response =$.parseJSON(response);

        response_Success = response.success;

        if(response_Success.success > 0){
          
          $month = response_Success.month;
          $day = response_Success.day;
          $week1 = response_Success.week1;
          $week2 = response_Success.week2;

          $f_time = '23:59:59';
          $t_time = '00:00:00';
          
          for( ii =0; ii<$week2.length ;ii++){
           if(Date.parse('01/01/2011 '+$f_time) > Date.parse('01/01/2011 '+$week2[ii].time_from)){
            $f_time = $week2[ii].time_from;
          }
          if(Date.parse('01/01/2011 '+$t_time) < Date.parse('01/01/2011 '+$week2[ii].time_to)){
            $t_time = $week2[ii].time_to;
          }
        }
        

        for( ii =0; ii<$week1.length ;ii++){
         if(Date.parse('01/01/2011 '+$f_time) > Date.parse('01/01/2011 '+$week1[ii].time_from)){
          $f_time = $week1[ii].time_from;
        }
        if(Date.parse('01/01/2011 '+$t_time) < Date.parse('01/01/2011 '+$week1[ii].time_to)){
          $t_time = $week1[ii].time_to;
        }
      }

      
      if( $f_time == '24:59:59' && $t_time == '00:00:00'){
       
       Lobibox.notify('warning', {
        size: 'mini',
        showClass: 'zoomInLeft',
        hideClass: 'zoomOutRight',
        msg: 'Not available, sorry' ,
        img: $("#loged_in_image").attr("src")
      });
       return ;
     }

     if( $f_time == '24:59:59') 
       $f_time = '00:00:00'
     if( $t_time == '00:00:00') 
       $t_time = '23:59:59'
     

     $xsplit = $t_time.split(":");
     if(parseInt($xsplit[1]) >0 )
       $t_time = (parseInt($xsplit[0])+1);

     $xsplit = $f_time.split(":");
     $f_time = (parseInt($xsplit[0]));
     

     scheduler.config.first_hour = $f_time; 
     scheduler.config.last_hour = $t_time;




     $date = new Date( $_date_from);        
     while (Date.parse( $date) <= Date.parse($_date_to)) {
      $inreg = 0;
      


      scheduler.blockTime(new Date(parseInt($date.getFullYear()),parseInt($date.getMonth()),parseInt($date.getDate())),
       [0,24*60]);
      


      for( ii =0; ii<$month.length ;ii++)
        if((parseInt($date.getMonth())+1) == parseInt($month[ii].month))
          $inreg = 1;
        if($inreg == 1) {

         
          for( ii =0; ii<$week1.length ;ii++){   


            if((parseInt($date.getDay())+1) == parseInt($week1[ii].day)){
             
             $xsplit = $week1[ii].time_from.split(":");
             $$_t_f = (parseInt($xsplit[0])*60);
             $$_t_f += parseInt($xsplit[1]);

             $xsplit = $week1[ii].time_to.split(":");
             $$_t_t = (parseInt($xsplit[0])*60);
             $$_t_t += parseInt($xsplit[1]);


             scheduler.unblockTime(new Date(parseInt($date.getFullYear()),parseInt($date.getMonth()),parseInt($date.getDate())),
               [$$_t_f, $$_t_t]);

           }

         }


         


       }   
       



       for( ii =0; ii<$week2.length ;ii++){
        $week2_date_f = $week2[ii].date_from+' 00:00:00' ;
        $week2_date_t = $week2[ii].date_to+' 00:00:00';

        $week2_d_f = new Date($week2_date_f);
        $week2_d_t = new Date($week2_date_t);
        
        if(Date.parse( $date) >= Date.parse($week2_d_f) && Date.parse( $date) <= Date.parse($week2_date_t) ){
         

          scheduler.unblockTime(new Date(parseInt($date.getFullYear()),parseInt($date.getMonth()),parseInt($date.getDate())),
           [0,24*60]);

          scheduler.blockTime(new Date(parseInt($date.getFullYear()),parseInt($date.getMonth()),parseInt($date.getDate())),
           [0,24*60]);
          
          $xsplit = $week2[ii].time_from.split(":");
          $$_t_f = (parseInt($xsplit[0])*60);
          $$_t_f += parseInt($xsplit[1]);
          
          $xsplit = $week2[ii].time_to.split(":");
          $$_t_t = (parseInt($xsplit[0])*60);
          $$_t_t += parseInt($xsplit[1]);
          

          scheduler.unblockTime(new Date(parseInt($date.getFullYear()),parseInt($date.getMonth()),parseInt($date.getDate())),
           [$$_t_f, $$_t_t]);
          
          
        }

        
      }



       // console.log($date );
       // console.log($date.toDateString() );
       // console.log($date.toTimeString() ); 
       $date.setHours(24);
     }
     


   }

 }
});







$user_id = $('#main_my_zxid').attr('did');


$doctor_name = $('#show_hide_2').attr('did');
$.post('../ajax.php',{action:'return-department',doctor_name:$doctor_name },function(response){

  console.log(response);
  if(response.substring(0, 5) == "Error"){

    console.log("error");
    actual = "0";
  } 
  if (response.trim().length > 1) {

    response =$.parseJSON(response);

    response_Success = response.success;

    if(response_Success.success > 0){
      
      $events = response_Success.events;


      for( ii =0; ii<$events.length ;ii++){ 
        console.log($events[ii]);

        if($user_id  == $events[ii].patient_id ) {
            // scheduler.addEvent({
            //           id:$events[ii].id,
            //           start_date: $events[ii].date_from,
            //           end_date: $events[ii].date_to,
            //           text:  $events[ii].description,
            //           color: "blue",
            //           readonly:true
            //         });
            scheduler.parse([
             { id:$events[ii].id,
              start_date: $events[ii].date_from,
              end_date: $events[ii].date_to,
              text:  $events[ii].description,
              color: "blue",
              readonly:true}
              ],"json");

          } else {

                // scheduler.addEvent({
                //       id:$events[ii].id,
                //       start_date: $events[ii].date_from,
                //       end_date: $events[ii].date_to,
                //       text: "appointment",
                //       color: "red",
                //       readonly:true
                //     }); 
                scheduler.parse([
                 {   id:$events[ii].id,
                  start_date: $events[ii].date_from,
                  end_date: $events[ii].date_to,
                  text: "appointment",
                  color: "red",
                  readonly:true}
                  ],"json");

              }

            }   


            scheduler.parse([
             {id:1, start_date:"2013-05-21",end_date:"2013-05-25",text:"Task1", color:"red"}
             ],"json");
            

          }

        }

      });






}


/*======================================================== end fullcalendar======================================================*/


$('#necy_appo_2').click( function(){

  ev = scheduler.getEvent(prev_event_id); 

  console.log(ev);
  if (ev == null) {
   Lobibox.notify('warning', {
    size: 'mini',
    showClass: 'zoomInLeft',
    hideClass: 'zoomOutRight',
    msg: 'add an appointment first' ,
    img: $("#loged_in_image").attr("src")
  });
   return;

 }

 show_hide ( '.show_hide_here', '#show_hide_3');

 $('#added_dco').text('');
 $('#added_dco').attr('did', '');
 $('#ademaild_dco').text('');
 $('#dotommetopo').text('');

 $('#dofappo').text('');
 $('#dappo_t_fo').text('');
 
 $('#docdescription').text('');


 ev = scheduler.getEvent(prev_event_id); 
 
 if (ev == null) {
   Lobibox.notify('warning', {
    size: 'mini',
    showClass: 'zoomInLeft',
    hideClass: 'zoomOutRight',
    msg: 'add an appointment first' ,
    img: $("#loged_in_image").attr("src")
  });


   show_hide ( '.show_hide_here', '#show_hide_2');
   return;

 }
 ddat  = new Date(ev.start_date);
 $event_date = ddat.yyyymmdd();
 $event_text = ev.text;

 $event_from = ddat.toTimeString();
 ddat  = new Date(ev.end_date);

 $event_to = ddat.toTimeString();
 
 $scoSpi = $event_from.split(':');
 $event_from = $scoSpi[0]+':'+$scoSpi[1]+':00'; 

 $scoSpi = $event_to.split(':');
 $event_to = $scoSpi[0]+':'+$scoSpi[1]+':00'; 

 console.log(ddat);
 console.log($event_date);
 console.log($event_text);
 console.log($event_from);
 console.log($event_to);

  //
  //


  $doctor_name = $('#show_hide_2').attr('did');
  $.post('../ajax.php',{action:'get-one-doc',doctor_name:$doctor_name },function(response){

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      actual = "0";
    } 
    if (response.trim().length > 1) {

      response =$.parseJSON(response); 
      response =response.success[0];
      
      if(response){


        $('#added_dco').text(response.fname+" "+response.lname);
        $('#added_dco').attr('did', response.id);
        $('#ademaild_dco').text(response.email);

        $('#dofappo').text(ddat.toDateString());
        $('#dofappo').attr('date',$event_date);

        $('#dappo_t_fo').text($event_from);
        $('#dotommetopo').text($event_to);



        $('#docdescription').text($event_text);
        

        show_hide ( '.show_hide_here', '#show_hide_3');


      }

    }
  });




});


$('.click_id_d2').click(function() {



 show_status ( this,99 , null);

 show_hide ( '.show_hide_here', '#show_hide_2');



});



$('#dave_theapp').click( function(e) { 

 e.preventDefault();

 $doc_id = $('#added_dco').attr('did');       
 $date =  $('#dofappo').attr('date');     
 $time_from = $('#dappo_t_fo').text();      
 $time_to = $('#dotommetopo').text();       
 $description = $('#docdescription').text();       
 $user_id = $('#main_my_zxid').attr('did');



 $.post('../ajax.php',{action:'add-appointment',
  doc_id: $doc_id ,       
  date: $date ,    
  time_from: $time_from ,   
  time_to: $time_to ,     
  description: $description ,
  user_id:$user_id
},function(response){

  console.log(response);
  if(response.substring(0, 5) == "Error"){

    console.log("error");
    
  } 
  if (response.trim().length > 1) {

    response =$.parseJSON(response); 
    
    if(response.success >0){

      $('body').html('<script type="text/javascript">window.location = "appointments.php";</script>');


      Lobibox.notify('success', {
        size: 'mini',
        showClass: 'zoomInLeft',
        hideClass: 'zoomOutRight',
        msg: 'successfully updated' ,
        img: $("#loged_in_image").attr("src")
      });




    } else if(response.success == -1) {
      Lobibox.notify('warning', {
        size: 'mini',
        showClass: 'zoomInLeft',
        hideClass: 'zoomOutRight',
        msg: ' I already have an appointment scheduled at '+$date  ,
        img: $("#loged_in_image").attr("src")
      });
      

    } 


  }
});



});


function check2hr( ev, $co) { 
  if(ev == null) {
   Lobibox.notify('warning', {
    size: 'mini',
    showClass: 'zoomInLeft',
    hideClass: 'zoomOutRight',
    msg: 'This time, you can`t get an appointment' ,
    img: $("#loged_in_image").attr("src")
  });
   return true;
 }

 
 
 time_diff = (ev.start_date - ev.end_date)/1000 /60 / 60;
 time_diff *= -1;
 console.log(time_diff);
 if(time_diff > 2) {
  if( $co ==0)
    Lobibox.notify('warning', {
      size: 'mini',
      showClass: 'zoomInLeft',
      hideClass: 'zoomOutRight',
      msg: 'can`t select more than 2 hours ' ,
      img: $("#loged_in_image").attr("src")
    });
  $co++;
  return false;

} else 
return true;

};



$('#dave_theapp1').click( function() {

  idd = $(this).attr('did');

  Lobibox.confirm({
    msg: "Are you sure you want to delete this appointment?",
    callback: function ($this, type) {
      if (type === 'yes') {




        console.log(idd);
        $.post('../ajax.php',{action:'delete_appointment', id:idd },function(response){
          console.log(response);
          if(response.substring(0, 5) == "Error"){

            console.log("error");
            actual = "0";
          } 
          if (response.trim().length > 1) {
           
            response =$.parseJSON(response);
            
            if(response.success ==1){
              
              
              $('body').html('<script type="text/javascript">window.location = "appointment.php";</script>');

              


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

      } else if (type === 'no') {
       
      }
    }
  });
  
});


/*======================================================== add details======================================================*/


xfor_abva();
$(document).on('change','#department_namea', function() {
 
  console.log("dd");
  xfor_abva();


});

function xfor_abva(){

  console.log("dd");
  $department_namea = $('#department_namea').val();


  if($department_namea == null)
    return;

  $.post('../ajax.php',{action:'get-add-doc',department_name:$department_namea },function(response){
               //   console.log(response);

               if(response.substring(0, 5) == "Error"){

                console.log("error");
                actual = "0";
              } 
              if (response.trim().length > 1) {

                response =$.parseJSON(response); 
                
                update_name_and_id_selet_2( "#doctor_namea", response.success) ;


                
                $("#doctor_namea").val($('#doctor_namea').attr('doc_id')).trigger("change");
                show_status ( '#department_namea',1, null);
              }
            });



}




$(document.body).on( 'change', '#doctor_namea', function() {
  console.log('dddddddddd');
  return_thi();
});

function return_thi () {

  $('.doc_details').css('display', 'none');
  $('.doc_details>img').attr('src', '');
  $('.doc_details>h1').text('');
  $('.oc_details>h2').text('');
  $('.doc_details>p').text('');

  
  $doctor_name = $('#doctor_namea').val();
  $.post('../ajax.php',{action:'get-one-doc',doctor_name:$doctor_name },function(response){

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      actual = "0";
    } 
    if (response.trim().length > 1) {

      response =$.parseJSON(response); 
      response =response.success[0];
      
      if(response){
        console.log(response.email);

        $('.doc_details>h1').text(response.fname+" "+response.lname);
        $('.doc_details>h2').text(response.email);
        $('.doc_details>p').text(response.mphone);

        $('.doc_details').css('display', 'block');


        set_image_('.doc_details>img', "/doctor/images_/"+response.image);

        show_status ( '#doctor_namea',1, null);

      }

    }
  });


}



doTidSd();



function doTidSd() {
  if($('#pmphone').val() == null)
    return;
  $("#pmphone").intlTelInput("setNumber", "+"+$('#pmphone').val()); 
  var emphone_extension = parseInt($("#pmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
  
  emphone_extension = emphone_extension+"";
  var emphone = $('#pmphone').val();
  if(emphone.charAt(0)=='+')
    emphone = emphone.substring(1);

  for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
    if(emphone_extension[ii]==emphone[ii])
      jj++;
    emphone = emphone.substring(jj);
    $("#pmphone").val(emphone);


    if($('#plphone').val().trim().length>0){
      $("#plphone").intlTelInput("setNumber", "+"+$('#plphone').val()); 
      var emphone_extension = parseInt($("#plphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
      
      emphone_extension = emphone_extension+"";
      var emphone = $('#plphone').val();
      if(emphone.charAt(0)=='+')
        emphone = emphone.substring(1);

      for( ii = 0, jj=0; ii <emphone_extension.length; ii++)
        if(emphone_extension[ii]==emphone[ii])
          jj++;
        emphone = emphone.substring(jj);
        $("#plphone").val(emphone);
      }

      

    }

    
    

    $("#pat_update_profile").validate({
      rules: {  
        pgmphone:{
          required: true,
          minlength: 10
        },  
        pgname:{
          required: true,
          minlength: 2
        }, 
        pfname:{
          required: true,
          minlength: 2
        },
        plname:{
          required: true 
        },
        pemail:{
          required: true,
          email: true
        }, 
        pmphone:{
          required: true,
          minlength: 10
        },
        pdob:{
          required: true,
          australianDate: true
        } ,
        ppassword:{
          required: true
        }
      }, 
      submitHandler: function(form, event){
       
       my_zxid = $('#my_zxid').attr('did');
       var pfname = $('#pfname').val();
       var plname = $('#plname').val();
       var pemail = $('#pemail').val();



       var idd = $('#main_my_zxid').attr('did');


       var doctor_name = $('#doctor_namea').val(); 
       

       var dmphone = $('#pmphone').val();
       var dlphone = $('#plphone').val();
       var dsex = $('#psex').val();
       var ddob = $('#pdob> input[type=text]').val();
       var daddress = $('#paddress').val();
       var pblood_group = $('#pblood_group').val();



       var upadanimage = $('#pimage_base').find('span.fileinput-new').text();



       var pgname = $('#pgname').val();
       var pgrelation = $('#pgrelation').val();
       var pgmphone = $('#pgmphone').val();
       var pglphone = $('#pglphone').val();
       var pgaddress = $('#pgaddress').val();
       var ppassword = $('#ppassword').val();


       if(pgrelation.length <1){
        Lobibox.notify('warning', {
          size: 'mini',
          showClass: 'zoomInLeft',
          hideClass: 'zoomOutRight',
          msg: ' missing values '  ,
          img: $("#loged_in_image").attr("src")
        });
        

        return;
      }


      var dmphone_extension = parseInt($("#pmphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);
      var dlphone_extension = parseInt($("#plphone").parent('div').find('div.selected-flag').attr("title").replace(/[^0-9\.]/g, ''), 10);


      


      if(dlphone)
        dlphone= dlphone_extension+dlphone+"";

      
      $submit = $('#login_form[type="submit"]');

      $.post('../ajax.php',{action:'pat_update_profile',
        my_zxid: my_zxid,
        pfname: pfname,
        plname: plname,
        pemail: pemail,

        id:idd,
        doctor_name: doctor_name, 
        dmphone: dmphone_extension+dmphone,
        dlphone: dlphone,
        dsex: dsex,
        ddob: ddob, 
        daddress: daddress,
        pblood_group: pblood_group,  
        upadanimage : upadanimage,

        pgname:pgname,
        pgrelation:pgrelation,
        pgmphone:pgmphone,
        pglphone:pglphone,
        pgaddress:pgaddress,
        ppassword:ppassword

      },function(response){
        //$('.div_02').html(data);

        console.log(response);
        if(response.substring(0, 5) == "Error"){

          console.log("error");
          return;
        }
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

    }
    


  });

//














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
  $.post('../ajax.php',{action:'pat_pass_new', 
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

         $('body').html('<script type="text/javascript">window.location = "profile.php";</script>');

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




























$('#new_doc').change( function() {

  $idd = $(this).val(); 
  avbwkjr345( $idd, 0);
});



function avbwkjr345( $idd, $number) {


 $.post('../ajax.php',{action:'get-one-doc', doctor_name:$idd},function(response){
   console.log(response); 
   if(response.substring(0, 5) == "Error"){

    console.log("error");
    actual = "0";
  } 
  if (response.trim().length > 1) {
   
    response =$.parseJSON(response); 
    console.log(response);
    response = response.success[0];
    
    
    $('#all_me_users').find('div.click_show').each(function() {
      if($(this).attr('did') ==response.id ) {
        $(this).closest('li').remove();
      }
    });


    $mo_ms ='    <li class="media">'+
    ' <div class="media-body">'+
    ' <div class="media">'+
    '<form name="photo" action="patient.php" method="post" enctype="multipart/form-data" class="hidden"  >'+
    '<input type="text" name="id" class="hidden" value="'+response.id+'" id="passvaluePo" />'+
    '<input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default clcik_fk hidden"   />'+
    '</form>'+
    '<a class="pull-left clcik_for_these" href="#"  > '+
    '<img class="media-object img-circle" style="max-height:40px;" src="" id="hello_doc'+response.id+'" />'+
    '</a>'+
    '<div  did="'+response.id+'"  class="media-body click_show"  id="hello_doc_ne'+response.id+'" >'+
    '<h5> '+response.fname+' '+response.lname+' </h5>'+
    '  <small class="text-muted"></small><div class="nobershere"><p> </p></div>'+
    ' </div>'+
    ' </div>'+
    '</div>'+
    '</li>';
    
    $('#all_me_users').prepend($mo_ms);
        //$message.length
        

        
        url = "/doctor/images_/"+response.image;
        console.log(url);
        set_image_('#hello_doc'+response.id, url) ;
        $('#hello_doc_ne'+response.id).click() ;



      }

      
    });
}


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
  

  $idd = $('#main_my_zxid').attr('did');
  $tid = $('#displsy_mshd').attr('did');

  if($tid == '0') {
    Lobibox.notify('warning', {
      size: 'mini',
      showClass: 'zoomInLeft',
      hideClass: 'zoomOutRight',
      msg: 'select a Doctor ' ,
      img: $("#loged_in_image").attr("src")
    });
    return;
  }

  $.post('../ajax.php',{action:'enter_message_repay' , 
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

$(document).on('click', '.click_show', function () {

 
  $thathus = $(this);
  $($thathus).css('cursor', 'wait');
  $image0p = null;
  $idd = $(this).attr('did');
  $thiza = $(this);
  $tid = $('#displsy_mshd').attr('did','' );

  $didd = $('#main_my_zxid').attr('did');

  $.post('../ajax.php',{action:'get_message_d',pid:$didd, id:$idd, status:0},function(response){
    console.log(response);
    $('#displsy_mshd').empty();
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

        for( oo = 0; oo<$message.length ; oo++ ) {
          $clo0uiu =""; 
          $image0p = $message[oo].dimage;
          $xolo = 'style="color: #d1d1d1;"  ';
          if($message[oo].readed == 1) {

            $xolo = 'style="color: #49BDFF;"  data-toggle="tooltip" title=" '+$message[oo].read_ata+'" ';

          }

          if($message[oo].patient_doctor == 1) {
           


            $mo_ms =' '+
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

          } else if($message[oo].patient_doctor == 0) {




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


          $('#displsy_mshd').append($mo_ms);

          $($thathus).css('cursor', 'pointer');
        //$message.length

      }

      $('.from_image').attr('src', $('#user_image').attr('src'));



      if($image0p ==  null ) {
        $head = $($thiza).parent('div').closest('.media'); 
        console.log($($head).find('a'));

        $src = $($head).find('img.img-circle').attr('src');
        console.log($src);
        $('.to_image').attr('src', $src);

      } else {

        url = "/doctor/images_/"+$image0p;
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

      $didd = $('#main_my_zxid').attr('did');

      //   console.log($didd,$tid , $last_time); 


      if($last_time ==  null) {
        setTimeout(sech_msg, 100) 

      } else 
      $.post('../ajax.php',{action:'get-new-one-doc', fid:$didd, tid:$tid, time:$last_time, status:0 },function(response){
    //     console.log(response); 
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
                    url = "/doctor/images_/"+ $message[oo].dimage;
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



( function sech_msg_update(){
 
  $('div.nobershere').css('background-color', 'white');

  $didd = $('#main_my_zxid').attr('did');

  $.post('../ajax.php',{action:'get-msg_not_read-is-doc', id:$didd },function(response){
                     //        console.log(response); 
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


        
        if($($sho0d).attr('did') ==  $message[oo].doctor_id ){ 
         
          $($sho0d).find('div.nobershere>p').text($message[oo].number);

          $($sho0d).find('div.nobershere').css('background-color', 'blue');

        }



      });


    }



  }



}

setTimeout(sech_msg_update, 100)


});


})()




/*===============================================================*/
/*===============================================================*/
/*===============================================================*/






$('#new_doc_one').change( function() {

  $idd = $(this).val(); 
  avbwkjr345a( $idd, 0);
});



function avbwkjr345a( $idd, $number) {


 $.post('../ajax.php',{action:'get-one-doc', doctor_name:$idd},function(response){
   console.log(response); 
   if(response.substring(0, 5) == "Error"){

    console.log("error");
    actual = "0";
  } 
  if (response.trim().length > 1) {
   
    response =$.parseJSON(response); 
    console.log(response);
    response = response.success[0];
    
    
    $('#all_me_users').find('a.clcik_for_show_logCall').each(function() {
      if($(this).attr('did') ==response.id ) {
        $(this).closest('li').remove();
      }
    });





$mo_ms ='  <li class="each_of_u">'+
             '<a href="#"   did="'+response.id+'"    class="clcik_for_show_logCall" >'+
  '<img src=""   id="hello_doc'+response.id+'"  >'+
 '<span class="name_lrft"> '+response.fname+' '+response.lname+' </span>   '  +
       '<span class="rrignt"> time</span>'+
              '</a>'+
            '</li>';
    
    $('#all_me_users').prepend($mo_ms);
        //$message.length
        

        
        url = "/doctor/images_/"+response.image;
        console.log(url);
        set_image_('#hello_doc'+response.id, url) ;
        $('#hello_doc_ne'+response.id).click() ;



      }

      
    });
}








$(document).on('click', '.clcik_for_show_logCall', function () {
        

        $('#he_re_is_thie_clik').css('display', 'none');

 
  $thathus = $(this);
  $($thathus).css('cursor', 'wait');
  $image0p = null;
  $idd = $(this).attr('did');
  $thiza = $(this);


 // $tid = $('#displsy_mshd').attr('did','' );

  $didd = $('#main_my_zxid').attr('did');


    $.post('../ajax.php',{action:'return-doctor-details', id:$idd },function(response){
    console.log(response);

    $('#displsy_mshd').empty();

    if(response.substring(0, 5) == "Error"){

      console.log("error");
      return;
      
    } else  
    if (response.trim().length > 1) {
     
      response =$.parseJSON(response); 
      console.log(response);
      response = response.success;

      if(response.success > 0) {




        $value = response.value[0] ;
        $('.name_acto').text( $value.fname+' '+ $value.lname);


        $('.name_nemx_depar').text($value.department);

        $('#action_vutton_here_click').html(' '+
         '<form name="photo" action="../video.php" method="post" enctype="multipart/form-data"   class="form-horizontal ">'+
                                           '<input type="text" name="id" class="hidden" value="'+$value.id+'" id="passvaluePo" />'+
                    '<input type="text" name="did" class="hidden" value="'+ $('#main_my_zxid').attr('did')+'" id="passvaluePo1" />'+
                    '<input type="text" name="user" class="hidden" value="p" id="passvaluePo2" />'+
                    '<input type="text" name="path" class="hidden" value="'+ window.location.href+'" id="passvaluePo3" />'+
                    '<input type="text" name="key" class="hidden" value="0" id="passvaluePo3" />'+
                  
           ' <button class="btn"><i class="fa fa-video-camera " aria-hidden="true"></i>   call</button> '+    
          '</form>'+

          '');
//


        console.log($value);
        url = "/doctor/images_/"+$value.image;
        console.log(url);
        set_image_('.here_the_new_main', url) ;

        $('#clcik_for1').click();
        $('#he_re_is_thie_clik').css('display', 'block');

        

    }

    
  }

});





$('#new_details_desc').empty();

  $.post('../ajax.php',{action:'get_call_log_d',pid:$didd, id:$idd, status:0},function(response){
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


          $image0p = $message[ii].dimage; 




          if($message[ii].patient_doctor == '0') {
            $ico_status = '<i class="fa fa-arrow-down color-green" aria-hidden="true"></i>';
            $statu = '1';
            $image_clo = 'to_image';
            $name = $message[ii].doctor;
          }


          if($message[ii].patient_doctor == '1') {
            $ico_status = '<i class="fa fa-arrow-up color-blue" aria-hidden="true"></i>';
            $statu = '2';
            console.log('dddd');
            $image_clo = 'from_image';

            $name = $message[ii].patient;


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
                          '  <span class="name_lrft">  '+$name+'</span>'+
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

        url = "/doctor/images_/"+$image0p;
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
    
  $didd = $('#main_my_zxid').attr('did');

         //   console.log($didd,$tid , $last_time); 
 


   $.post('../ajax.php',{action:'get-new-call-for-doc', id:$didd,  status:0 },function(response){
         console.log(response); 
      if(response.substring(0, 6) == "Error: "){

                  console.log("error");
                    
  setTimeout(sech_call, 100)
  return;
                  } 
                  if (response.trim().length > 1) {
           
                        
                    response =$.parseJSON(response); 
                 //    console.log(response);
                    response = response.success;
 

                    if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

 

                    $message = response.message ;
oo =0;

oo =$message.length;
 

if($message.length <1)
console.log(" tot ");
else 
 window.location = "video_.php";



 
 

 }



}

  setTimeout(sech_call, 100)
                 
      });
 
 


})()




/*===============================================================*/

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

/*===============================================================*/


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


/*=======================================================================================================================================*/










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


/*========================================================================================================*/


function set_image_($this, $url) {

  url= window.location.href;  
  url = url.substring(0, url.lastIndexOf('/'));
  url = url.substring(0, url.lastIndexOf('/'));
  $string_trturn = url+"/assets/images/default.png";
  $url = url+$url;
  console.log($url);

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

$(document).on("click", "#upadanimage", function(e) {
  e.preventDefault();
  $('#upladimageprofselectf').val('');
  $('#upladimageprofselectf').click();
  $('#modal.mmodel').attr("to_this", "pimage_base");
  
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
  $sest_utl_p_ = 'patient/images_/';
  
  

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








});











/*
*
*=========================================================
*=============================================
*====================================================
*/     

function show_minical(){
  if (scheduler.isCalendarVisible())
    scheduler.destroyCalendar();
  else
    scheduler.renderCalendar({
      position:"dhx_minical_icon",
      date:scheduler._date,
      navigation:true,
      handler:function(date,calendar){
        scheduler.setCurrentView(date);
        scheduler.destroyCalendar()
      }
    });
}

