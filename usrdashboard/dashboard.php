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

        <?php include('./sidebar.php') ?>
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
                <h1>Patna metro</h1>

                <p>Are you a talented and creative writer with a passion for urban development and transportation? The Patna Metro Corporation
                    is seeking a skilled Content Writer to join our team and contribute to the exciting and transformative Patna Metro Project.
                    As a Content Writer, you will play
                    a vital role in crafting engaging and informative
                    content to keep the public informed and excited about this groundbreaking project
                </p>
                <a href='./application.php' class="application_btn">
                    Apply Now
                </a>
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>

</body>

</html>