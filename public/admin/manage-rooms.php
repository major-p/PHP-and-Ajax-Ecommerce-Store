<?php
session_start();
error_reporting(0);
include('../../../configuration/config.php');
include('include/checklogin.php');
check_login();



if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from rooms where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Room  Deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Records | Manage Rooms</title>

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

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Records | Manage Rooms</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Records</span>
									</li>
									<li class="active">
										<span>Manage Rooms</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">


									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Rooms</span></h5>
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th><center>#</center></th>
											<th>Room Type</th>
											<th>Room Number </th>
											<th>Number of Beds</th>
											<th>Room Tariff</th>
											<th>Occupants</th>
												<th>Status</th>
											<th>Creation Date</th>
											<th>Actions</th>

											</tr>
										</thead>
										<tbody>

<?php $query=mysqli_query($con,"SELECT * FROM rooms ");
$cnt=1;

$revcountsql = "SELECT count(*) AS count FROM admissions a JOIN rooms r
 WHERE r.id=a.roomId AND a.status='Admitted'";
$revcountres = mysqli_query($con, $revcountsql);
$revcountr = mysqli_fetch_assoc($revcountres);
while($row=mysqli_fetch_array($query))
{
?>
											<tr>


												<td><?php echo htmlentities($cnt);?></td>
						   								<td><?php echo htmlentities($row['type']);?></td>
															<td><?php echo htmlentities($row['number']);?></td>
															<td> <?php echo htmlentities($row['beds']);?></td>
															<td>&#8358;<?php echo htmlentities($row['fee']);?></td>
 															<td><?php echo $revcountr['count']; ?></td>
<td>	<?php if($row['status']=='Available'){?>
<button class="btn btn-primary waves-effect waves-light w-lg"
style="background:green; color:white; border:none;">
	<?php echo htmlentities($row['status']);?>
</button></a>
<?php } else {?>
<button class="btn btn-primary waves-effect waves-light w-lg"
style="background:red; color:white; border:none;" >	<?php echo htmlentities($row['status']);?></button>
<?php } ?>
</td>
																							<td><?php echo htmlentities($row['creationDate']);?></td>

												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="edit-room.php?roomid=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>

	<a href="manage-room.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>

											<?php
$cnt=$cnt+1;
											 }?>


										</tbody>
									</table>
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
