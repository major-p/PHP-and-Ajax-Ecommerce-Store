<?php
include "../config/config.php";
error_reporting(0);

include 'includes/header.php';  
?>


<!-------------------------------------user sign up form starts here------------------------------------>
	<!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Sign Up</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Sign Up</li>
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
           <div class="row">
           <div id="signupmsg" style="width:100%;padding:10px;text-align:center;" ></div>

        <div class="col-md-6 d-flex">
         <div class="card flex-grow-1 mb-md-0">
           
         <div class="card-body">

						<form action="#" id="contact_form">
							<div class="form-group">
              <label>First Name</label>
								<input type="text" class="form-control" id="f_name" name="f_name" placeholder="FirstName">
                </div>
                <div class="form-group">
                <label>Last Name </label>
								<input type="text"  class="form-control" id="l_name" name="l_name" placeholder="LastName" >
                </div>
                <div class="form-group">
                <label> Email</label>
								<input type="email"  class="form-control" id="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
              <label> Mobile Number</label>
              <input type="text"  class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
              </div>

              </div> </div>
            </div>
              <div class="col-md-6 d-flex mt-4 mt-md-0">
                <div class="card flex-grow-1 mb-0">
                  <div class="card-body">
                    
                <div class="form-group">
                <label>Address </label>
              <input type="text"  class="form-control" id="address1" name="address1" placeholder="Address" >
              </div>
                <div class="form-group">
                  Delivery Address
              <input type="text"  class="form-control" id="address2" name="address2" placeholder="Delivery Address" >
							</div>

              <div class="form-group ">
              <label> Password</label>
              <input type="text"  class="form-control" id="pass" name="pass" placeholder="Password">
              </div>
                <div class="form-group">
                <label style="color:#c00000"> Confirm Password</label>
                  <input type="text"  class="form-control" id="repass" name="repass" placeholder="Repeat Password" >
							</div>


                    </div>
                 
                    </form>
                    </div>
                </div>
       <div class="container" 
       style="display:flex;flex-direction:row
       ;flex-wrap:wrap;justify-content:space-between;">
                <div style="width:350px;">
                <button class=" btn btn--small-wide custom-button"
                 id="signup" name="signup" >SignUp</button>
                </div>
                <div style="width:350px;margin-top:20px;">
                Already Have an Account?
            <a href="login_form.php" style="color:#c00000;" >Sign Up</a>
            </div>

        </div>
        

    </div>
</div>
<br><br><br>

<?php
include 'includes/footer.php';   
?>
