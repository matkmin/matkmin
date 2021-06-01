<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>

  <body>
      <div class="form">
	  	 <div class="imgcontainer">
    <img src="logo.jpg" alt="Avatar" class="avatar">
		</div>
        <div class="login">
          <div class="login-header">
            <h3>SYSTEM INVENTORY MANAGEMENT KEDAI BUNDLE</h3>
            <p><strong>Please enter your credentials to login.</strong></p>
          </div>
        </div>
        <form method="post" action="auth.php" class="clearfix">
		  <label for="username" class="control-label">Username</label>
          <input type="username" name="username" required onkeyup="this.setAttribute('value', this.value);" value="" placeholder="Enter username">
		  <label for="Password" class="control-label">Password </label>
          <input type="password" name="password" required value=""
             onkeyup="this.setAttribute('value', this.value);"
             pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password">
		  <?php echo display_msg($msg); ?>
          <button type="submit" class="btn btn-info  pull-right">Login</button>  &nbsp; 
          <p class="message">Only STAFF and SUPPLIER with active status are allowed to login to this system. For any enquires, please
		  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">CLICK HERE</a> to contact us</p>
        
		</form>
      </div>
    
</body>
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Contact Us</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
         <h5>Administartion</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 100%;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background:#ffe6b3;
  opacity: 0.9;
  max-width: 525px;
  margin: 0 auto 100px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #1a1100;
  font-size: 12px;
  text-align:center;
}
.form .message a {
  color: #00b300;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
 
  background-image: url("background.jpg");
  no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  margin:50px 0px; padding:0px;
    text-align:center;
    align:center;

  
}
img.avatar {
  width: 40%;
  border-radius: 50%;

}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
   opacity: 0.7;
}
.label
{
	text-align: left;
	
}
p{
	text-align:left;
}
h5{
	text-align:left;
}
</style>
<?php include_once('layouts/footer.php'); ?>
