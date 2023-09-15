<?php
$val = 'hi';
if (isset($_POST['signup_btn'])) {
    include('./db/connect.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $app_status = $_POST['app_status'];
    $sql = "INSERT INTO `signusr` (`name`,`email`, `mobile`,`password`,`cpassword`,`app_status`) VALUES
     ('$name','$email','$mobile','$password','$cpassword','$app_status')";

    $signupSuc = mysqli_query($conn, $sql);
    if ($signupSuc) {

    echo " <script>
            // alert('hi')
            swal('Success', 'Your Acount has been created.', 'success');
        </script>";
    }
}




?>