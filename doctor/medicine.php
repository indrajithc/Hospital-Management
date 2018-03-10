<?php include( 'header.php');  ?>

    <!-- add Medicine -->
    <div class="content-wrapper show_hide" style="min-height: 300px;" id="add_medicine_category">

        <section class="content-header">
            <h1>
           Medicine
            <small>Add a medicine category</small>
          </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-user-md" aria-hidden="true"></i>Medicine</a></li>
                <li class="active">Add Category</li>
            </ol>

        </section>

        <section class="content">

            <div class="row pading_5">
                <div class="col-md-12 back_white pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-4 ">

                            <form class="form-horizontal new_edited_t" role="form" id="add_medicine_c">

                                <div class="form-group has-feedback">

                                    <label for="firstName" class="col-sm-3 control-label to_uppercase">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="medicine_c_name" name="medicine_c_name" placeholder="Name" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                                        <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                        <span class="and_user_msg sr-only"></span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label to_uppercase">description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" id="medicine_c_description"></textarea> <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                        <span class="and_user_msg sr-only"></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-5 col-sm-9">
                                        <button type="submit" class="btn btn-default btn-block to_uppercase">ADD</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /form -->

                        </div>

                        <div class="col-md-offset-1 col-md-7">
                            <table class="table table-bordered table-striped sortable miyazaki my_table_x4" id="the_display_table_1">
                                <thead>
                                    <tr>

                                        <th data-defaultsign="AZ">Name</th>
                                        <th data-defaultsign="AZ">Description</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php  
try {
  $query = "SELECT * FROM `medicine_category` ORDER BY date DESC";
                 if( $result = $a->display($query)) {

                    $sno =1 ;
                     foreach ( $result as $value) {
                   

                      echo ' <tr> 
                            <td><p>'.$value['name'].'</p></td>
                            <td><p>'.$value['description'].'</p></td>
                            <td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_medicine">view<i class="fa fa-eye" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; "></i>
</button> </td>
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

            </div>

        </section>
    </div>

    <!-- add med -------------------------------------------------------------------------------- ------------------ -->

    <div class="content-wrapper show_hide" id="view_medicine_category" style="min-height: 300px; display: none;">

        <section class="content-header" id="header_section_1">
            <h1>
           Medicine
            <small>  medicine category</small> 
          </h1>
            <ol class="breadcrumb">
                <li id="back_to_add_medicine_category"><a href="#"><i class="fa fa-user-md" aria-hidden="true"></i>Medicine</a></li>
                <li class="active">Add Medicine</li>
            </ol>

        </section>

        <section class="content">

            <div class="row pading_5 soneme_dv1">
                <div class="col-md-offset-9 col-md-2 " style="text-align: right; padding: 5px;">
                    <button class="btn btn-default" status="1" id="button_statu"> only this category</button>

                </div>
                <div class=" col-md-1 " style="text-align: right; padding: 5px;">

                    <button class="btn btn-default " id="edit_clcik_med_cat" did="">edit</button>
                </div>
            </div>

            <div class="row pading_5">
                <div class="pading_5 back_white">

                    <div class="row pading_5">
                        <form role="form" id="add_medicine">

                            <div class="col-md-5 jzt_margin_bott">

                                <div class="form-horizontal new_edited_t">

                                    <!--------------------------  ---------------------------- -->
                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label"> medicine category</label>
                                        <div class="col-sm-9 for_span_wdth">

                                            <select class="form-control js-example-basic-single " id="emedicine_category" name="emedicine_category">

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
                                        <label for="firstName" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="m_name" name="m_name" placeholder="name" class="form-control" aria-describedby="inputSuccess5Status">
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
                                            <textarea class="form-control" id="mdescription" name="mdescription" rows="3" placeholder="description"></textarea>
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

                                            <select class="form-control js-example-basic-single" id="m_type" name="department_name">
                                                <optgroup label="Digestive tract (enteral) Solids">
                                                    <option value="">Pill</option>
                                                    <option value="">Tablet</option>
                                                    <option value="">Capsule</option>
                                                    <option value="">Pastille</option>
                                                    <option value="">Time release technology</option>
                                                    <option value="">Osmotic delivery system (OROS)</option>
                                                </optgroup>
                                                <optgroup label="Digestive tract (enteral) Liquids">
                                                    <option value="">Decoction</option>
                                                    <option value="">Elixir</option>
                                                    <option value="">Electuary</option>
                                                    <option value="">Emulsion</option>
                                                    <option value="">Extended-release syrup</option>
                                                    <option value="">Effervescent powder or tablet</option>
                                                    <option value="">Herbal tea</option>
                                                    <option value="">Hydrogel</option>
                                                    <option value="">Molecular encapsulation <option>
                                                            <option value="">Powder</option>
                                                            <option value="">Softgel</option>
                                                            <option value="">Solution</option>
                                                            <option value="">Suspension</option>
                                                            <option value="">Syrup</option>
                                                            <option value="">Syrup Concentrate for dilution and/or addition of carbonated water</option>
                                                            <option value="">Tincture</option>
                                                </optgroup>
                                                <optgroup label=" Buccal (sublabial), sublingual Solids">
                                                    <option value="">Orally</option>
                                                    <option value="">disintegrating</option>
                                                    <option value="">tablet (ODT)</option>
                                                    <option value="">Film</option>
                                                    <option value="">Lollipop</option>
                                                    <option value="">Sublingual drops</option>
                                                    <option value="">Lozenges</option>
                                                    <option value="">Effervescent buccal tablet</option>
                                                    <option value="">Chewing gum</option>
                                                </optgroup>
                                                <optgroup label="Buccal (sublabial), sublingual Liquids ">
                                                    <option value="">Mouthwash</option>
                                                    <option value="">Toothpaste</option>
                                                    <option value="">Ointment</option>
                                                    <option value="">Oral spray</option>
                                                </optgroup>
                                                <optgroup label="Respiratory tract Solids">
                                                    <option value="">Smoking device</option>
                                                    <option value="">Dry-powder inhaler (DPI)</option>
                                                </optgroup>
                                                <optgroup label="Respiratory tract Liquids">
                                                    <option value="">Anaesthetic vaporizer</option>
                                                    <option value="">Vaporizer</option>
                                                    <option value="">Nebulizer</option>
                                                    <option value="">Metered-dose inhaler (MDI)</option>
                                                </optgroup>
                                                <optgroup label="Respiratory tract Gas">
                                                    <option value="">Oxygen mask and Nasal cannula</option>
                                                    <option value="">Oxygen concentrator</option>
                                                    <option value="">Anaesthetic machine</option>
                                                    <option value="">Relative analgesia machine</option>
                                                </optgroup>
                                                <optgroup label="Ophthalmic, otologic, nasal">
                                                    <option value="">Nasal spray</option>
                                                    <option value="">Ear drops</option>
                                                    <option value="">Eye drops</option>
                                                    <option value="">Ointment</option>
                                                    <option value="">Hydrogel</option>
                                                    <option value="">Nanosphere suspension</option>
                                                    <option value="">Insufflation</option>
                                                    <option value="">Mucoadhesive microdisc (microsphere tablet)</option>
                                                </optgroup>
                                                <optgroup label="Urogenital">
                                                    <option value="">Ointment</option>
                                                    <option value="">Pessary (vaginal suppository)</option>
                                                    <option value="">Vaginal ring</option>
                                                    <option value="">Vaginal douche</option>
                                                    <option value="">Intrauterine device (IUD)</option>
                                                    <option value="">Extra-amniotic infusion</option>
                                                    <option value="">Intravesical infusion</option>
                                                </optgroup>
                                                <optgroup label="Rectal (enteral)">
                                                    <option value="">Ointment</option>
                                                    <option value="">Suppository</option>
                                                    <option value="">Enema Solution</option>
                                                    <option value="">Enema Hydrogel</option>
                                                    <option value="">Murphy drip</option>
                                                    <option value="">Nutrient enema</option>
                                                </optgroup>
                                                <optgroup label="Dermal">
                                                    <option value="">Ointment</option>
                                                    <option value="">Topical cream</option>
                                                    <option value="">Topical gel</option>
                                                    <option value="">Liniment</option>
                                                    <option value="">Paste</option>
                                                    <option value="">Film</option>
                                                    <option value="">DMSO drug solution</option>
                                                    <option value="">Electrophoretic dermal delivery system</option>
                                                    <option value="">Hydrogel</option>
                                                    <option value="">Liposomes</option>
                                                    <option value="">Transfersome vesicles</option>
                                                    <option value="">Cream</option>
                                                    <option value="">Lotion</option>
                                                    <option value="">Lip balm</option>
                                                    <option value="">Medicated shampoo</option>
                                                    <option value="">Dermal patch</option>
                                                    <option value="">Transdermal patch</option>
                                                    <option value="">Contact (rubbed into break in the skin)</option>
                                                    <option value="">Transdermal spray</option>
                                                    <option value="">Jet injector</option>
                                                </optgroup>
                                                <optgroup label="Skin">
                                                    <option value="">Intradermal</option>
                                                    <option value="">Subcutaneous</option>
                                                    <option value="">Transdermal implant</option>
                                                </optgroup>
                                                <optgroup label="Organs ">
                                                    <option value="">Intracavernous</option>
                                                    <option value="">Intravitreal</option>
                                                    <option value="">Intra-articular injection</option>
                                                    <option value="">Transscleral</option>
                                                </optgroup>
                                                <optgroup label="Central nervous system">
                                                    <option value="">Intracerebral</option>
                                                    <option value="">Intrathecal</option>
                                                    <option value="">Epidural</option>
                                                </optgroup>
                                                <optgroup label="Circulatory, musculoskeletal">
                                                    <option value="">Intravenous</option>
                                                    <option value="">Intracardiac</option>
                                                    <option value="">Intramuscular</option>
                                                    <option value="">Intraosseous</option>
                                                    <option value="">Intraperitoneal</option>
                                                    <option value="">Nanocell injection</option>
                                                    <option value="">Patient-Controlled Analgesia pump</option>
                                                    <option value="">PIC line </option>
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

                                    <!--------------------------  ---------------------------- -->

                                </div>

                            </div>

                            <div class="col-md-offset-2 col-md-5">

                                <div class="form-horizontal new_edited_t">

                                    <div class="form-group has-feedback">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">Unit Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="m_unit_price" name="m_unit_price" aaplaceholder="experience" class="form-control">
                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <span class="and_user_msg sr-only"></span>

                                        </div>
                                    </div>

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group">

                                    </div>
                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group has-feedback" id="mimage_base">
                                        <!-- has-success ,has-warning, has-error -->
                                        <label for="firstName" class="col-sm-3 control-label">image</label>

                                        <div class="col-sm-9">

                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="mpadanimage" name="upadanimage">
                                                <span class="btn btn-default btn-file"><span>Choose file</span>
                                                <input type="file" />
                                                </span>
                                                <span class="fileinput-filename"></span><span path="NULL" class="fileinput-new">No file chosen</span>
                                            </div>

                                            <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span>
                                            <!--glyphicon-ok-->
                                            <!--glyphicon-warning-sign -->
                                            <!--glyphicon-remove -->
                                            <span class="and_user_msg sr-only"></span>
                                            <!--help-inline -->

                                            <div class="photome">
                                                <img src="" id="display_my_image_in_prof">
                                                <br>
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
                                        <button type="submit" class="btn btn-default btn-block">ADD</button>
                                    </div>
                                </div>

                            </div>
                    </div>

                    </form>
                    <!-- /form -->

                </div>

                <div class=" pading_5 back_white">
                    <div class="row" style="padding: 10px;">
                        <h4>medicines</h4>

                    </div>

                    <table class="table table-bordered table-striped sortable miyazaki my_table_x4" id="the_display_table_2">
                        <thead>
                            <tr>

                                <th data-defaultsign="AZ">category</th>
                                <th data-defaultsign="AZ">name</th>
                                <th data-defaultsign="AZ">description</th>
                                <th data-defaultsign="AZ">type</th>
                                <th data-defaultsign="AZ">status</th>
                                <th data-defaultsign="_19">price</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  
try {
  $query = "SELECT m.id AS id , c.name AS category, m.name AS name , m.description , m.delete_status AS delete_status, m.image AS image, m.type AS type, m.unit_price AS price, m.status AS status FROM `medicines` m LEFT JOIN `medicine_category` c ON m.medicine_category_id = c.id  ORDER BY m.date DESC";
                 if( $result = $a->display($query)) {

                    $sno =1 ;
                     foreach ( $result as $value) {
                      $delete_status = " green";
                      if($value['delete_status'] == 1)
                        $delete_status = "red";

                      echo ' <tr> 
                            <td><p class="category_6">'.$value['category'].'</p></td>
                            <td><p>'.$value['name'].'</p></td>
                            <td><p>'.$value['description'].'</p></td>
                            <td><p>'.$value['type'].'</p></td>
                            <td><p>'.$value['status'].'</p></td>
                            <td  data-value="'.$value['price'].'">'.$value['price'].'</td>
                            <td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_medicine_edit">view<i class="fa fa-eye" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; color: '.$delete_status.';"></i>
</button> </td>
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






   
    <form name="photoz" action="medicine_.php" method="post" enctype="multipart/form-data" id="medicine_detailsa" class="hidden">
        <input type="text" name="ida" class="hidden" value="" id="passvaluePoa" />
        <input type="submit" name="uploads" value="Uploads" class="hidden" id="pass_value_herea" />

    </form>




   
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

    <button type="button" id="show_the-popupzP_9" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_6" style="display: none;"></button>

    <div class="modal fade" id="exampleModalLong_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="overflow: auto;">
        <div class="modal-dialog" role="document" style="">
            <div class="modal-content " style="border-top: 6px solid #F00; border-radius: 1px !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit  medicine category</h5>
                    <button type="button" id="ndizmiz_tizzzx" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form role="form" id="edit_medicine_c" style="padding: 0px 25px 0px 25px;">
                    <div class="modal-body">
                        <!--==================================================================================================- -->

                        <div class="row">

                            <div class="col-md-12 jzt_margin_bott" style="margin-bottom: 20px;">

                                <div class="form-horizontal new_edited_t">

                                    <!--------------------------  ---------------------------- -->

                                    <div class="form-group has-feedback">

                                        <label for="firstName" class="col-sm-3 control-label to_uppercase">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="emedicine_c_name" name="emedicine_c_name" placeholder="Name" class="form-control" autofocus aria-describedby="inputSuccess5Status">
                                            <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                            <span class="and_user_msg sr-only"></span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label to_uppercase">description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" id="emedicine_c_description"></textarea> <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                            <span class="and_user_msg sr-only"></span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--====================================================================================================================-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="col-sm-offset-3 col-sm-3 btn btn-default btn-block" style="width: 24%;">ADD</button>

                        </div>
                </form>
                <!-- /form -->

                </div>
            </div>
        </div>
    </div>
        <?php include_once('footer.php'); ?>