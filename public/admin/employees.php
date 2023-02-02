<?php

session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Manage Employees";

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from employees where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Employee data deleted !!";
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
			  <p style="padding-left:10vw;color:#cb0c9f;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>

                <table class="table align-items-center mb-0" id="sample-table-1">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
					  <th class="text-secondary opacity-7">Address</th>
                      <th class="text-secondary opacity-7">Added On</th>
					  <th class="text-secondary opacity-7">Last Updated</th>
					  <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

<tbody>
<?php

$sql=mysqli_query($con,"select * from employees ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>

<td><?php echo $row['name'];?></td>
<td><?php echo $row['contactno'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['creationDate'];?></td>
<td><?php echo $row['updationDate'];?></td>
<td>
<div class="visible-md visible-lg hidden-sm hidden-xs">
<a href="edit-employee.php?id=<?php echo $row['id'];?>"
 class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit">
 Edit</a>
<a href="employees.php?id=<?php echo $row['id']?>&del=delete"
 onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips"
  tooltip-placement="top" tooltip="Remove">Delete</a>
												</div>
</td>



</tr>
<?php
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>


</div>

</div>
</div>
</div>
</div>
</div>

<div style="margin-left:10vw;height:30vh;"></div>

			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
