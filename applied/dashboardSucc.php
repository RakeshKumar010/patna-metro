<?php
session_start();

if (isset($_SESSION['data'])) {
    $row = $_SESSION['data'];
} else {
    echo "No data available.";
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
        <div class="Usrdash_main">



            <div class="user_logut_main">
                <div class="login_user_div">
                    <img src="../assets/loginUser.png" alt="user">
                    <p class="login_user_name"><?php echo $row['name'] ?></p>
                </div>
                <a href='../' class="logout_link_main">
                    <img src="../assets/logoutUser.jpg" alt="logout">
                    Logout
                </a>
            </div>
            <div class="usr_dash_text">
             <h1>Apply Successfully..</h1>
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>

</body>

</html>