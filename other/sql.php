<?php 
session_start();
include('conn.php');
$userID=$_SESSION['USERID'];
if($userID!=false){
 

// SELECT USERTABLE        
$usertablesql="SELECT * FROM `udusr` WHERE `id`='$userID'";
$usertable_arr=mysqli_fetch_array(mysqli_query($conn, $usertablesql));
$pinfoselect=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `personal_info` WHERE `uid`='$userID'"));

if($pinfoselect==false){
// if($usertable_arr['email']!=NULL&&$usertable_arr['email_verified']==1){
$email=$_POST['email'];
$empfor=isset($_POST['empfor'])?$conn->real_escape_string(trim($_POST['empfor'])):NULL;
$councilno=isset($_POST['council'])?$conn->real_escape_string(trim($_POST['council'])):NULL;
$fname=isset($_POST['fname'])?$conn->real_escape_string(trim($_POST['fname'])):NULL;
$mname=isset($_POST['mname'])?$conn->real_escape_string(trim($_POST['mname'])):NULL;
$lname=isset($_POST['lname'])?$conn->real_escape_string(trim($_POST['lname'])):NULL;
$fathername=isset($_POST['fathername'])?$conn->real_escape_string(trim($_POST['fathername'])):NULL;
$nation=isset($_POST['nation'])?$conn->real_escape_string(trim($_POST['nation'])):NULL;
$dob=isset($_POST['dob'])?$conn->real_escape_string(trim($_POST['dob'])):NULL;
$gender=isset($_POST['gender'])?$conn->real_escape_string(trim($_POST['gender'])):NULL;
// address variables
$paddress=isset($_POST['paddress'])?$conn->real_escape_string(trim($_POST['paddress'])):NULL;
$pstate=isset($_POST['pstate'])?$conn->real_escape_string(trim($_POST['pstate'])):NULL;
$pdist=isset($_POST['pdist'])?$conn->real_escape_string(trim($_POST['pdist'])):NULL;
$ppin=isset($_POST['ppin'])?$conn->real_escape_string(trim($_POST['ppin'])):NULL;
// coressponding address var
$caddress=isset($_POST['caddress'])?$conn->real_escape_string(trim($_POST['caddress'])):NULL;
$cstate=isset($_POST['cstate'])?$conn->real_escape_string(trim($_POST['cstate'])):NULL;
$cdist=isset($_POST['cdist'])?$conn->real_escape_string(trim($_POST['cdist'])):NULL;
$cpin=isset($_POST['cpin'])?$conn->real_escape_string(trim($_POST['cpin'])):NULL;
// update variable from user table
$ulbs=isset($_POST['ulbd'])?$conn->real_escape_string(trim($_POST['ulbd'])):NULL;
$vid=isset($_POST['vid'])?$conn->real_escape_string(trim($_POST['vid'])):NULL;
$appyDate=date('d/m/Y');
if($_FILES['profileimg']['error']==0){
    $imagName = $_FILES['profileimg']['name'];
    $imgext = pathinfo($imagName, PATHINFO_EXTENSION);
    $newimgName = md5(uniqid());
    $imgDest = 'uploads/profileImage/'.$newimgName.'.'.$imgext;
    move_uploaded_file($_FILES['profileimg']['tmp_name'], $imgDest);  
}
if($_FILES['signature']['error']==0){
    $signName = $_FILES['signature']['name'];
    $signext = pathinfo($signName, PATHINFO_EXTENSION);
    $newsignName = md5(uniqid());
    $signDest = 'uploads/signatures/'.$newsignName.'.'.$signext;
    move_uploaded_file($_FILES['signature']['tmp_name'], $signDest);
}


// qualification var
$quali=$_POST['quali'];
$board=$_POST['board'];
$subject=$_POST['subject'];
$pyear=$_POST['pyear'];
$marks=$_POST['marks'];
$tmarks=$_POST['tmarks'];
$percent=$_POST['percent'];

//Profession variables
$org=$_POST['org'];
$pfname=$_POST['pfname'];
$fromyear=$_POST['fdate'];
$toyear=$_POST['tdate'];
$totalexp=$_POST['texp'];

// Accadmic award
$institute=$_POST['institute'];
$awaryear=$_POST['awaryear'];
$achivmentfor=$_POST['achivmentfor'];
//update user table query
$updateuser="UPDATE `udusr` SET `emp_cat` = '$empfor', `email`='$email', `vid` = '$vid', `ulb` = '$ulbs', `councilno` = '$councilno', `image` = '$imgDest', `sign` = '$signDest' WHERE `udusr`.`id` = '$userID'";
$runupdateuser=mysqli_query($conn, $updateuser);

// EDUCATION INFORMATION
$marksheet = count($_FILES['certificate']['tmp_name']);
        foreach ($quali as $index => $qualification ){
            $s_quali=$qualification;
            $s_board=$board[$index];
            $sub=$subject[$index];
            $s_pyear=$pyear[$index];
            $s_marks=$marks[$index];
            $s_tmarks=$tmarks[$index];
            $s_percent=$percent[$index];
            $fileName = $_FILES['certificate']['name'][$index];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = md5(uniqid());
            $fileDest = 'uploads/marksheet/'.$fname.'-'.$dob.'-'.$newFileName.'.'.$ext;
            move_uploaded_file($_FILES['certificate']['tmp_name'][$index], $fileDest);
            $qualiinsert="INSERT INTO `education` (`uid`, `quali`, `board`, `sub`, `passyear`, `obt_marks`, `ttl_marks`, `percentage`, `certi`)
             VALUES ('$userID', '$s_quali', '$s_board', '$sub', '$s_pyear', '$s_marks', '$s_tmarks', '$s_percent', '$fileDest')";
            $qualiinsertrun=mysqli_query($conn, $qualiinsert);
        }

// PROFESSION INFORMATION
$expcertificate = count($_FILES['expcerti']['tmp_name']);
        foreach ($org as $i => $organisation ){
            $s_org =$organisation;
            $s_profile=$pfname[$i];
            $s_yearfrom=$fromyear[$i];
            $s_yearto=$toyear[$i];
            $s_totalyear=$totalexp[$i];
            $certificateName = $_FILES['expcerti']['name'][$i];
            $c_ext = pathinfo($certificateName, PATHINFO_EXTENSION);
            $newNameforcerti = md5(uniqid());
            $certificateDest = 'uploads/certificates/'.$fname.'-'.$dob.'-'.$newNameforcerti.'.'.$c_ext;
            move_uploaded_file($_FILES['expcerti']['tmp_name'][$i], $certificateDest);
            $profession="INSERT INTO `profession` (`uid`, `org`, `pfname`, `yfrom`, `yto`, `texp`, `certi`) VALUES ('$userID', '$s_org', '$s_profile', '$s_yearfrom', '$s_yearto', '$s_totalyear', '$certificateDest')";
            $professionblank="INSERT INTO `profession` (`org`, `pfname`, `yfrom`, `yto`, `texp`, `certi`) VALUES ( '', '', '', '', '', '')";
            if($s_org !=""||$s_profile!=""){
                $professionqueryrun=mysqli_query($conn, $profession);
            }
            else{
                $professionqueryrun=mysqli_query($conn, $professionblank);
            }
        }
        
// ACEDMIC AWARD
$awardcertificate = count($_FILES['uploadfileimg']['tmp_name']);
foreach ($institute as $i => $institue ){
    $ar_institue=$institue;
    $ar_awardyear=$awaryear[$i];
    $ar_achivmentfor=$achivmentfor[$i];
    $awardcertiName = $_FILES['uploadfileimg']['name'][$i];
    $extesion = pathinfo($awardcertiName, PATHINFO_EXTENSION);
    $newAwardName = md5(uniqid());
    $awardDest = 'uploads/awarddoc/'.$ar_institue.''.$newAwardName.'.'.$extesion;
    move_uploaded_file($_FILES['uploadfileimg']['tmp_name'][$i], $awardDest);
    $awardisnert="INSERT INTO `award` (`uid`, `insititue`, `year`, `achivement`, `certificate`) VALUES ('$userID', '$ar_institue', '$ar_awardyear', '$ar_achivmentfor', '$awardDest')";
    $awardisnertblank="INSERT INTO `award` (`insititue`, `year`, `achivement`, `certificate`) VALUES ('', '', '', '', '')";
    if($ar_institue!=""||$ar_awardyear!=""||$ar_achivmentfor!=""){
        $awardqueryrun=mysqli_query($conn, $awardisnert);  
    } else{
        $awardqueryrun=mysqli_query($conn, $awardisnertblank);  
    }
    
}
// PERSONAL INFORMATION
    $personInfo="INSERT INTO `personal_info` (`uid`, `fname`, `mname`, `lname`, `fathername`, `dob`, `gender`, `nationality`) VALUES ('$userID', '$fname', '$mname', '$lname', '$fathername', '$dob', '$gender', '$nation')";


// ADDRESS INFO
    $addressinfo="INSERT INTO `addressDetails` (`uid`, `address`, `state`, `district`, `pin`, `caddress`, `cstate`, `cdistrict`, `cpin`) VALUES ('$userID', '$paddress', '$pstate', '$pdist', '$ppin', '$caddress', '$cstate', '$cdist', '$cpin')";

    
         if(mysqli_query($conn,$updateuser)&&mysqli_query($conn, $personInfo)&&mysqli_query($conn, $addressinfo)&&$qualiinsertrun&&$professionqueryrun)
          {
        echo ('Submitted');
        mysqli_query($conn,"UPDATE `udusr` SET `app_id` = '$userID' WHERE `udusr`.`id` = '$userID'");
          }   
    
 
    
}
// if email is not verified
// else{
//     echo ('emailnotverifiedyet');
// }
else{
    echo ('alreadysubmitted');
}
}else{
    echo('logout');
}

?>