
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>


  <div class="container parent_cont">
	<div class="row ">
	      <div class="col-md-12 bg_color_green">
	      	 
	      		<h1 class="to_uppercase">
	      			noticeboard
	      		</h1>
	      		<p class="to_details_p">
	      		Add something  
	      		</p>
	      	 
	      </div>
	</div>

    <div class="row">
      <div class="col-md-6 jzt_margin_bott">

        <form class="form-horizontal new_edited_t" role="form" id="add_noticeboard">

 
                <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-4 control-label">subject</label>
                    <div class="col-sm-7">
                        <input type="text" id="asubject" name="asubject" placeholder="subject" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
 						<span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="3" id="asdescription"></textarea>
                    </div>
                </div>
                 
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-4 col-sm-7">
                        <button type="submit" class="btn btn-default btn-block">ADD</button>
                    </div>
                </div>
            </form> <!-- /form -->

      </div>
      <div class="col-md-offset-0 col-md-6" id="my_table_bbro">
	      <div class="row jzt_rearrange_lok" id="the_display_table_91">
	      	<div class="col-md-12 bg_color_green marg_in_ve">
	      		<h5 class="">notice board</h5>
	      	</div>
	      </div>

   <!-- ---------------------------------- n ------------------------------------------------ -->                   
                       <?php 
					   
					   $query = " SELECT * FROM notifications WHERE delete_status=0   ORDER BY `notifications`.`date` DESC 	";
						 $result_view_class = $a->display($query);
					   
									
									 foreach($result_view_class as $value) {
									 	$red_c ="";
										if($value['delete_status'] == 1)	 
											$red_c = "background-color:#f006;";
										echo  "
										      	<div class=\"row new_table_bootsrp padding_left_x \" val_id ='".$value['id']."'  style='".$red_c."'>
										      		<div class=\"col-md-4\">
										      			<p>".$value['subject']."</p>
										      		</div>
										      		<div class=\"col-md-7\">
										      			  <textarea class=\"form-control me_my_textarea\" rows=\"4\" cols=\"10\" disabled=\"disabled\">".$value['description']."</textarea>
										      		</div>

										      		<div class=\"col-md-1\">
										      			   <div   class=\" button_element_to_doa \"><i class=\"fa fa-trash \" aria-hidden=\"true\" style=\"color: red; cursor: pointer;\" ></i>
</div>
										      		</div>

										      	</div>"     ;       
                
											
									}
									
									
									?>

                 
                       
       <!-- --------------------------------- n ------------------------------------------------- -->                            
                       




      	</div>



      </div>

    </div>

  </div>





<?php include_once('footer.php'); ?>

