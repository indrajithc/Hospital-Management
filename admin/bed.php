
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>


  <div class="container parent_cont">
	<div class="row ">
	      <div class="col-md-12 bg_color_green">
	      	 
	      		<h1 class="to_uppercase">
	      			ADD Bed
	      		</h1>
	      		<p class="to_details_p">
	      		Add new Bed details.
	      		</p>
	      	 
	      </div>
	</div>

    <div class="row">
      <div class="col-md-5 jzt_margin_bott">

        <form class="form-horizontal new_edited_t" role="form" id="add_bed">

 
          <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">Type</label>
                    <div class="col-sm-7">
                        <input type="text" id="bed_name" name="baa1" placeholder="Full Name" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
 						<span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="3" id="bed_description"></textarea>
                    </div>
                </div>
                 
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-5 col-sm-7">
                        <button type="submit" class="btn btn-default btn-block">ADD</button>
                    </div>
                </div>
            </form> <!-- /form -->

      </div>
      <div class="col-md-offset-1 col-md-6" id="my_table_bbro">
	      <div class="row jzt_rearrange_lok" id="the_display_table_1">
	      	<div class="col-md-12 bg_color_green marg_in_ve">
	      		<h5 class="">saved Beds</h5>
	      	</div>
	      </div>

   <!-- ---------------------------------- n ------------------------------------------------ -->                   
                       <?php 
					   
					   $query = " SELECT * FROM bed   WHERE delete_status=0   ORDER BY `bed`.`date` DESC 	";
						 $result_view_class = $a->display($query);
					   
									
									 foreach($result_view_class as $value) {
									 	$red_c ="";
										if($value['delete_status'] == 1)	 
											$red_c = "background-color:#f006;";
										echo  "
										      	<div class=\"row new_table_bootsrp padding_left_x \" val_id ='".$value['id']."'  style='".$red_c."'>
										      		<div class=\"col-md-4\">
										      			<p>".$value['type']."</p>
										      		</div>
										      		<div class=\"col-md-7\">
										      			  <textarea class=\"form-control me_my_textarea\" rows=\"4\" cols=\"10\" disabled=\"disabled\">".$value['room_description']."</textarea>
										      		</div>

										      		<div class=\"col-md-1\">
										      			   <div   class=\" button_element_to_do_bed \"><i class=\"fa fa-pencil-square-o \" aria-hidden=\"true\" style=\"color: red; cursor: pointer;\" ></i>
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





<button type="button" id="show_the-popupzP" class="btn btn-primary hidden" data-toggle="modal" data-target="#exampleModalLong" style="display: none;"></button>



<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Bed</h5>
        <button type="button" id="dizmiz_tizzz" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form class="form-horizontal new_edited_t" role="form" id="edit_bed">
 
                <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">Type</label>
                    <div class="col-sm-7">
                        <input type="text" id="ebed_name_edit" name="eaa2" placeholder="Full Name" class="form-control class_ide_84969380" old="" autofocus aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
 						<span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control class_ide_84969381"  old=""  rows="3" id="ebed_description_edit"> </textarea>
                    </div>
                </div>
                 
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-5 col-sm-7">
                        <button type="submit" class="btn btn-default btn-block">ADD</button>
                    </div>
                </div>
            </form> <!-- /form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="bdelete_this_item_here">delete</button>
      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>

