<?php include('./db/conn.php');?>




<style>

</style>
<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">

			<!-- Table Panel -->
			<div>
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span>
									<large><b>Application List</b></large>
								</span>

							</div>

						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-md-2 offset-md-2 text-right">Position :</div>
										<div class="col-md-5">
											<select name="" class="custom-select browser-default select2"
												id="position_filter">
												<option value="Dev">Dev</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<hr><br>
							<table class="table table-bordered table-hover">

								<thead>
									<tr>
										<th class="text-center">Applicants Id</th>
										<th class="text-center">Applicants Name</th>
										<th class="text-center">Post Name</th>
										<th class="text-center">Email Id</th>
										<th class="text-center">Recruitment Type</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody class="application_view_tbody">


								<?php
								$sql="SELECT * FROM `personal` WHERE 1";
								$result = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($result)){
									echo "<tr>
									<td>$row[uid]</td>
									<td>$row[name]</td>
									<td>$row[applied_for]</td>
									<td>$row[email]</td>
									<td>$row[recruitment_type]</td>
									<td class='text-center'>
									<button class='btn btn-sm btn-primary' onclick='showAppli()' >View</button>
									</td>
									</tr>";
									}?>




								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>






		<div class="application_preview" id="application_preview_id">
			<h2 class="crose_icon" onclick='hideAppli()'>
				❌
			</h2>			
			<div class="page_container_main">

					<div class='user_registeration_form'>

						<form class="form_usr_main" action="#" method="post">

							<h1 class='user_registeration_heading'>Details Preview</h1>

							<h4 class='user_registeration_2nd_heading'>Personal Information</h4>
							<div class="user_registeration_input_container">
								<input type="number" name="app_status" value="1" hidden>



								<div class='input_label_container'>
									<label>Recruitment Type: </label> <br />
									<p>
									</p>
								</div>
								<div class='input_label_container'>
									<label>Post Applied For: </label> <br />
									<p>
									</p>
								</div>
								<div class='input_label_container'>
									<label>Parent Departments </label> <br />
									<P>
									</P>

								</div>

							</div>
							<div class="user_registeration_input_container">

								<div class='input_label_container'>
									<label>Name of the Candidate </label> <br />
									<p>
									</p>
								</div>
								<div class='input_label_container'>
									<label>Father/Guardian's Name</label> <br />
									<p>
									</p>
								</div>
								<div class='input_label_container'>
									<label>Date of Birth</label><br />
									<p>
									</p>
								</div>
							</div>
							<div class="user_registeration_input_container">

								<div class='input_label_container'>
									<label>Email ID</label> <br />
									<p>
									</p>
								</div>
								<div class='input_label_container'>
									<label>Mobile Number</label><br />
									<p>
									</p>
								</div>
								<div class='input_label_container'>
									<label>Aadhar Number</span></label><br />
									<p>
									</p>
								</div>

							</div>

							<div class="user_registeration_input_container">
								<div class='input_label_container'>
									<label class='user_application_label'>Gender</label><br />
									<P>
									</P>
								</div>


								<div class='input_label_container'>
									<label>Age</label><br />
									<P>
									</P>
								</div>
								<div class="input_label_container">

								</div>
							</div>


							<h4 class='user_registeration_2nd_heading'>Address for Communication</h4>
							<div class="address_main">
								<div class="box_main">
									<div class="box1_container">
										<p class="box1_para">Permanent Address</p>
										<div class="box1" style="text-align: center;">
											<P>
											</P>
											<!-- <p>lorem</p> -->
										</div>
									</div>
									<div class="box1_container">
										<p class="box1_para">Communication Address</p>
										<div class="box1" style="text-align: center;">
											<P>
											</P>

										</div>
									</div>
								</div>
								<div class="footer_adress">
									<div class="footer_box footer_box_item">
										<div class='input_label_container address_input_container'>
											<label>State</label><br />
											<P>
											</P>
										</div>
										<div class='input_label_container address_input_container'>
											<label>District</label><br />
											<P>
											</P>

										</div>
										<div class='input_label_container address_input_container'>
											<label>Pincode</label><br />
											<P>
											</P>
										</div>

									</div>
									<div class="footer_box">

										<div class='input_label_container address_input_container'>
											<label>State</label><br />
											<P>
											</P>
										</div>
										<div class='input_label_container address_input_container'>
											<label>District</label><br />
											<P>
											</P>

										</div>
										<div class='input_label_container address_input_container'>
											<label>Pincode</label><br />
											<P>
											</P>
										</div>
									</div>
								</div>
							</div>
							<h4 class='user_registeration_2nd_heading'>Qualification Details</h4>
							<table class='user_application_table'>
								<thead>
									<tr>
										<th>Qualification</th>
										<th>Board/University</th>
										<th>Year of Passing</th>
										<th>Subject</th>
										<th>Full Marks</th>
										<th>Obtained Marks</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<div class="experience_table">
								<h4 class='user_registeration_2nd_heading'>Experience Details</h4>
								<table class='user_application_table'>
									<thead>
										<tr>
											<th rowspan="2">Organization Name</th>
											<th rowspan="2">Designation Held</th>
											<th rowspan="2">Pay Scale/Level</th>
											<th colspan="2">Work Duration</th>
											<th rowspan="2">Nature of Job</th>
											<th rowspan="2">Type of Org.</th>
										</tr>
										<tr>
											<th>From</th>
											<th>To</th>
										</tr>
									</thead>
								</table>
							</div>
							<button class="btn btn-primary my-5" style="margin-left: 45%;" name="final_submit">Final
								Submit</button>
						</form>
					</div>
				</div>
		</div>
	</div>
	<style>
		td {
			vertical-align: middle !important;
		}

		td p {
			margin: unset
		}

		img {
			max-width: 100px;
			max-height: 150px;
		}
	</style>
	