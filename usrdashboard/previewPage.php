<?php
session_start();
include('../db/connect.php');

// $row='';
if (isset($_SESSION['data'])) {
    $row = $_SESSION['data'];
} else {
    echo "No data available.";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $personalQuery = "SELECT * FROM personal WHERE uid = $id";
    $personalresult = mysqli_query($conn, $personalQuery);
    $Personal_row = mysqli_fetch_assoc($personalresult);

    $addressQuery = "SELECT * FROM `address` WHERE uid = $id";
    $addressresult = mysqli_query($conn, $addressQuery);
    $address_row = mysqli_fetch_assoc($addressresult);

    $qualificationinfo_Query = "SELECT * FROM `qualificationinfo` WHERE uid = $id";
    $qualificationinfo_result = mysqli_query($conn, $qualificationinfo_Query);

    $experience_Query = "SELECT * FROM `experience` WHERE uid = $id";
    $experience_result = mysqli_query($conn, $experience_Query);

   
}

if(isset($_POST['final_submit'])){
    $app_status=$_POST['app_status'];
    $personalSql="UPDATE `signusr` SET `app_status`='$app_status' WHERE id=$row[id]";
    mysqli_query($conn,$personalSql);
    header('Location:../applied/dashboardSucc.php');
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

            <form class="form_usr_main" action="#" method="post">
                
                    <h1 class='user_registeration_heading'>Details Preview</h1>
                
                <h4 class='user_registeration_2nd_heading'>Personal Information</h4>
                <div class="user_registeration_input_container">
                    <input type="number" name="app_status" value="1" hidden >



                    <div class='input_label_container'>
                        <label>Recruitment Type: </label> <br />
                        <p><?php echo $Personal_row['recruitment_type'] ?></p>
                    </div>
                    <div class='input_label_container'>
                        <label>Post Applied For: </label> <br />
                        <p><?php echo $Personal_row['applied_for'] ?></p>
                    </div>
                    <div class='input_label_container'>
                        <label>Parent Departments </label> <br />
                        <P><?php echo $Personal_row['p_departments'] ?></P>

                    </div>

                </div>
                <div class="user_registeration_input_container">

                    <div class='input_label_container'>
                        <label>Name of the Candidate </label> <br />
                        <p><?php echo $row['name'] ?></p>
                    </div>
                    <div class='input_label_container'>
                        <label>Father/Guardian's Name</label> <br />
                        <p><?php echo $Personal_row['father_name'] ?></p>
                    </div>
                    <div class='input_label_container'>
                        <label>Date of Birth</label><br />
                        <p><?php echo $Personal_row['dob'] ?></p>
                    </div>
                </div>
                <div class="user_registeration_input_container">

                    <div class='input_label_container'>
                        <label>Email ID</label> <br />
                        <p><?php echo $Personal_row['email'] ?></p>
                    </div>
                    <div class='input_label_container'>
                        <label>Mobile Number</label><br />
                        <p><?php echo $Personal_row['mobile'] ?></p>
                    </div>
                    <div class='input_label_container'>
                        <label>Aadhar Number</span></label><br />
                        <p><?php echo $Personal_row['aadhar'] ?></p>
                    </div>

                </div>

                <div class="user_registeration_input_container">
                    <div class='input_label_container'>
                        <label class='user_application_label'>Gender</label><br />
                        <P><?php echo $Personal_row['gender'] ?></P>
                    </div>
                   

                    <div class='input_label_container'>
                        <label>Age</label><br />
                        <P><?php echo $Personal_row['age'] ?></P>
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
                                <P><?php echo $address_row['p_address'] ?></P>
                                <!-- <p>lorem</p> -->
                            </div>
                        </div>
                        <div class="box1_container">
                            <p class="box1_para">Communication Address</p>
                            <div class="box1" style="text-align: center;">
                                <P><?php echo $address_row['c_address'] ?></P>

                            </div>
                        </div>
                    </div>
                    <div class="footer_adress">
                        <div class="footer_box footer_box_item">
                            <div class='input_label_container address_input_container'>
                                <label>State</label><br />
                                <P><?php echo $address_row['p_state'] ?></P>
                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>District</label><br />
                                <P><?php echo $address_row['p_district'] ?></P>

                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>Pincode</label><br />
                                <P><?php echo $address_row['p_pincode'] ?></P>
                            </div>

                        </div>
                        <div class="footer_box">

                            <div class='input_label_container address_input_container'>
                                <label>State</label><br />
                                <P><?php echo $address_row['c_state'] ?></P>
                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>District</label><br />
                                <P><?php echo $address_row['c_district'] ?></P>

                            </div>
                            <div class='input_label_container address_input_container'>
                                <label>Pincode</label><br />
                                <P><?php echo $address_row['c_pincode'] ?></P>
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
                        <?php
                        while ($qualificationinfo_row = mysqli_fetch_assoc($qualificationinfo_result)) {
                            echo "<tr>
                            <td>$qualificationinfo_row[qualification]</td>
                           
                            <td>$qualificationinfo_row[university]</td>
                            <td>$qualificationinfo_row[passing_year]</td>
                            <td>$qualificationinfo_row[subject]</td>
                            <td>$qualificationinfo_row[full_marks]</td>
                            <td>$qualificationinfo_row[obtained_marks]</td>
                        </tr>";
                        }
                        ?>



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
                        <?php
                        while ($experience_row = mysqli_fetch_assoc($experience_result)) {
                            echo "<tr>
                            <td>$experience_row[organization_name]</td>
                            <td>$experience_row[designation_held]</td>
                            <td>$experience_row[pay_scale]</td>
                            <td>$experience_row[work_duration_from]</td>
                            <td>$experience_row[work_duration_to]</td>
                            <td>$experience_row[job_nature]</td>
                            <td>$experience_row[org_type]</td>
                        </tr>";
                        }
                        ?>



                    </table>


                </div>

<button class="btn btn-primary my-5" style="margin-left: 45%;" name="final_submit">Final Submit</button>

               


            </form>
        </div>
    </div>
    <?php include('../css/script.php'); ?>
    <?php include('../footer.php'); ?>
    

</body>

</html>