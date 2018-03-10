<?php include( 'header.php');  ?>


<?php 



 if ($_POST) { 
    if(!empty($_POST['ida'])){
        $_SESSION['postid'] = $_POST['ida'];
    }
   header("Location: " . $_SERVER['REQUEST_URI']);
   exit();
}

 
$idd = 0; 
 
 



if( !empty($_SESSION['postid']) ){

$idd = $_SESSION["postid"];

  unset($_SESSION["postid"]);
//


$medicine_category_id = "";
$name ="";
$description ="";
$type ="";
$unit_price ="";
$status="";
$image ="";
$delete_status ="";
$date   ="";
$c_name ="";

$url = $_SERVER['REQUEST_URI']; //returns the current URL
        $parts = explode('/',$url);
        $dir = $_SERVER['SERVER_NAME'];
        for ($i = 0; $i < count($parts) -2; $i++) {
         $dir .= $parts[$i] . "/";
        } 
$dir = 'http://'.$dir;
$im_age=$dir."assets/images/default.png";
 
     $query = " SELECT m.*, c.name AS c_name FROM `medicines` m LEFT JOIN medicine_category c ON m.medicine_category_id = c.id  WHERE m.id=".$idd ;
     $result_view_class = $a->display($query);
     
          
           foreach($result_view_class as $value) {
$medicine_category_id = $value['medicine_category_id'];
$name =$value['name'];
$description =$value['description'];
$type =$value['type'];
$unit_price =$value['unit_price'];
$status=$value['status'];
$image =$value['image'];
$delete_status =$value['delete_status'];
$date   =$value['date'];
$c_name =$value['c_name'];


              
        }
if(strlen(trim($image, ' ')))
if (file_exists ("../medicine/images_/".$image)) {
    $im_age = $dir."medicine/images_/".$image;
  
}
            


?>

    <!-- add Medicine -->
    <div class="content-wrapper show_hide" style="min-height: 300px;" id="add_medicine_category" did="<?php echo$idd; ?>">

        <!--=================================================edit med====================================================- -->



        <section class="content-header" id="header_section_2">
            <h1>
           <?php echo $name; ?>
           
          </h1>
            <ol class="breadcrumb">
                   <li id="back_to_add_medicine"><a href="medicine.php"><i class="fa fa-user-md" aria-hidden="true"></i>Medicine</a></li>

                <li  class="active"> View Medicine</li>

            </ol>

        </section>

        <section class="content">

            <div class="row pading_5 soneme_dv1">

                <div class="col-md-offset-11 col-md-1 " style="text-align: right; padding: 5px;">

                    <button class="btn btn-default " id="edit_clcik_med" did="<?php echo $idd ; ?>">edit</button>
                </div>
            </div>

            <div class="row pading_5">
                <div class="pading_5 back_white">

                    <div class="row pading_5">

                        <form role="form" id="vView_medicine">

                            <div class="col-md-5 jzt_margin_bott">

                                <div class="form-horizontal new_edited_t">

                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label"> medicine category</label>
                                        <div class="col-sm-9">
                                            <label id="mcyyo" class="value_here"> <?php echo $c_name; ?></label>

                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">description</label>
                                        <div class="col-sm-9">
                                            <p id="mndesc" class="value_here"> <?php echo $description; ?></p>
                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">type</label>
                                        <div class="col-sm-9 for_span_wdth">
                                            <p id="mntypey" class="value_here"> <?php echo $type; ?> </p>
                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">status</label>
                                        <div class="col-sm-9 for_span_wdth">
                                            <p id="mnstatz" class="value_here"><?php
                                            echo $status;
                                            ?></p>
                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">Unit Price</label>
                                        <div class="col-sm-9">
                                            <label id="mnpricey" class="value_here"><?php echo $unit_price; ?></label>

                                        </div>
                                    </div>
                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">Delete</label>
                                        <div class="col-sm-9">
                                            <label id="mndeletxxf" class="value_here"><?php
                                            if($delete_status == 1)
                                                echo "deleted";
                                            else if($delete_status == 0)
                                                echo "active";
                                            ?> </label>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-offset-2 col-md-5">

                                <div class="form-horizontal new_edited_t">

                                    <div class="form-group has-feedback" id="smimage_base">
                                        <!-- has-success ,has-warning, has-error -->

                                        <div class="col-sm-9">

                                            <div class="photome">
                                                <img src="<?php  echo $im_age; ?>" id="display_my_viewf"></br>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--------------------------  ---------------------------- -->

                                <div class="form-group">

                                </div>
                                <div class="form-group">

                                </div>

                            </div>
                    </div>

                    </form>
                    <!-- /form -->

                </div>

                <div class=" pading_5 back_white">
                    <div class="row" style="padding: 20px;">
                        <h4>medicine history</h4>

                    </div>






                    <table class="table table-bordered table-striped sortable miyazaki my_table_x4" id="the_display_table_2">
                        <thead>
                            <tr>

                                <th data-defaultsign="AZ">patient</th>
                                <th data-defaultsign="AZ">doctor</th>
                                <th data-defaultsign="AZ">doctor email</th>
                                <th data-defaultsign="AZ">time</th>
                                <th data-defaultsign="_19">quantity /u</th>
                                <th data-defaultsign="DD-MM-YYYY">Date From</th>
                                <th data-defaultsign="DD-MM-YYYY">Date To</th>

                                <th data-defaultsign="DD-MM-YYYY H:M:S ">date</th>



                            </tr>
                        </thead>
                        <tbody>

                            <?php  
try {
  $query = "SELECT  CONCAT(pd.fname, ' ',pd.lname) AS patient , CONCAT(d.fname, ' ', d.lname)AS doctor, d.email AS demail, DATE_FORMAT(pp.date,'%d-%m-%Y %r')   AS date, pb.time AS time, pb.date_from, pb.date_to ,pb.amount
FROM `medicines` m LEFT JOIN prescribe pb ON pb.medicines_id = m.id LEFT JOIN prescription pp ON pb.prescription_id = pp.id LEFT JOIN patient p ON pp.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN doctor d ON pp.doctor_id = d.id
WHERE pp.id IS NOT NULL AND m.id = ".$idd." AND  pp.delete_status = 0 ORDER BY pp.date DESC";
                 if( $result = $a->display($query)) {

                    $sno =1 ;
                     foreach ( $result as $value) {
                     
                      echo ' <tr> 
                            <td><p>'.$value['patient'].'</p></td>
                            <td><p>'.$value['doctor'].'</p></td>
                            <td><p>'.$value['demail'].'</p></td>
                            <td><p>'.$value['time'].'</p></td>
                            <td  data-value="'.$value['amount'].'">'.$value['amount'].'</td>

                            <td><p>'.$value['date_from'].'</p></td>
                            <td><p>'.$value['date_to'].'</p></td>

                            <td><p>'.$value['date'].'</p></td>



                          </tr>';

                     }

                  }

} catch (Exception $e) {

}

     ?>

                        </tbody>
                    </table>

 
                </div>

            </div>
    </div>

    </section>

    </div>

  

   
    <form name="photo" action="../upladimage.php" method="post" enctype="multipart/form-data" id="upladimageprof">
        <input type="file" name="image" size="30" class="hidden" id="upladimageprofselectf" accept="image/x-png, image/gif, image/jpeg" />
        <input type="submit" name="upload" value="Upload" class="hidden" id="upladimagepfinalsub" />

    </form>

    <!-- Button trigger modal -->
    <button type="button" id="setImg" class="btn btn-primary hidden" data-target="#modal" data-toggle="modal">

    </button>

    <!-- Modal -->
    <div class="modal fade mmodel" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1" to_this="" style="z-index: 1055;">
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

    <button type="button" id="show_the-popupzP_99" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_7" style="display: none;"></button>

    <div class="modal fade" id="exampleModalLong_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="overflow: auto;">
        <div class="modal-dialog" role="document" style="width: 75%;">
            <div class="modal-content " style="border-top: 6px solid #F00; border-radius: 1px !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit  medicine category</h5>
                    <button type="button" id="ndizmiz_tizzzx" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form role="form" id="edit_view_medicine" style="padding: 0px 25px 0px 25px;">
                    <div class="modal-body">
                        <!--==================================================================================================- -->

                        <div class="row pading_5">

                            <div class="col-md-5 jzt_margin_bott">

                                <div class="form-horizontal new_edited_t">

                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label"> medicine category</label>
                                        <div class="col-sm-9 for_span_wdth">

                                            <select class="form-control js-example-basic-single " id="memedicine_category" name="memedicine_category">

                                            </select>

                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <!--glyphicon-ok-->
                                            <!--glyphicon-warning-sign -->
                                            <!--glyphicon-remove -->
                                            <span class="and_user_msg sr-only"></span>
                                            <!--help-inline -->

                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group">

                                    </div>
                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="mm_name" name="mm_name" placeholder="name" class="form-control" aria-describedby="inputSuccess5Status">
                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <span class="and_user_msg sr-only"></span>
                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="mmdescription" name="mmdescription" rows="3" placeholder="description"></textarea>
                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <!--glyphicon-ok--><span class="and_user_msg sr-only"></span>
                                            <!--help-inline -->
                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">type</label>
                                        <div class="col-sm-9 for_span_wdth">

                                            <select class="form-control js-example-basic-single" id="mm_type" name="mm_type">
                                                <optgroup label="Digestive tract (enteral) Solids">
                                                    <option value="1">Pill</option>
                                                    <option value="2">Tablet</option>
                                                    <option value="3">Capsule</option>
                                                    <option value="4">Pastille</option>
                                                    <option value="6">Time release technology</option>
                                                    <option value="7">Osmotic delivery system (OROS)</option>
                                                </optgroup>
                                                <optgroup label="Digestive tract (enteral) Liquids">
                                                    <option value="8">Decoction</option>
                                                    <option value="9">Elixir</option>
                                                    <option value="10">Electuary</option>
                                                    <option value="11">Emulsion</option>
                                                    <option value="12">Extended-release syrup</option>
                                                    <option value="123">Effervescent powder or tablet</option>
                                                    <option value="33">Herbal tea</option>
                                                    <option value="44">Hydrogel</option>
                                                    <option value="55">Molecular encapsulation  </option>
                                                            <option value="66">Powder</option>
                                                            <option value="77">Softgel</option>
                                                            <option value="88">Solution</option>
                                                            <option value="99">Suspension</option>
                                                            <option value="111">Syrup</option>
                                                            <option value="112">Syrup Concentrate for dilution and/or addition of carbonated water</option>
                                                            <option value="113">Tincture</option>
                                                </optgroup>
                                                <optgroup label=" Buccal (sublabial), sublingual Solids">
                                                    <option value="114">Orally</option>
                                                    <option value="222">disintegrating</option>
                                                    <option value="233">tablet (ODT)</option>
                                                    <option value="333">Film</option>
                                                    <option value="334">Lollipop</option>
                                                    <option value="444">Sublingual drops</option>
                                                    <option value="445">Lozenges</option>
                                                    <option value="555">Effervescent buccal tablet</option>
                                                    <option value="556">Chewing gum</option>
                                                </optgroup>
                                                <optgroup label="Buccal (sublabial), sublingual Liquids ">
                                                    <option value="777">Mouthwash</option>
                                                    <option value="557">Toothpaste</option>
                                                    <option value="665">Ointment</option>
                                                    <option value="664">Oral spray</option>
                                                </optgroup>
                                                <optgroup label="Respiratory tract Solids">
                                                    <option value="558">Smoking device</option>
                                                    <option value="668">Dry-powder inhaler (DPI)</option>
                                                </optgroup>
                                                <optgroup label="Respiratory tract Liquids">
                                                    <option value="887">Anaesthetic vaporizer</option>
                                                    <option value="773">Vaporizer</option>
                                                    <option value="456">Nebulizer</option>
                                                    <option value="543">Metered-dose inhaler (MDI)</option>
                                                </optgroup>
                                                <optgroup label="Respiratory tract Gas">
                                                    <option value="447">Oxygen mask and Nasal cannula</option>
                                                    <option value="551">Oxygen concentrator</option>
                                                    <option value="883">Anaesthetic machine</option>
                                                    <option value="339">Relative analgesia machine</option>
                                                </optgroup>
                                                <optgroup label="Ophthalmic, otologic, nasal">
                                                    <option value="q">Nasal spray</option>
                                                    <option value="w">Ear drops</option>
                                                    <option value="e">Eye drops</option>
                                                    <option value="t">Ointment</option>
                                                    <option value="1q">Hydrogel</option>
                                                    <option value="1w">Nanosphere suspension</option>
                                                    <option value="1e">Insufflation</option>
                                                    <option value="1r">Mucoadhesive microdisc (microsphere tablet)</option>
                                                </optgroup>
                                                <optgroup label="Urogenital">
                                                    <option value="1ww">Ointment</option>
                                                    <option value="wq">Pessary (vaginal suppository)</option>
                                                    <option value="2w">Vaginal ring</option>
                                                    <option value="2e">Vaginal douche</option>
                                                    <option value="3w">Intrauterine device (IUD)</option>
                                                    <option value="32q">Extra-amniotic infusion</option>
                                                    <option value="aqe">Intravesical infusion</option>
                                                </optgroup>
                                                <optgroup label="Rectal (enteral)">
                                                    <option value="98">Ointment</option>
                                                    <option value="86">Suppository</option>
                                                    <option value="95">Enema Solution</option>
                                                    <option value="94">Enema Hydrogel</option>
                                                    <option value="303">Murphy drip</option>
                                                    <option value="387">Nutrient enema</option>
                                                </optgroup>
                                                <optgroup label="Dermal">
                                                    <option value="44s">Ointment</option>
                                                    <option value="33w">Topical cream</option>
                                                    <option value="ddf3">Topical gel</option>
                                                    <option value="e34">Liniment</option>
                                                    <option value="34ed">Paste</option>
                                                    <option value="33sg">Film</option>
                                                    <option value="ccd">DMSO drug solution</option>
                                                    <option value="xxz">Electrophoretic dermal delivery system</option>
                                                    <option value="hfd">Hydrogel</option>
                                                    <option value="gfs">Liposomes</option>
                                                    <option value="aaz">Transfersome vesicles</option>
                                                    <option value="55dd">Cream</option>
                                                    <option value="44dd">Lotion</option>
                                                    <option value="66ff">Lip balm</option>
                                                    <option value="67gg">Medicated shampoo</option>
                                                    <option value="99gg">Dermal patch</option>
                                                    <option value="9r7">Transdermal patch</option>
                                                    <option value="4d2">Contact (rubbed into break in the skin)</option>
                                                    <option value="75ff">Transdermal spray</option>
                                                    <option value="44ds">Jet injector</option>
                                                </optgroup>
                                                <optgroup label="Skin">
                                                    <option value="12q">Intradermal</option>
                                                    <option value="12w">Subcutaneous</option>
                                                    <option value="12d">Transdermal implant</option>
                                                </optgroup>
                                                <optgroup label="Organs ">
                                                    <option value="13d">Intracavernous</option>
                                                    <option value="13d">Intravitreal</option>
                                                    <option value="12k">Intra-articular injection</option>
                                                    <option value="13n">Transscleral</option>
                                                </optgroup>
                                                <optgroup label="Central nervous system">
                                                    <option value="13v">Intracerebral</option>
                                                    <option value="11cv">Intrathecal</option>
                                                    <option value="14v">Epidural</option>
                                                </optgroup>
                                                <optgroup label="Circulatory, musculoskeletal">
                                                    <option value="56g">Intravenous</option>
                                                    <option value="78g">Intracardiac</option>
                                                    <option value="78d">Intramuscular</option>
                                                    <option value="66c">Intraosseous</option>
                                                    <option value="89d">Intraperitoneal</option>
                                                    <option value="68g">Nanocell injection</option>
                                                    <option value="908f">Patient-Controlled Analgesia pump</option>
                                                    <option value="41fr">PIC line </option>
                                                </optgroup>

                                            </select>

                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <!--glyphicon-ok-->
                                            <!--glyphicon-warning-sign -->
                                            <!--glyphicon-remove -->
                                            <span class="and_user_msg sr-only"></span>
                                            <!--help-inline -->

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-offset-2 col-md-5">

                                <div class="form-horizontal new_edited_t">

                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label  class="col-sm-3 control-label">Unit Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="mm_unit_price" name="mm_unit_price" aaplaceholder="experience" class="form-control">
                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <span class="and_user_msg sr-only"></span>

                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control new_height" id="mmnstatus" name="mmnstatus">
                                                <option value="1" >active</option deleted>
                                                <option value="0" >hide</option>
                                            </select>
                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <!--glyphicon-ok-->
                                            <!--glyphicon-warning-sign -->
                                            <!--glyphicon-remove -->
                                            <span class="and_user_msg sr-only"></span>
                                            <!--help-inline -->

                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->
                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group">

                                    </div>
                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group has-feedback" id="mimage_base">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">image</label>

                                        <div class="col-sm-9">

                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="mpadanimage" name="mpadanimage">
                                                <span class="btn btn-default btn-file"><span>select image</span>
                                                <input type="file" />
                                                </span>
                                                <span class="fileinput-filename"></span><span path="NULL" class="fileinput-new"><?php echo $image; ?></span>
                                            </div>

                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <!--glyphicon-ok-->
                                            <!--glyphicon-warning-sign -->
                                            <!--glyphicon-remove -->
                                            <span class="and_user_msg sr-only"></span>
                                            <!--help-inline -->

                                            <div class="photome">
                                                <img src="" id="mdisplay_my_image_in_prof">
                                                <br>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--------------------------  ---------------------------- -->

                             

                            </div>
                        </div>

                    </div>

                    <!--====================================================================================================================-->
                    <div class="modal-footer">
                        <button type="button" class="col-sm-offset-2 col-sm-3 btn btn-danger btn-block" status="" id="delete_thiiz_mdc" style="width: 24%; ">delete</button>
                        <button type="submit" class="col-sm-offset-1 col-sm-3 btn btn-default  " style="width: 24%; margin-left: 10px;">ADD</button>

                    </div>
                </form>
                <!-- /form -->

            </div>
        </div>
    </div>



<?php

} else {
     echo '<script type="text/javascript">location.href = "medicine.php";</script>';
}
?>







        <?php include_once('footer.php'); ?>