<?php
session_start();
$row = $_SESSION['data'];

$error="";

if (isset($_POST['update_password'])) {

    include('../db/connect.php');

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $con_password = $_POST['con_password'];
    if($row['password']==$old_password){

        $upsql = "UPDATE `signusr` SET `password`='$new_password',`cpassword`='$con_password' WHERE `password`='$old_password'";
        mysqli_query($conn, $upsql);
    }else{
        $error = "Invalid Old Password";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include('../head.php') ?>

<body>
    <header class='header_main'>
        <a href='./' class="imgheader">
            <img src='../assets/logo_pmrc.jpg' class="gov_img" />
        </a>
        <div class="heading_main">
            <h1 class="heading">Patna Metro Rail Corporation</h5>
        </div>

    </header>
    <div class="page_container_main">
    <?php include('./sidebarSucc.php') ?>
    <div class="Usrdash_main" style="align-items: center;">
        <form action="#" method="post" class="password_change_main shadow-lg">
            <h1>Change Your Password</h1>
            <p class="error_show"><?php echo $error ?></p>
            <div class="password_change_div">
                <i class="fa-solid fa-lock"></i>

                <input type="password" name="old_password" placeholder="Old password">
            </div>
            <div class="password_change_div">
                <i class="fa-solid fa-lock"></i>
                <input type="Password" name="new_password" placeholder="New password">
            </div>
            <div class="password_change_div">
                <i class="fa-solid fa-lock"></i>
                <input type="text" name="con_password" placeholder="Confirm password">
            </div>
            <button type="submit" class="btn btn-success shadow" name="update_password">Change</button>
        </form>
    </div>
    </div>
    <?php include('../footer.php'); ?>

</body>

</html>