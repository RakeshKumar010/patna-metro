<?php
session_start();

if (isset($_SESSION['data'])) {
    $row = $_SESSION['data'];
} else {
    echo "No data available.";
}
if (isset($_POST['final_submit'])) {
    include('../db/connect.php');

    $sn = $_POST['sn'];
    $app_status = $_POST['app_status'];
    $signupsql = "UPDATE `signusr` SET `app_status`='$app_status' WHERE `id`='$sn'";
    if (mysqli_query($conn, $signupsql)) {
        header("Location:../applied/dashboardSucc.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

</html>
<?php include('../head.php'); ?>
<script src="../css/sweetAlert.js"></script>

<body>
    <?php
    $disNo=0;
    if (isset($_POST['document_upload'])) {
        include('../db/connect.php');
        $sn = $_POST['sn'];
        $app_status = $_POST['app_status'];

        //post id
        $sign_id = $_POST['sign_id'];
        //10th certificate
        $xth_certificate = $_FILES['xth_certificate']['name'];
        $xth_certificateTempFile = $_FILES['xth_certificate']['tmp_name'];
        $xth_certificateFolder = "upload/qualification/" . $xth_certificate;

        //12th certificate
        $xiith_certificate = $_FILES['xiith_certificate']['name'];
        $xiith_certificateTempFile = $_FILES['xiith_certificate']['tmp_name'];
        $xiith_certificateFolder = "upload/qualification/" . $xiith_certificate;
        //post signature
        $signature = $_FILES['signature']['name'];
        $signatureTempFile = $_FILES['signature']['tmp_name'];
        $signatureFolder = "upload/personal/" . $signature;

        //post p_certificate
        $p_certificate = $_FILES['p_certificate']['name'];
        $p_certificateTempFile = $_FILES['p_certificate']['tmp_name'];
        $p_certificateFolder = "upload/qualification/" . $p_certificate;

        //post u_certificate
        $u_certificate = $_FILES['u_certificate']['name'];
        $u_certificateTempFile = $_FILES['u_certificate']['tmp_name'];
        $u_certificateFolder = "upload/qualification/" . $u_certificate;

        //post photo
        $photo = $_FILES['photo']['name'];
        $photoTempFile = $_FILES['photo']['tmp_name'];
        $photoFolder = "upload/personal/" . $photo;


        $xth_sql = "UPDATE `qualificationinfo` SET `certificate`='$xth_certificateFolder'  WHERE `uid`='$sign_id' and `qualification`='10th'";
        $xth_sql_scu = mysqli_query($conn, $xth_sql);

        $xiith_sql = "UPDATE `qualificationinfo` SET `certificate`='$xiith_certificateFolder'  WHERE `uid`='$sign_id' and `qualification`='12th'";
        $xiith_sql_suc = mysqli_query($conn, $xiith_sql);

        $pg_sql = "UPDATE `qualificationinfo` SET `certificate`='$p_certificateFolder'  WHERE `uid`='$sign_id' and `qualification`='Post-Gradutation'";
        $pg_sql_suc = mysqli_query($conn, $pg_sql);

        $ug_sql = "UPDATE `qualificationinfo` SET `certificate`='$u_certificateFolder'  WHERE `uid`='$sign_id' and `qualification`='Gradutation'";
        $ug_sql_suc = mysqli_query($conn, $ug_sql);

        $signature_sql = "UPDATE `personal` SET `signature`='$signatureFolder'  WHERE `uid`='$sign_id'";
        $signature_sql_suc = mysqli_query($conn, $signature_sql);

        $photo_sql = "UPDATE `personal` SET `photo`='$photoFolder'  WHERE `uid`='$sign_id'";
        $photo_sql_suc = mysqli_query($conn, $photo_sql);




        //move file inside database
        move_uploaded_file($signatureTempFile, $signatureFolder);
        move_uploaded_file($photoTempFile, $photoFolder);
        move_uploaded_file($u_certificateTempFile, $u_certificateFolder);
        move_uploaded_file($p_certificateTempFile, $p_certificateFolder);
        move_uploaded_file($xth_certificateTempFile, $xth_certificateFolder);
        move_uploaded_file($xiith_certificateTempFile, $xiith_certificateFolder);

        $disNo=2;
        echo "<script>
            // alert('hi')
            swal('Success', 'Your document has been uploaded successfully.', 'success');
            

   

        </script>";
    }

    ?>

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

        <div class='user_registeration_form document_upload_main'>
            <form action="#" method="post" >
                <h3 class='user_registeration_2nd_heading'>Upload Documents </h3>
                <h4 class="documents_size_heading"> Only jpg file format(Upto 100kb), Photo Size(Upto 50kb) & Signture size(Upto 20kb)</h4>
                <div class="user_registeration_input_container">
                    <input type="number" name="sign_id" value="00<?php echo $row['id']; ?>" hidden>
                    <input type="number" name="app_status" value="1" hidden>
                    <input type="text" name="sn" value="<?php echo $row['id'] ?>" hidden>
                    <div class='document_upload_div'>
                        <label>10th Certificate</label>
                        <input type="file" name="xth_certificate">
                    </div>
                    <div class='document_upload_div'>
                        <label>12th Certificate</label>
                        <input type="file" name="xiith_certificate">
                    </div>
                </div>
                <div class="user_registeration_input_container">
                    <div class='document_upload_div'>
                        <label>Gradutation Certificate</label>
                        <input type="file" name="u_certificate">
                    </div>
                    <div class='document_upload_div'>
                        <label>Post-Gradutation Certificate</label>
                        <input type="file" name="p_certificate">
                    </div>
                </div>
                <div class="user_registeration_input_container">
                    <div class='document_upload_div' id="document_upload_id">
                        <label>Upload Photo* </label>
                        <input type="file" name="photo">
                    </div>
                    <div class='document_upload_div' id="document_upload_id">
                        <label>Upload Signature* </label>
                        <input type="file" name="signature">
                    </div>
                </div>

                <div class="usrapplication_save_btn_div">
                    <a href="./previewPage.php?id=00<?php echo $row['id']; ?>" class='btn btn-info ' name="document_preview">Preview</a>
                    <button type="submit" class='btn btn-primary mx-2' name="document_upload">Upload Document</button>
                    <button type="submit" class='btn btn-success' name="final_submit" id="enableButton" >Final Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php include('../footer.php'); ?>
<script>
    let enableButton = document.getElementById('enableButton');
    if(<?php echo $disNo?>==0){
        enableButton.disabled = true

    }else{
        enableButton.disabled = false

    }
     
</script>
</body>

</html>