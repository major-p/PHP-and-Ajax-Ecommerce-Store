<?php
session_start();
error_reporting(0);
include('../../../configuration/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {

    $vid=$_GET['viewid'];

    $paid=$_POST['paid'];
        $balance=$_POST['balance'];
    $status=$_POST['status'];

    $query=mysqli_query($con,"Update payments set paid='$paid',balance='$balance'
     WHERE patientID='$vid' ");
    if($query)
    {

    echo '<script>alert("Payment has been Entered.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }


}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Records | Manage Patients</title>

		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Records | Manage Patients</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Records</span>
</li>
<li class="active">
<span>Manage Patients</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
<div style="padding-left:85%; padding-bottom:10px;">

</div>
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Patient Details</td></tr>

    <tr>
    <th scope>Patient Name</th>
    <td><?php  echo $row['PatientName'];?></td>
    <th scope>Patient Email</th>
    <td><?php  echo $row['PatientEmail'];?></td>
  </tr>
  <tr>
    <th scope>Patient Mobile Number</th>
    <td><?php  echo $row['PatientContno'];?></td>
    <th>Patient Address</th>
    <td><?php  echo $row['PatientAdd'];?></td>
  </tr>
    <tr>
    <th>Patient Gender</th>
    <td><?php  echo $row['PatientGender'];?></td>
    <th>Patient Age</th>
    <td><?php  echo $row['PatientAge'];?></td>
  </tr>
  <tr>

    <th>Patient Medical History(if any)</th>
    <td><?php  echo $row['PatientMedhis'];?></td>
     <th>Patient Reg Date</th>
    <td><?php  echo $row['CreationDate'];?></td>
  </tr>

<?php }?>
</table>


<?php

$ret=mysqli_query($con,"select * from payments  where PatientID='$vid' AND status='Confirmed' ");



 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >payment History</th>
  </tr>
  <tr>
    <th>#</th>
<th>Total Amount</th>
<th>Amount Paid</th>
<th>Balance</th>
<th>Description</th>
<th>Status</th>
<th>Payment Date</th>
<th>Action</th>
</tr>
<?php
while ($row=mysqli_fetch_array($ret)) {
  $bal = ($row['amount']-$row['paid']);
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td>&#8358; <?php  echo $row['amount'];?></td>
 <td>&#8358; <?php  echo $row['paid'];?></td>
 <td>&#8358; <?php  echo $bal; ?></td>
  <td><?php  echo $row['description'];?></td>
  <td><?php  echo $row['status'];?></td>
  <td><?php  echo $row['creationDate'];?></td>
  <td>    <button
      style="background-color:blue;
      color:white;
      font-size: 15px;
      padding:10px 15px;
      border-style: none;
      border-radius:5px;
      "><a
      a style="color:white;"
      href="edit-deposit.php?did=<?php echo $row['id'];?>"><i class="fa fa-edit"></i> Deposit
   </button>
    </td>
</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<p align="center">
<!--//<button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Payment</button></p> -->


<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
    <?php

        $ret=mysqli_query($con,"select * from payments  where PatientID='$vid'");

        while ($row=mysqli_fetch_array($ret)) {

     ?>



                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                   <tr>
                                 <th>Bill Status :</th>
                                 <td>
                                 <h5>  <button
                                    style="background-color:blue;
                                    color:white;
                                    font-size: 15px;
                                    padding:10px 15px;
                                    border-style: none;
                                    border-radius:5px;
                                    "><?php  echo $row['status'];?>
                                 </button> </h5></font>
                                 </td>
                                 </tr>
      <tr>
    <th>Total Bill :</th>
    <td>
   <h3> &#8358; <?php  echo $row['amount'];?> </h3></font>
</td>
  </tr>
  <tr>
<th>Description:</th>
<td> <h3><?php  echo $row['description'];?> </h3></font> </td>
    </tr>
      <?php }?>
     <tr>
    <th>Amount Paid :</th>
    <td>
    <input name="paid" placeholder="Amount Paid" class="form-control wd-450" required></td>
  </tr>

     <tr>
    <th>Balance :</th>
    <td>
      <input name=balance placeholder="Balance(If Any)" class="form-control wd-450" required></td>
</td>
  </tr>

</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Submit</button>

  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->

			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>

			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
