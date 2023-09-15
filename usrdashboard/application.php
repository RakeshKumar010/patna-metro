<?php

session_start();



if (isset($_SESSION['data'])) {
    $row = $_SESSION['data'];
} else {
    echo "No data available.";
}




if (isset($_POST['application_submit'])) {
    include('../db/connect.php');
    $uid = $_POST['uid'];


    // personal sql 

    //post photo
    $photo = $_FILES['photo']['name'];
    $photoTempFile = $_FILES['photo']['tmp_name'];
    $photoFolder = "upload/personal/" . $photo;

    // post signature
    $signature = $_FILES['signature']['name'];
    $signatureTempFile = $_FILES['signature']['tmp_name'];
    $signatureFolder = "upload/personal/" . $signature;

    $recruitment_type = $_POST['recruitment_type'];
    $applied_for = $_POST['applied_for'];
    $p_departments = $_POST['p_departments'];
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $aadhar = $_POST['aadhar'];
    $gender = $_POST['gender'];
    // $nationality = $_POST['nationality'];
    $age = $_POST['age'];

    $personalsql = "INSERT INTO `personal`(`uid`,`recruitment_type`, `applied_for`, `p_departments`, `name`, `father_name`, `dob`, `email`, `mobile`, `aadhar`, `gender`, `age`,`photo`,`signature`) VALUES
    ('$uid','$recruitment_type','$applied_for','$p_departments','$name','$father_name','$dob','$email','$mobile','$aadhar','$gender','$age','$photoFolder','$signatureFolder')";

    mysqli_query($conn, $personalsql);

    move_uploaded_file($photoTempFile, $photoFolder);
    move_uploaded_file($signatureTempFile, $signatureFolder);


    // address sql
    $p_address = $_POST['p_address'];
    $p_state = $_POST['p_state'];
    $p_district = $_POST['p_district'];
    $p_pincode = $_POST['p_pincode'];
    $c_address = $_POST['c_address'];
    $c_state = $_POST['c_state'];
    $c_district = $_POST['c_district'];
    $c_pincode = $_POST['c_pincode'];

    $addersssql = "INSERT INTO `address`(`uid`,`p_address`, `p_state`, `p_district`, `p_pincode`, `c_address`, `c_state`, `c_district`, `c_pincode`) VALUES 
    ('$uid','$p_address','$p_state','$p_district','$p_pincode','$c_address','$c_state','$c_district','$c_pincode')";
    mysqli_query($conn, $addersssql);



    // experience table query
    $organization_name = $_POST['organization_name'];
    $designation_held = $_POST['designation_held'];
    $pay_scale = $_POST['pay_scale'];
    $work_duration_from = $_POST['work_duration_from'];
    $work_duration_to = $_POST['work_duration_to'];
    $job_nature = $_POST['job_nature'];
    $org_type = $_POST['org_type'];

    $experience_letter = $_FILES['experience_letter']['name'];
    $experience_letter_TempFile = $_FILES['experience_letter']['tmp_name'];

    for ($i = 0; $i < count($organization_name); $i++) {
        $experience_letter_Folder = "upload/experience/" . $experience_letter[$i];
        $experiencesql = "INSERT INTO `experience`(`uid`,`organization_name`, `designation_held`, `pay_scale`, `work_duration_from`, `work_duration_to`, `job_nature`, `org_type`,`experience_letter`) 
        VALUES ('$uid','$organization_name[$i]','$designation_held[$i]','$pay_scale[$i]','$work_duration_from[$i]','$work_duration_to[$i]','$job_nature[$i]','$org_type[$i]','$experience_letter_Folder')";
        mysqli_query($conn, $experiencesql);
        move_uploaded_file($experience_letter_TempFile[$i], $experience_letter_Folder);
    }


    // qualificationinfo sql
    $qualification = $_POST['qualification'];
    $university = $_POST['university'];
    $passing_year = $_POST['passing_year'];
    $subject = $_POST['subject'];
    $full_marks = $_POST['full_marks'];
    $obtained_marks = $_POST['obtained_marks'];
    $percentage = $_POST['percentage'];
    $certificate = $_FILES['certificate']['name'];
    $certificateTempFile = $_FILES['certificate']['tmp_name'];



    for ($i = 0; $i < count($qualification); $i++) {
        $certificateFolder = "upload/qualification/" . $certificate[$i];
        $qulifi_sql = "INSERT INTO `qualificationinfo`(`uid`, `qualification`,`university`, `passing_year`, `subject`, `full_marks`, `obtained_marks`,`percentage`,`certificate`) VALUES 
        ('$uid','$qualification[$i]','$university[$i]','$passing_year[$i]','$subject[$i]','$full_marks[$i]','$obtained_marks[$i]','$percentage[$i]','$certificateFolder')";
        mysqli_query($conn, $qulifi_sql);
        move_uploaded_file($certificateTempFile[$i], $certificateFolder);
    }

    header("Location:previewPage.php?id=00$row[id]");
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include('../head.php'); ?>

<body>
    <header class='header_main'>
        <a href='../' class="imgheader">
            <img src='../assets/logo_pmrc.jpg' class="gov_img" />
        </a>
        <div class="heading_main">
            <h1 class="heading">Patna Metro Rail Corporation</h5>
        </div>

    </header>
    <div class="page_container_main">

        <?php include('./sidebar.php') ?>
        <div class='user_registeration_form'>

            <form class="form_usr_main" action="#" method="post" enctype="multipart/form-data">
                <h2 class='user_registeration_heading'>CANDIDATES DETAILS</h2>
                <h4 class='user_registeration_2nd_heading'>Personal Information</h4>
                <div class="user_registeration_input_container">
                    <input type="number" name="uid" value="00<?php echo $row['id'] ?>" hidden>



                    <div class='input_label_container'>
                        <label>Recruitment Type: </label> <br />
                        <select name="recruitment_type" required>
                            <option value="Deputarion">Deputation</option>
                            <option value="Deputarion">Contractual</option>
                        </select>
                    </div>
                    <div class='input_label_container'>
                        <label>Post Applied For: </label> <br />
                        <select name="applied_for" required>
                            <option value="deputy general manager safaty">Deputy General Manager Safaty</option>
                            <option value="deputy general manager safaty">Deputy General Manager Safaty</option>


                        </select>
                    </div>
                    <div class='input_label_container'>
                        <label>Parent Departments </label> <br />
                        <input type="text" name="p_departments" required />

                    </div>

                </div>
                <div class="user_registeration_input_container">

                    <div class='input_label_container'>
                        <label>Name of the Candidate </label> <br />
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" required />
                    </div>
                    <div class='input_label_container'>
                        <label>Father/Guardian's Name</label> <br />
                        <input type="text" name="father_name" required />
                    </div>
                    <div class='input_label_container'>
                        <label>Date of Birth</label><br />
                        <input type="date" name="dob" required />
                    </div>
                </div>
                <div class="user_registeration_input_container">

                    <div class='input_label_container'>
                        <label>Email ID</label> <br />
                        <input type="email" name="email" required value="<?php echo $row['email'] ?>" />
                    </div>
                    <div class='input_label_container'>
                        <label>Mobile Number</label><br />
                        <input type="number" name="mobile" required id="mobileid" value="<?php echo $row['mobile'] ?>" oninput="restrictPhoneNumber()" />
                    </div>
                    <div class='input_label_container'>
                        <label>Aadhar Number</span></label><br />
                        <input type="number" id="aadharid" name="aadhar" required oninput="restrictAadharNumber()" />
                    </div>

                </div>

                <div class="user_registeration_input_container">
                    <div class='input_label_container'>
                        <label class='user_application_label'>Gender</label><br />
                        <select id="category" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>

                        </select>
                    </div>


                    <div class='input_label_container'>
                        <label>Age</label><br />
                        <input type="number" name="age" required id="ageId" oninput="restrictAge()" />
                    </div>
                    <div class="input_label_container">

                    </div>
                </div>


                <h4 class='user_registeration_2nd_heading'>Address for Communication</h4>
                <div class="address_check_box_div">
                    <input type="checkbox" name="declaration" value="yes" id="address_check_box" onclick="addressCheckBox()" required>

                    <p class="address_check_box_para">Communication address is same as Permanent address.</p>

                </div>
                <div class="address_main">
                    <div class="box_main">
                        <div class="box1_container">
                            <p class="box1_para">Permanent Address</p>
                            <div class="box1">
                                <textarea name="p_address" id="p_address_id" required></textarea>
                            </div>
                        </div>


                        <div class="box1_container">
                            <p class="box1_para">Communication Address</p>
                            <div class="box1">
                                <textarea name="c_address" id="c_address_id" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="footer_adress">
                        <div class="footer_box footer_box_item">
                            <div class='input_label_container address_input_container'>
                                <label>State</label><br />
                                <select name="p_state" onclick="fetchPStateFun()" id="pSelectState" required>
                                    <option value="">State</option>
                                </select>
                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>District</label><br />
                                <select name="p_district" onclick="fetchPDistrict()" id="pSelectDistrict" required>
                                    <option value="">District</option>
                                </select>

                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>Pincode</label><br />
                                <input type="number" name="p_pincode" required id="pincodeid" oninput="restrictPincode()" />
                            </div>

                        </div>
                        <div class="footer_box">

                            <div class='input_label_container address_input_container'>
                                <label>State</label><br />
                                <select name="c_state" required onclick="fetchCStateFun()" id="cSelectState">
                                    <option value="" id="first_state_option">State</option>

                                </select>
                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>District</label><br />
                                <select name="c_district" onclick="fetchCDistrict()" id="cSelectDistrict" required>
                                    <option value="" id="first_dist_option">District</option>
                                </select>

                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>Pincode</label><br />
                                <input type="number" name="c_pincode" required id="pincodeidii" oninput="restrictPincodeii()" />
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
                            <th>Percentage</th>
                            <th>Certificate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="qualification[]" required value="10th" readonly></td>

                            <td><input type="text" name="university[]" required></td>
                            <td><input type="date" name="passing_year[]" required></td>
                            <td><input type="text" name="subject[]" required></td>
                            <td><input type="number" name="full_marks[]" id="f_marks" required></td>
                            <td><input type="number" name="obtained_marks[]" id="o_marks" required></td>
                            <td><input type="text" name="percentage[]" onclick="caltulateMarks(this)" readonly required></td>
                            <td> <input type="file" name="certificate[]" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="qualification[]" required value="12th" readonly></td>

                            <td><input type="text" name="university[]" required></td>
                            <td><input type="date" name="passing_year[]" required></td>
                            <td><input type="text" name="subject[]" required></td>
                            <td><input type="number" name="full_marks[]" id="f_marksii" required></td>
                            <td><input type="number" name="obtained_marks[]" id="o_marksii" required></td>
                            <td><input type="text" name="percentage[]" onclick="caltulateMarksii(this)"  readonly required></td>
                            <td><input type="file" name="certificate[]" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="qualification[]" required value="Gradutation" readonly></td>

                            <td><input type="text" name="university[]" required></td>
                            <td><input type="date" name="passing_year[]" required></td>
                            <td><input type="text" name="subject[]" required></td>
                            <td><input type="number" name="full_marks[]" id="f_marksiii"  required></td>
                            <td><input type="number" name="obtained_marks[]" id="o_marksiii" required></td>
                            <td><input type="text" name="percentage[]" onclick="caltulateMarksiii(this)" readonly required></td>
                            <td><input type="file" name="certificate[]" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="qualification[]" required value="Post-Gradutation" readonly></td>

                            <td><input type="text" name="university[]" required></td>
                            <td><input type="date" name="passing_year[]" required></td>
                            <td><input type="text" name="subject[]" required></td>
                            <td><input type="number" name="full_marks[]" id="f_marksiv"  required></td>
                            <td><input type="number" name="obtained_marks[]" id="o_marksiv" required></td>
                            <td><input type="text" name="percentage[]" onclick="caltulateMarksiv(this)" readonly required></td>
                            <td><input type="file" name="certificate[]" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="experience_table">
                    <h4 class='user_registeration_2nd_heading'>Experience Details</h4>
                    <table class='user_application_table' id="user_application_table_id">
                        <thead>
                            <tr>
                                <th rowspan="2">Organization Name</th>
                                <th rowspan="2">Designation Held</th>
                                <th rowspan="2">Pay Scale/Level</th>
                                <th colspan="2">Work Duration</th>
                                <th rowspan="2">Nature of Job</th>
                                <th rowspan="2">Type of Org.</th>
                                <th rowspan="2">Experience Letter</th>
                            </tr>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>

                        <tr>
                            <td><input type="text" name="organization_name[]" required></td>
                            <td><input type="text" name="designation_held[]" required></td>
                            <td><input type="text" name="pay_scale[]" required></td>
                            <td><input type="date" name="work_duration_from[]" required></td>
                            <td><input type="date" name="work_duration_to[]" required></td>
                            <td>
                                <Select name="job_nature[]" required>
                                    <option value="permanent">Permanent</option>
                                    <option value="contractual">Contractual</option>
                                    <option value="deputation">Deputation </option>
                                </Select>
                            </td>
                            <td><Select name="org_type[]" required>
                                    <option value="cGovt">Central Govt.</option>
                                    <option value="sGovt">State Govt.</option>
                                    <option value="cPsu">Central PSU</option>
                                </Select></td>
                            <td><input type="file" name="experience_letter[]" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="organization_name[]" required></td>
                            <td><input type="text" name="designation_held[]" required></td>
                            <td><input type="text" name="pay_scale[]" required></td>
                            <td><input type="date" name="work_duration_from[]" required></td>
                            <td><input type="date" name="work_duration_to[]" required></td>
                            <td>
                                <Select name="job_nature[]" required>
                                    <option value="permanent">Permanent</option>
                                    <option value="contractual">Contractual</option>
                                    <option value="deputation">Deputation </option>
                                </Select>
                            </td>
                            <td>
                                <Select name="org_type[]" required>
                                    <option value="cGovt">Central Govt.</option>
                                    <option value="sGovt">State Govt.</option>
                                    <option value="cPsu">Central PSU</option>
                                </Select>
                            </td>
                            <td><input type="file" name="experience_letter[]" required></td>
                           
                        </tr>
                        <tbody id="experience_table_tbody">
                        </tbody>
                    </table>
                    <div class="add_remove_btn">
                    <p class="btn btn-success mx-1 p-1 px-2" onclick="addMoreRowFun()">Add New Row</p>
                    <p class="btn btn-danger mx-1 p-1 px-2" onclick="deleteRow()">Remove</p>
                    </div>
                 

                </div>
                <div class='user_registeration_form document_upload_main'>
                    <h3 class='user_registeration_2nd_heading'>Upload Documents </h3>
                    <h4 class="documents_size_heading"> Only jpg file format(Upto 100kb), Photo Size(Upto 50kb) & Signture size(Upto 20kb)</h4>
                    <div class="user_registeration_input_container">
                        <div class='document_upload_div' id="document_upload_id">
                            <label>Upload Photo* </label>
                            <input type="file" name="photo" required>
                        </div>
                        <div class='document_upload_div' id="document_upload_id">
                            <label>Upload Signature* </label>
                            <input type="file" name="signature" required>
                        </div>
                    </div>
                </div>
                <div class="declaration_main">
                    <label>Declaration</label>
                    <div class="declaration_container">
                        <input type="checkbox" name="declaration" required value="yes" id="declaration_id">

                        <p>I hereby declare that all the above information is correct to the best of my knowledge and that
                            i shall be for punishment if information if found incorrect. I also declare that i have understood
                            the guideline for engagement and fully abide by the same including any further guidelines issued by PMRCL,Patna
                            is this regard. i categorically declared that there is no pending Criminal case or serious complaint against myself.
                        </p>

                    </div>
                </div>

                <div class="usrapplication_save_btn_div">
                    <p class='usrapplication_save_btn' onclick="popupFun('yes')">Save</p>
                </div>

                <div class="alert_box">
                    <div class="img_heading_container">
                        <img class="warnning_icon" src="../assets/warnning.png" alt="alert_icon">
                        <h2>Confirm</h2>
                    </div>
                    <p>Are You Sure To Submit The Information!</p>
                    <div class="popup_btn_container">
                        <button class='btn btn-success' name="application_submit" required type="submit">Yes</button>
                        <button class='btn btn-warning' type="button" onclick="popupFun('no')">No</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include('../css/script.php'); ?>
    <?php include('../footer.php'); ?>


</body>

</html>