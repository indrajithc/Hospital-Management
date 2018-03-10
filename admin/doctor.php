
<?php include ('header.php');?>


<?php //include_once('footer.php');

$query = " SELECT * FROM department   WHERE delete_status=0   ORDER BY `department`.`date` DESC  ";

if ($a->display($query)) {

	?>
	<div class="container parent_cont" id="add_here_thiz_5">

		<div class="row ">


			<div class="col-md-12 bg_color_green">

				<h1 class="to_uppercase">
					ADD Doctor
				</h1>
				<p class="to_details_p">
					Add a new doctor
				</p>

			</div>
		</div>

		<div class="row">
			<form role="form" id="add_doctor">

				<div class="col-md-5 jzt_margin_bott">

					<div class="form-horizontal new_edited_t" >

						<!--------------------------  ---------------------------- -->
						<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
							<label for="firstName" class="col-sm-5 control-label">department</label>
							<div class="col-sm-7">


								<select class="form-control js-example-basic-single"  id="department_name"  name="department_name"        >


									<?php

									$query             = " SELECT * FROM department   WHERE delete_status=0   ORDER BY `department`.`date` DESC  ";
									$result_view_class = $a->display($query);

									foreach ($result_view_class as $value) {

										echo ' <option value="'.$value['id'].'">'.$value['name'].'</option>';

									}

									?>

								</select>








								<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
								<span class="and_user_msg sr-only"></span> <!--help-inline -->

							</div>
						</div>



						<!--------------------------  ---------------------------- -->

						<div class="form-group">

						</div>
						<!--------------------------  ---------------------------- -->
						<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
							<label for="firstName" class="col-sm-5 control-label">First name</label>
							<div class="col-sm-7">
								<input type="text" id="dfname"  name="dfname"   placeholder="First name" class="form-control"    aria-describedby="inputSuccess5Status">
								<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
								<span class="and_user_msg sr-only"></span> <!--help-inline -->

							</div>
						</div>


						<!--------------------------  ---------------------------- -->


						<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
							<label for="firstName" class="col-sm-5 control-label">Last name</label>
							<div class="col-sm-7">
								<input type="text" id="dlname"  name="dlname"  placeholder="Last Name" class="form-control"    aria-describedby="inputSuccess5Status">
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
								<input type="text" id="demail"  name="demail"   placeholder="email id" class="form-control"    aria-describedby="inputSuccess5Status">
								<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
								<span class="and_user_msg sr-only"></span> <!--help-inline -->

							</div>
						</div>


						<!--------------------------  ---------------------------- -->



						<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
							<label for="firstName" class="col-sm-5 control-label">mobile phone</label>
							<div class="col-sm-7">

								<input id="dmphone"  name="dmphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >
								<span class="glyphicon   right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
								<span class="and_user_msg sr-only"></span> <!--help-inline -->

							</div>
						</div>


						<!--------------------------  ---------------------------- -->



						<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
							<label for="firstName" class="col-sm-5 control-label">landline</label>
							<div class="col-sm-7">
								<input id="dlphone"  name="dlphone" type="tel"  placeholder="landline"  class="form-control  "  >
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
								<select class="form-control new_height" id="dsex" name="dsex">
									<option value="M">MALE</option deleted>
										<option value="F">FEMALE</option>
									</select>
									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
									<span class="and_user_msg sr-only"></span> <!--help-inline -->

								</div>
							</div>


							<!--------------------------  ---------------------------- -->



							<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
								<label for="firstName" class="col-sm-5 control-label">date of birth</label>
								<div class="col-sm-7">

									<div class="input-group date" data-provide="datepicker" id="ddob" data-date-format="dd-mm-yyyy">
										<input type="text" class="form-control    right--20"  name="ddob"  placeholder="date of birth" style="margin-left: -20px;"  data-date-format="dd-mm-yyyy">

										<div class="input-group-addon">
											<i style="font-size: 16px; height: 18px; position: inherit;" class="fa fa-calendar" aria-hidden="true"></i>

										</div>
									</div>

									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
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
									<textarea class="form-control" id="daddress"  name="daddress" rows="3" id="daddress" placeholder="address"></textarea>
									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
								</div>
							</div>



						</div>



					</div>
					<div class="col-md-offset-2 col-md-5"  >

						<div class="form-horizontal new_edited_t" >


							<!--------------------------  ---------------------------- -->



							<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
								<label for="firstName" class="col-sm-5 control-label">qualification</label>
								<div class="col-sm-7">


									<select class="form-control js-example-basic-single js-example-tokenizer"  id="dqualification" name="dqualification"         >
										<option value="" selected="selected">M.B.B.S (Bachelor of Medicine/Bachelor of Surgery)</option>
										<option value="">B.Pharma (Bachelor of Pharmacy)</option>
										<option value="2">B.Sc Nursing</option>
										<option value="3">B.P.T (Physiotherapy)</option>
										<option value="4">B.O.T (Occupational Therapy)</option>
										<option value="5">B.H.M.S(Homeopathy Medicine)</option>
										<option value="6">B.U.M.S(Unani Medicine)</option>
										<option value="7">Optometry</option>
										<option value="8">Ophthalmic Assistant Medical course</option>
										<option value="9">Histopathalogical Lab Technology</option>
										<option value="10"> B.A.M.S(Ayurvedic, Siddha Medicine)</option>
										<option value="11">D. Pharma(Ayurvedic, Siddha Medicine)</option>
										<option value="12">Lab Technicians</option>
										<option value="13">Sanitary Inspector Medical course</option>
										<option value="14">General Nursing Training Medical course</option>
										<option value="16">Orthopedist Medical course</option>
										<option value="17">Dental Mechanic Medical course</option>
										<option value="18"> Dental Hygienist Medical course</option>
										<option value="19">Bachelor of Occupationaltherapy</option>
										<option value="20">Radiological Assistant</option>
										<option value="21">Radiography [Diagnosis &amp; Therapy]</option>
										<option value="22"> Nuclear Medicine Technology</option>

									</select>

									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
									<span class="and_user_msg sr-only"></span> <!--help-inline -->

								</div>
							</div>


							<!--------------------------  ---------------------------- -->




							<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
								<label for="firstName" class="col-sm-5 control-label">previous experience</label>
								<div class="col-sm-7">
									<input type="text" id="dprev_experiencez"   name="dprev_experiencez"   aaplaceholder="experience" class="form-control"    >
									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
									<span class="and_user_msg sr-only"></span> <!--help-inline -->

								</div>
							</div>


							<!--------------------------  ---------------------------- -->




							<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
								<label for="firstName" class="col-sm-5 control-label">join date</label>
								<div class="col-sm-7">

									<div class="input-group date" data-provide="datepicker" id="djoin_date" data-date-format="dd-mm-yyyy">
										<input type="text" class="form-control    right--20"  name="djoin_date"   placeholder="date of birth" style="margin-left: -20px;"  data-date-format="dd-mm-yyyy">

										<div class="input-group-addon">
											<i style="font-size: 16px; height: 18px; position: inherit;" class="fa fa-calendar" aria-hidden="true"></i>

										</div>
									</div>

									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
									<span class="and_user_msg sr-only"></span> <!--help-inline -->


								</div>
							</div>


							<!--------------------------  ---------------------------- -->

							<div class="form-group">

							</div>
							<!--------------------------  ---------------------------- -->

							<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
								<label for="firstName" class="col-sm-5 control-label">password</label>
								<div class="col-sm-7">
									<input type="password" id="dpassword"   name="dpassword"   placeholder="Full Name" class="form-control"    aria-describedby="inputSuccess5Status" value="<?php
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

							<div class="form-group has-feedback"  id="dimage_base"> <!-- has-success ,has-warning, has-error -->
								<label for="firstName" class="col-sm-5 control-label">image</label>

								<div class="col-sm-7">



									<div class="fileinput fileinput-new" data-provides="fileinput" id="upadanimage" name="upadanimage">
										<span class="btn btn-default btn-file"><span>Choose file</span><input type="file" /></span>
										<span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new">No file chosen</span>
									</div>

									<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
									<span class="and_user_msg sr-only"></span> <!--help-inline -->

									<div class="photome">
										<img src= "" id="display_my_image_in_prof"><br>
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

				<div class="col-md-12">

					<div class="  head_notif2">

						<table class="table table-bordered table-striped sortable miyazaki my_table_x4">
							<thead>
								<tr>
									<th data-defaultsign="AZ">Name</th>
									<th data-defaultsign="AZ">Department</th>
									<th data-defaultsign="AZ">Email</th>
									<th data-defaultsign="_19">phone</th>
									<th data-defaultsign="_19">Age</th>
									<th  >Action</th>
								</tr>
							</thead>
							<tbody>


								<?php
								try {
									$query = "SELECT d.id AS id, CONCAT(d.fname,' ',d.lname) AS name, dp.name AS department, d.email AS email, d.mphone AS phone, YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5)) AS age, d.delete_status FROM `doctor` d LEFT JOIN department dp ON d.department_id = dp.id ORDER BY d.date DESC";
									if ($result = $a->display($query)) {

										$sno = 1;
										foreach ($result as $value) {
											$delete_status = " green";
											if ($value['delete_status'] == 1) {
												$delete_status = "red";
											}

											echo ' <tr>
											<td>'.$value['name'].'</td>
											<td><p>'.$value['department'].'</p></td>
											<td><p>'.$value['email'].'</p></td>
											<td data-value="'.$value['phone'].'">'.$value['phone'].'</td>
											<td data-value="'.$value['age'].'">'.$value['age'].'</td>
											<td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_4">view<i class="fa fa-eye" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px;color: '.$delete_status.';"></i>
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
				<input type="file" name="image" size="30" class="hidden"  id="upladimageprofselectf" accept="image/x-png, image/gif, image/jpeg" />

				<input type="submit" name="upload" value="Upload" class="hidden" id="upladimagepfinalsub"/>


			</form>


			<!-- Button trigger modal -->
			<button type="button" id="setImg" class="btn btn-primary hidden" data-target="#modal" data-toggle="modal">
				Launch
			</button>

			<!-- Modal -->
			<div class="modal fade dmodel" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1" to_this="" style="z-index: 1055;">
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






		<div class="container parent_cont" id="dispaly_a_user_5" style="display: none;">

			<div class="row ">


				<div class="col-md-12 bg_color_green">



					<div class="col-md-8">

						<h1 class="to_uppercase">
							View Doctor
						</h1>
						<p class="to_details_p">
							View a doctor details
						</p>
					</div>
					<div class="col-md-2 add_back_button" ">
						<button class="btn  btn-default "  doc_id=""  id="edit_me_from_top"><i class="fa fa-pencil-square-o add_back_button_a" aria-hidden="true" ></i>
						Edit Doctor</button>
					</div>
					<div class="col-md-2 add_back_button" ">
						<button class="btn  btn-default " id="back_me_from_top"><i class="fa fa-user-plus add_back_button_a" aria-hidden="true" ></i>
						Add Doctor</button>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">

					<div class="row">
						<div class="col-md-12 col-md-sub_my_4">

							<div class=" mu_row_status_samll_5">
								<h2> personal information</h2>
							</div>
							<div class="form-horizontal">
								<div class="form-group  image_form" style="text-align: center;">
									<img src= "" id="show_image_5" style="width: 200px !important;height: 200px !important;">
								</div>

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">First Name</label>
									<span  id="vdfname" class="col-sm-7 ">name</span>
								</div>

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">Last Name</label>
									<span  id="vdlname" class="col-sm-7 ">name</span>
								</div>


								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">Date of Birth</label>
									<span  id="vddob" class="col-sm-7 ">date of birth</span>
								</div>



								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">Sex</label>
									<span  id="vdsex" class="col-sm-7 " valz="">sex</span>
								</div>








							</div>

						</div>



					</div>



				</div>


				<div class="col-md-4">

					<div class="row">
						<div class="col-md-12 col-md-sub_my_4">

							<div class=" mu_row_status_samll_5">
								<h2> contact information</h2>
							</div>
							<div class="form-horizontal">

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">Email</label>
									<span  id="vdemail" class="col-sm-7 ">email</span>
								</div>

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">Mobile Phone</label>
									<span  id="vdmphone" class="col-sm-7 ">mobile phone</span>
								</div>


								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">landline</label>
									<span  id="vdlphone" class="col-sm-7 ">landline</span>
								</div>



								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">Address</label>
									<p  id="vdaddress" class="col-sm-7 ">address</p>
								</div>





							</div>

						</div>



					</div>



				</div>


				<div class="col-md-4">

					<div class="row">
						<div class="col-md-12 col-md-sub_my_4">

							<div class=" mu_row_status_samll_5">
								<h2> general information</h2>
							</div>
							<div class="form-horizontal">

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">department</label>
									<span  id="vddepartment" class="col-sm-7 ">department</span>
								</div>

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">qualification</label>
									<p  id="vdqualification" class="col-sm-7 ">qualification</p>
								</div>


								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">join date</label>
									<span  id="vdljoindate" class="col-sm-7 ">join date</span>
								</div>



								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">previous experience</label>
									<p  id="vdprev_experience" class="col-sm-7 ">previous experience</p>
								</div>





							</div>

						</div>



					</div>


					<div class="row">
						<div class="col-md-12 col-md-sub_my_4">

							<div class=" mu_row_status_samll_5">
								<h2> status information</h2>
							</div>
							<div class="form-horizontal">

								<div class="form-group  ">
									<label  class="col-sm-5 control-label label_me_5">status</label>
									<span  id="vdstatus" class="col-sm-7 " status="">Active</span>
								</div>







							</div>

						</div>



					</div>


				</div>





			</div>


		</div>








		<button type="button" id="show_the-popupzP_6" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_6" style="display: none;"></button>



		<div class="modal fade" id="exampleModalLong_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  style="overflow: auto;">
			<div class="modal-dialog" role="document" style="width: 93%;">
				<div class="modal-content popup_border_green">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Doctor</h5>
						<button type="button" id="dizmiz_tizzzx" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form role="form" id="edit_doctor" style="padding: 0px 25px 0px 25px;">
						<div class="modal-body">
							<!--========================================================================================================- -->


							<div class="row">

								<div class="col-md-5 jzt_margin_bott" style="margin-bottom: 20px;">

									<div class="form-horizontal new_edited_t" >

										<!--------------------------  ---------------------------- -->
										<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
											<label for="firstName" class="col-sm-5 control-label">department</label>
											<div class="col-sm-7 for_span_wdth">


												<select class="form-control js-example-basic-single"  id="eepartment_name"  name="department_name"        >


													<?php

													$query             = " SELECT * FROM department   WHERE delete_status=0   ORDER BY `department`.`date` DESC  ";
													$result_view_class = $a->display($query);

													foreach ($result_view_class as $value) {

														echo ' <option value="'.$value['id'].'">'.$value['name'].'</option>';

													}

													?>
												</select>








												<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
												<span class="and_user_msg sr-only"></span> <!--help-inline -->

											</div>
										</div>



										<!--------------------------  ---------------------------- -->

										<div class="form-group">

										</div>
										<!--------------------------  ---------------------------- -->
										<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
											<label for="firstName" class="col-sm-5 control-label">First name</label>
											<div class="col-sm-7">
												<input type="text" id="efname"  name="efname"   placeholder="First name" class="form-control"    aria-describedby="inputSuccess5Status">
												<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
												<span class="and_user_msg sr-only"></span> <!--help-inline -->

											</div>
										</div>


										<!--------------------------  ---------------------------- -->


										<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
											<label for="firstName" class="col-sm-5 control-label">Last name</label>
											<div class="col-sm-7">
												<input type="text" id="elname"  name="elname"  placeholder="Last Name" class="form-control"    aria-describedby="inputSuccess5Status">
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
												<input type="text" id="eemail"  name="eemail"   placeholder="email id" class="form-control"    aria-describedby="inputSuccess5Status">
												<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
												<span class="and_user_msg sr-only"></span> <!--help-inline -->

											</div>
										</div>


										<!--------------------------  ---------------------------- -->



										<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
											<label for="firstName" class="col-sm-5 control-label">mobile phone</label>
											<div class="col-sm-7">

												<input id="emphone"  name="emphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >
												<span class="glyphicon   right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
												<span class="and_user_msg sr-only"></span> <!--help-inline -->

											</div>
										</div>


										<!--------------------------  ---------------------------- -->



										<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
											<label for="firstName" class="col-sm-5 control-label">landline</label>
											<div class="col-sm-7">
												<input id="elphone"  name="elphone" type="tel"  placeholder="landline"  class="form-control  "  >
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
												<select class="form-control new_height" id="esex" name="dsex">
													<option value="M">MALE</option deleted>
														<option value="F">FEMALE</option>
													</select>
													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
													<span class="and_user_msg sr-only"></span> <!--help-inline -->

												</div>
											</div>


											<!--------------------------  ---------------------------- -->



											<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
												<label for="firstName" class="col-sm-5 control-label">date of birth</label>
												<div class="col-sm-7">

													<div class="input-group date" data-provide="datepicker" id="edob" data-date-format="dd-mm-yyyy">
														<input type="text" class="form-control    right--20"  name="edob"  placeholder="date of birth" style="margin-left: -20px;"  data-date-format="dd-mm-yyyy">

														<div class="input-group-addon">
															<i style="font-size: 16px; height: 18px; position: inherit;" class="fa fa-calendar" aria-hidden="true"></i>

														</div>
													</div>

													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
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
													<textarea class="form-control" id="eaddress"  name="eaddress" rows="3" id="daddress" placeholder="address"></textarea>
													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
												</div>
											</div>



										</div>



									</div>
									<div class="col-md-offset-2 col-md-5"  >

										<div class="form-horizontal new_edited_t" >


											<!--------------------------  ---------------------------- -->



											<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
												<label for="firstName" class="col-sm-5 control-label">qualification</label>
												<div class="col-sm-7 for_span_wdth">


													<select class="form-control js-example-basic-single js-example-tokenizer"  id="equalification" name="equalification"         >
														<option value="" selected="selected">M.B.B.S (Bachelor of Medicine/Bachelor of Surgery)</option>
														<option value="">B.Pharma (Bachelor of Pharmacy)</option>
														<option value="2">B.Sc Nursing</option>
														< value="3">B.P.T (Physiotherapy)</option>
														<option value="4">B.O.T (Occupational Therapy)</option>
														<option value="5">B.H.M.S(Homeopathy Medicine)</option>
														<option value="6">B.U.M.S(Unani Medicine)</option>
														<option value="7">Optometry</option>
														<option value="8">Ophthalmic Assistant Medical course</option>
														<option value="9">Histopathalogical Lab Technology</option>
														<option value="10"> B.A.M.S(Ayurvedic, Siddha Medicine)</option>
														<option value="11">D. Pharma(Ayurvedic, Siddha Medicine)</option>
														<option value="12">Lab Technicians</option>
														<option value="13">Sanitary Inspector Medical course</option>
														<option value="14">General Nursing Training Medical course</option>
														<option value="16">Orthopedist Medical course</option>
														<option value="17">Dental Mechanic Medical course</option>
														<option value="18"> Dental Hygienist Medical course</option>
														<option value="19">Bachelor of Occupationaltherapy</option>
														<option value="20">Radiological Assistant</option>
														<option value="21">Radiography [Diagnosis &amp; Therapy]</option>
														<option value="22"> Nuclear Medicine Technology</option>

													</select>

													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
													<span class="and_user_msg sr-only"></span> <!--help-inline -->

												</div>
											</div>


											<!--------------------------  ---------------------------- -->




											<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
												<label for="firstName" class="col-sm-5 control-label">previous experience</label>
												<div class="col-sm-7">
													<input type="text" id="eprev_experiencez"   name="eprev_experiencez"   aaplaceholder="experience" class="form-control"    >
													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
													<span class="and_user_msg sr-only"></span> <!--help-inline -->

												</div>
											</div>


											<!--------------------------  ---------------------------- -->




											<div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
												<label for="firstName" class="col-sm-5 control-label">join date</label>
												<div class="col-sm-7">

													<div class="input-group date" data-provide="datepicker" id="ejoin_date" data-date-format="dd-mm-yyyy">
														<input type="text" class="form-control    right--20"  name="ejoin_date"   placeholder="date of birth" style="margin-left: -20px;"  data-date-format="dd-mm-yyyy">

														<div class="input-group-addon">
															<i style="font-size: 16px; height: 18px; position: inherit;" class="fa fa-calendar" aria-hidden="true"></i>

														</div>
													</div>

													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
													<span class="and_user_msg sr-only"></span> <!--help-inline -->


												</div>
											</div>


											<!--------------------------  ---------------------------- -->

											<div class="form-group">

											</div>
											<!--------------------------  ---------------------------- -->




											<!--------------------------  ---------------------------- -->




											<!--------------------------  ---------------------------- -->

											<div class="form-group">

											</div>
											<!--------------------------  ---------------------------- -->

											<div class="form-group has-feedback" id="eimage_base"> <!-- has-success ,has-warning, has-error -->
												<label for="firstName" class="col-sm-5 control-label">image</label>

												<div class="col-sm-7">



													<div class="fileinput fileinput-new" data-provides="fileinput" id="epadanimage" name="epadanimage">
														<span class="btn btn-default btn-file"><span>Choose file</span><input type="file" /></span>
														<span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new">No file chosen</span>
													</div>

													<span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
													<span class="and_user_msg sr-only"></span> <!--help-inline -->

													<div class="photome">
														<img src= "" id="eisplay_my_image_in_prof"></br>
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
								<button type="button" class="col-md-3 btn btn-danger" status="" data-dismiss="modal" id="edelete_this_item_here">delete</button>
							</div>
						</form> <!-- /form -->



					</div>
				</div>
			</div>
















			<?php } else {
				?>
				<div class="container parent_cont">

					<div class="row ">


						<div class="col-md-12 bg_color_green">

							<h1 class="to_uppercase">
								Add a department
								<p class="to_details_p">
									There is no department for adding a doctor ,please add a department  <a style="color: blue;" href="department.php"> here </a>
								</p>

							</div>
						</div>
					</div>


					<?php }
					?>


					<?php include_once ('footer.php');?>

