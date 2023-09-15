<?php


$error = '';
session_start();
if (isset($_POST['login_btn'])) {
    include('./db/connect.php');
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `signusr` WHERE mobile='$mobile' And password='$password'";
    $result = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_assoc($result);
    if ($fetch) {
        $_SESSION['data'] = $fetch;
        header("Location: usrdashboard/dashboard.php");
    } else {
        $error = "Invailed Login Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<?php include('head.php'); ?>
<script src="./css/sweetAlert.js"></script>




<body>
    <?php include('logic.php'); ?>
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>
    <div class="signup_login_main">
        <div class="index_text_main">
            <h1 class="index_text_heading">Welcome to Patna Metro</h1>
            <p>
                Namaste and welcome to Patna Metro Rail Corporation! Here you will find all the latest and updateed information about the metro, Indian railways, recruitment, exam results and other news information from India.
            </p>
            

            
        </div>
        <section class="forms-section">
            <div class="forms">

                <!-- login -->
                <div class="form-wrapper is-active">
                    <button type="button" class="switcher switcher-login">Login<span class="underline"></span></button>
                    <form class="form form-login" method="post">
                        <div class="input-block">
                            <label for="login-number">Mobile No.</label>
                            <input type="number" name="mobile" placeholder="Number" id="logmobileid" oninput="lgoRestrictPhoneNumber()" required>
                        </div>
                        <div class="input-block">
                            <label for="login-password">Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="input-block">
                            <p class="error_show"><?php echo $error ?></p>
                        </div>
                        <button type="submit" class="btn-login" name="login_btn">Login</button>
                    </form>
                </div>
                <!-- signup  -->
                <div class="form-wrapper">
                    <button type="button" class="switcher switcher-signup">
                        Sign Up
                        <span class="underline"></span>
                    </button>
                    <form class="form form-signup" method="post">
                        <input type="number" name="app_status" value="0" hidden>
                        <div class="input-block">
                            <label for="signup-name">Name</label>
                            <input type="text" name="name" required>

                        </div>
                        <div class="input-block">
                            <label for="signup-email">E-mail</label>
                            <input type="email" name="email" required>

                        </div>
                        <div class="input-block">
                            <label for="signup-number">Number</label>
                            <input type="number" name="mobile" id="sinmobileid" oninput="sinRestrictPhoneNumber()" required>

                        </div>
                        <div class="input-block">
                            <label for="signup-password">Password</label>
                            <input id="signup-password" type="password" name="password" required>
                        </div>
                        <div class="input-block">
                            <label for="signup-password-confirm">Confirm password</label>
                            <input id="signup-password-confirm" type="password" name="cpassword" required>
                        </div>

                        <button type="submit" class="btn-signup" name="signup_btn" required>Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <div class="alert_box form_box_main">
            <div class="img_heading_container">
                <img class="success_icon" src="./assets/success.png" alt="alert_icon">
                <h3>Signup Success</h3>
            </div>
            <div class="popup_btn_container">
                <button class='btn btn-success'>Success</button>

            </div>
        </div>
    </div>
    <?php include('./footer.php'); ?>

    <?php include('./css/script.php'); ?>


</body>

</html>