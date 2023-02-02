<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Add Employee";

if(isset($_POST['submit']))
{
$nurse_name=$_POST['name'];
$nurse_address=$_POST['address'];
$nurse_contactno=$_POST['contact'];
$nurse_email=$_POST['email'];
$password=md5($_POST['npass']);
$sql=mysqli_query($con,"insert into employees(name,address,contactno,email,password)
 values('$nurse_name','$nurse_address','$nurse_contactno','$nurse_email','$password')");
if($sql)
{
echo "<script>alert('Employees's info added Successfully');</script>";
echo "<script>window.location.href ='employees.php'</script>";

}
}


?>


	
<?php include('include/header.php');?>
		
		<?php include('include/sidebar.php');?>
		
		<div class="container-fluid py-4">
			  <div class="row">
				<div class="col-12">
				  <div class="card mb-4">
					<div class="card-header pb-0">
					  <h6><a href="add-employee.php" class="btn btn-o btn-primary">
					  Add Employee</a>
					  </h6>
					</div>
					<div class="card-body px-0 pt-0 pb-2">
					  <div class="table-responsive p-0">
					  <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
										<?php echo htmlentities($_SESSION['msg']="");?></p>

										<div class="form-group text-box">




<form role="form" name="adddoc" method="post" onSubmit="return valid();">


<div class="form-group">
<label for="doctorname">
 Name
</label>
<input type="text" name="name" class="form-control"  placeholder="Enter Employee's Name" required>
</div>


<div class="form-group">
<label for="address">
 Address
</label>
<textarea name="address" class="form-control"  placeholder="Enter Employee's Address" required></textarea>
</div>


<div class="form-group">
<label for="contact">
 Contact no
</label>
<input type="text" name="contact" class="form-control"  placeholder="Enter Employee's Contact no" required>
</div>

<div class="form-group">
<label for="fess">
Employee's Email
</label>
<input type="email" id="email" name="email" class="form-control"  placeholder="Enter Employee's Email id" required onBlur="checkemailAvailability()">
<span id="email-availability-status"></span>
</div>


<div class="form-group">
<label for="exampleInputPassword1">
 Password
</label>
<input type="password" name="npass" class="form-control"  placeholder="New Password" required>
</div>

<div class="form-group">
<label for="exampleInputPassword2">
Confirm Password
</label>
<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required>
</div>

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>

											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->






						<!-- end: SELECT BOXES -->

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
	<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability_nurse.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>		<!-- end: FOOTER -->
