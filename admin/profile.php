
<?php include( 'header.php');  ?>


<?php //include_once('footer.php');
             

 ?>


  <div class="container parent_cont" id="add_admin_deta_5">

	<div class="row ">

    
	      <div class="col-md-12 bg_color_green">
	      	 
	      		<h1 class="to_uppercase">
	      			profile
	      		</h1>

	      	 
	      </div>
	</div>

    <div class="row">
    <form role="form" id="edit_admin">

      <div class="col-md-5 jzt_margin_bott">

      <div class="form-horizontal new_edited_t" >  

 

<!--------------------------  ---------------------------- -->

          <div class="form-group">
                    
                </div>
<!--------------------------  ---------------------------- -->
    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">First name</label>
                    <div class="col-sm-7">
                        <input type="text" id="afname"  name="afname"   placeholder="First name" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->


    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">Last name</label>
                    <div class="col-sm-7">
                        <input type="text" id="alname"  name="alname"  placeholder="Last Name" class="form-control"    aria-describedby="inputSuccess5Status">
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
                        <input type="text" id="aemail"  name="aemail"   placeholder="email id" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->



    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">mobile phone</label>
                    <div class="col-sm-7">
                   
                          <input id="amphone"  name="amphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->



    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">landline</label>
                    <div class="col-sm-7">
                         <input id="alphone"  name="alphone" type="tel"  placeholder="landline"  class="form-control  "  >  
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->

          <div class="form-group">
                    
                </div>
 
<!--------------------------  ---------------------------- -->


    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">sex</label>
                    <div class="col-sm-7">
                         <select class="form-control new_height" id="asex" name="asex">
                        <option value="M">MALE</option deleted>
                        <option value="F">FEMALE</option>
                      </select>
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->






                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">address</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="aaddress"  name="aaddress" rows="3"  placeholder="address"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
                    </div>
                </div>
<!--------------------------  ---------------------------- -->







                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="adescription"  name="adescription" rows="3"  placeholder="address"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
                    </div>
                </div>
                 
      
          
</div>



      </div>
      <div class="col-md-offset-2 col-md-5"  >

 <div class="form-horizontal new_edited_t" >  


<!--------------------------  ---------------------------- -->

 


    <div class="form-group has-feedback"  id="aimage_base"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">image</label>

                    <div class="col-sm-7">
               


<div class="fileinput fileinput-new" data-provides="fileinput" id="aadanimage" name="aadanimage">
    <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" /></span>
    <span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new">No file chosen</span>
</div>

                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

<div class="photome">                      
                                   <img src= "" id="aisplay_my_image_in_prof"></br>
                                </div>
                            </div>



                    </div>
         

<!--------------------------  ---------------------------- -->

<!--------------------------  ---------------------------- -->

          <div class="form-group">
                    
                </div>
<!--------------------------  ---------------------------- -->


          <div class="form-group">
                     
                </div>
          <div class="form-group">
                    
                </div>

          <div class="form-group">
 <!--------------------------  ---------------------------- -->

    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" style="background-color: red;" class="col-sm-5 control-label">confirm password</label>
                    <div class="col-sm-7">
                        <input type="password" id="apassword"   name="apassword"   placeholder="password" class="form-control"    aria-describedby="inputSuccess5Status" value="">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>


<!--------------------------  ---------------------------- -->


 


                    <div class=" col-sm-12" style="margin-top: 60px;">
                        <button type="submit" class="btn btn-default btn-block">ADD</button>
                    </div>
                </div>


        </div>
      </div>



         </form> <!-- /form -->

      

<!-- ==========================================================================================================-->
 
  


</div>




<!---===========================================================================================================-->


 






<div class="row">
<div class="col-md-offset-8 col-md-4">
<div class="edit_head_56">
  <h4> update password</h4>
</div>
  <div class="edit_body_56">
       <form class="form-horizontal new_edited_t" role="form" id="new_pass_admin">

 
                <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" style="font-size: 12px;" class="col-sm-5 control-label">password</label>
                    <div class="col-sm-7">
                        <input type="password" id="password1" name="password1" placeholder="new password" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>
                      <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" style="font-size: 12px;" class="col-sm-5 control-label">re password</label>
                    <div class="col-sm-7">
                        <input type="password" id="password2" name="password2" placeholder="new password" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>
             
    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" style="font-size: 12px;" class="col-sm-5 control-label">current password</label>
                    <div class="col-sm-7">
                        <input type="password" id="password0" name="password0" placeholder="current password" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>
                </div>
             


                 
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-5 col-sm-7">
                        <button type="submit" class="btn btn-default btn-block">update</button>
                    </div>
                </div>
            </form>  


  </div>

</div>
  

</div>


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
    <div class="modal fade amodel" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1" to_this="" style="z-index: 1055;">
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












<?php 
?> 


<?php  
  ?>


<?php include_once('footer.php'); ?>

