
<?php include ('header.php');?>


<?php //include_once('footer.php');

?>


  <div class="container parent_cont" id="add_here_pharmacist_5">

	<div class="row ">


	      <div class="col-md-12 bg_color_green">

	      		<h1 class="to_uppercase">
	      			ADD Pharmacist
	      		</h1>
	      		<p class="to_details_p">
	      		Add a new pharmacist
	      		</p>

	      </div>
	</div>

    <div class="row">
    <form role="form" id="add_pharmacist">

      <div class="col-md-5 jzt_margin_bott">

      <div class="form-horizontal new_edited_t" >



<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>
<!--------------------------  ---------------------------- -->
    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">First name</label>
                    <div class="col-sm-7">
                        <input type="text" id="pfname"  name="pfname"   placeholder="First name" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->


    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">Last name</label>
                    <div class="col-sm-7">
                        <input type="text" id="plname"  name="plname"  placeholder="Last Name" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>

<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>

<!--------------------------  ---------------------------- -->


    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">email</label>
                    <div class="col-sm-7">
                        <input type="text" id="pemail"  name="pemail"   placeholder="email id" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->



    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">mobile phone</label>
                    <div class="col-sm-7">

                          <input id="pmphone"  name="pmphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >
                        <span class="glyphicon   right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->



    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">landline</label>
                    <div class="col-sm-7">
                         <input id="plphone"  name="plphone" type="tel"  placeholder="landline"  class="form-control  "  >
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>


<!--------------------------  ---------------------------- -->







                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">address</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="paddress"  name="paddress" rows="3"  placeholder="address"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
                    </div>
                </div>



</div>



      </div>
      <div class="col-md-offset-2 col-md-5"  >

 <div class="form-horizontal new_edited_t" >


<!--------------------------  ---------------------------- -->




    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">duty</label>
                    <div class="col-sm-7">
                         <select class="form-control new_height" id="pduty" name="pduty">
                        <option value="day">Day</option deleted>
                        <option value="Night">Night</option>
                      </select>
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->






<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>
<!--------------------------  ---------------------------- -->

    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">password</label>
                    <div class="col-sm-7">
                        <input type="password" id="ppassword"   name="ppassword"   placeholder="password" class="form-control"    aria-describedby="inputSuccess5Status" value="<?php
echo rand(1000000, 9999999);?>">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->




<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>
<!--------------------------  ---------------------------- -->

    <div class="form-group has-feedback"  id="pdimage_base"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">image</label>

                    <div class="col-sm-7">



<div class="fileinput fileinput-new" data-provides="fileinput" id="ppadanimage" name="ppadanimage">
    <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" /></span>
    <span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new">No file chosen</span>
</div>

                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

<div class="photome">
                                   <img src= "" id="pisplay_my_image_in_prof"></br>
                                </div>
                            </div>



                    </div>
                </div>


<!--------------------------  ---------------------------- -->






          <div class="form-group">

                </div>
          <div class="form-group">

                </div>

          <div class="form-group">
                    <div class=" col-sm-12" style="margin-top: 60px;">
                    
                                <button type="submit" class="btn btn-default   btn-block" id="load_doc_Add" data-loading-text="processing .... ">ADD</button>
  
                    </div>
                </div>


        </div>
      </div>



         </form> <!-- /form -->



<!-- ==========================================================================================================-->


<div class="row">

  <div class="col-md-12" id="id_my_pharmac_tab">
<?php
$url   = $_SERVER['REQUEST_URI'];//returns the current URL
$parts = explode('/', $url);
$dir   = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts)-2; $i++) {
	$dir .= $parts[$i]."/";
}
$dir  = "http://".$dir;
$dir2 = "../pharmacist/images_/";

try {
	$query = "SELECT * FROM pharmacist ORDER BY date DESC";
	if ($result = $a->display($query)) {

		$sno = 1;
		foreach ($result as $value) {
			$delete_status = " inherit";
			if ($value['delete_status'] == 1) {
				$delete_status = "red";
			}

			$image = $dir."assets/images/default.png";
			if (!is_null($value['image'])) {
				if (file_exists($dir2.$value['image'])) {
					$image = $dir.'pharmacist/images_/'.$value['image'];
				}
			}

			echo '

                          <div class="row form_label_main_me">
                            <div class=" col-md-3">
                              <img src="'.$image.'" style="height: 200px; width: 200px;">

                            </div>
                            <div class=" col-md-4">
                              <div class="form-horizontal new_edited_pha" >


                                <div class="form-group">
                                  <label  class="col-sm-5 control-label">Name</label>
                                    <span class="col-sm-7" style="color:'.$delete_status.';")>
                                    '.$value['fname'].' '.$value['lname'].'
                                    </span>
                                </div>


                                <div class="form-group">
                                  <label  class="col-sm-5 control-label">Email</label>
                                    <span class="col-sm-7">
                                    '.$value['email'].'
                                     </span>
                                </div>


                                <div class="form-group">
                                  <label  class="col-sm-5 control-label">mobile phone</label>
                                    <span class="col-sm-7">
                                    '.$value['mphone'].'
                                     </span>
                                </div>


                                <div class="form-group">
                                  <label  class="col-sm-5 control-label">landline</label>
                                    <span class="col-sm-7">
                                    '.$value['lphone'].'
                                     </span>
                                </div>

                              </div>
                            </div>
                            <div class=" col-md-4">
                                 <div class="form-horizontal new_edited_pha" >


                                <div class="form-group">
                                  <label  class="col-sm-5 control-label">duty</label>
                                    <span class="col-sm-7">
                                    '.$value['duty'].'
                                     </span>
                                </div>


                                <div class="form-group">
                                  <label  class="col-sm-5 control-label">address</label>
                                    <textarea class="col-sm-7 me_my_textarea_ext" >'.$value['address'].'</textarea>
                                </div>



                              </div>
                            </div>
                            <div class=" col-md-1">

                            <button id="'.$value['id'].'"   status="'.$value['delete_status'].'"    class ="btn btn-default button_edit_for_pharmc" > <i class="fa fa-pencil-square-o add_back_button_a" aria-hidden="true"></i>
 edit </button>
                            </div>

                          </div>

                      ';

		}

	}

} catch (Exception $e) {

}

?>
</div>




  </div>



</div>




<!---===========================================================================================================-->






    </div>

  </div>




<!--

<select class="js-example-basic-single">
  <option value="AL">Alabama</option>
    ...
  <option value="WY">Wyoming</option>
</select>
-->
































  <form name="photo" action="../upladimage.php" method="post" enctype="multipart/form-data" id="upladimageprof"  >
    <input type="file" name="image" size="30" class="hidden"  id="upladimageprofselectf" accept="image/x-png, image/gif, image/jpeg" /> <input type="submit" name="upload" value="Upload" class="hidden" id="upladimagepfinalsub"/>


  </form>


    <!-- Button trigger modal -->
    <button type="button" id="setImg" class="btn btn-primary hidden" data-target="#modal" data-toggle="modal">
      Launch the demo
    </button>

    <!-- Modal -->
    <div class="modal fade pmodel" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1" to_this="" style="z-index: 1055;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img id="image" src="../assets/images/loding.gif" alt="Picture">
            </div>
          </div>
          <div class="modal-footer">

                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />

                <input type="hidden" id="r" name="r" />
                <input type="hidden" id="sx" name="sx" />
                <input type="hidden" id="sy" name="sy" />
            <button type="button" id="crop_btn" class="btn btn-default" data-dismiss="modal">save</button>
          </div>
        </div>
      </div>
    </div>
  </div>












<button type="button" id="show_the-popupzP_6x" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_6" style="display: none;"></button>



<div class="modal fade" id="exampleModalLong_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  style="overflow: auto;">
  <div class="modal-dialog" role="document" style="width: 93%;">
    <div class="modal-content popup_border_green">
      <div class="modal-header">
        <button type="button" id="dizmiz_tizzzx" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form role="form" id="edit_pharmacist"  pha_id=""  style="padding: 0px 25px 0px 25px;">
      <div class="modal-body">
<!--========================================================================================================- -->


    <div class="row">

      <div class="col-md-5 jzt_margin_bott" style="margin-bottom: 20px;">

      <div class="form-horizontal new_edited_t" >



<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>
<!--------------------------  ---------------------------- -->
    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">First name</label>
                    <div class="col-sm-7">
                        <input type="text" id="epfname"  name="epfname"   placeholder="First name" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->


    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">Last name</label>
                    <div class="col-sm-7">
                        <input type="text" id="eplname"  name="eplname"  placeholder="Last Name" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>

<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>

<!--------------------------  ---------------------------- -->


    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">email</label>
                    <div class="col-sm-7">
                        <input type="text" id="epemail"  name="epemail"   placeholder="email id" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->



    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">mobile phone</label>
                    <div class="col-sm-7">

                          <input id="epmphone"  name="epmphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >
                        <span class="glyphicon   right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->



    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">landline</label>
                    <div class="col-sm-7">
                         <input id="eplphone"  name="eplphone" type="tel"  placeholder="landline"  class="form-control  "  >
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>


<!--------------------------  ---------------------------- -->







                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">address</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="epaddress"  name="epaddress" rows="3"  placeholder="address"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
                    </div>
                </div>



</div>



      </div>
      <div class="col-md-offset-2 col-md-5"  >

 <div class="form-horizontal new_edited_t" >


<!--------------------------  ---------------------------- -->




    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">duty</label>
                    <div class="col-sm-7">
                         <select class="form-control new_height" id="epduty" name="epduty">
                        <option value="day">Day</option deleted>
                        <option value="night">Night</option>
                      </select>
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->






<!--------------------------  ---------------------------- -->

          <div class="form-group">

                </div>
<!--------------------------  ---------------------------- -->





    <div class="form-group has-feedback"  id="epimage_base"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">image</label>

                    <div class="col-sm-7">



<div class="fileinput fileinput-new" data-provides="fileinput" id="eppadanimage" name="eppadanimage">
    <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" /></span>
    <span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new">No file chosen</span>
</div>

                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

<div class="photome">
                                   <img src= "" id="episplay_my_image_in_prof"></br>
                                </div>
                            </div>



                    </div>
                </div>


<!--------------------------  ---------------------------- -->






          <div class="form-group">

                </div>
          <div class="form-group">

                </div>

          <div class="form-group">
                    <div class=" col-sm-12" style="margin-top: 60px;">

                    </div>
                </div>


        </div>
      </div>














<!--====================================================================================================================-->
      </div>
      <div class="modal-footer">
         <button type="submit" class="col-sm-offset-6 col-sm-3 btn btn-default btn-block" style="width: 24%;" >ADD</button>
         <button type="button" class="col-md-3 btn btn-danger" status="" data-dismiss="modal" id="eedelete_this_item_here">delete</button>
      </div>
    </form> <!-- /form -->



    </div>
  </div>
</div>
















<?php
?>


<?php
?>


<?php include_once ('footer.php');?>

