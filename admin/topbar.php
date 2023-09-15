<style>
.logo_icon{
  width: 80%;
}
.logout_main{
	width: 75%;
    margin: 2vw;
    /* background: aliceblue; */
    text-align: right;
}
</style>

<nav class="navbar navbar-light bg-white" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12 my-3" style="display: flex; align-items: center; height:6vh">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo_div">
  				  <img src="./assets/logo/logo.jpg" alt="logo" class="logo_icon">
  				
  			</div>
  		</div>
        <large><b>PMRC-Admin Panel</b></large>
	  	<div class="logout_main">
	  		<a href="ajax.php?action=logout" class="text-black"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>