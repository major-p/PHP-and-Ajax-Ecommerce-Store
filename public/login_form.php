<?php

#this login_form.php page will not shown to the user when he will logged in.if user is already logged in then he wil be redirected to the profile.php page
if(isset($_SESSION['userid'])){
header("Location:index.php");
}

#here we will fetch data from action.php page's ready to checkout button.
#when user clicked on ready to checkout button that time we pass all data in form of form in action.php page.
#we will get those data here.
if(isset($_POST['login_user_with_product'])){
    #here data will be in array formand we are going to make use of cookies here.
    #since cookie can't store array data so we will covert these array data into json format

    $product_list=$_POST['pid'];//this $product_list is an array

    $json_e=json_encode($product_list);//here we are converting array into json format because array cannot be store in cookie

    //here we are creating cookie and name of cookie is product_list,WE WILL USE IT AT login.php page
    setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);
}


?>

<?php
include "../config/config.php";
error_reporting(0);

include 'includes/header.php';  
?>

	<!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Sign In</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Sign In</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

  <!-- site__body -->
  <div class="site__body">
       
           <div class="block">
           <div class="container">

		
        <div class="col-md-6 d-flex">
         <div class="card flex-grow-1 mb-md-0">
         <div class="card-body">
        <h3 class="card-title">Login</h3>

         <div id="login_msg" style="width:100%;padding:10px;text-align:center;"></div>

						<form onsubmit="return false" id="login" >
							<div class="form-group">
							<label>Email address</label>
								<input type="text" id="loginemail" name="loginemail" class="form-control" placeholder="Enter your email address" required="required">
							</div>
							<div class="form-group">
							<label>Password</label>
								<input type="password" id="password" name="password" class="form-control"  placeholder="Enter your password">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn--small-wide custom-button" value="Login" 
                >Sign In</button>
							</div>
						</form>
            <br>
            Don't have an account?
            <a href="customer_register_form.php?register=1" >Create New Account</a>

					</div>
				</div>

			</div>
		</div>
		<div class="panel"></div>
	</div>


<!-----------------if user is not logged in then he will come here from ready to checkout button with product list here----------------->


<?php
include 'includes/footer.php';   
?>
