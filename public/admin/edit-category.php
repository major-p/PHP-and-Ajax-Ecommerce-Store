<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Edit Category";
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
	$title=$_POST['category'];
		$id=intval($_GET['id']);
	$sql=mysqli_query($con,"update categories set cat_title='$title',
	updationDate='$currentTime' where cat_id='$id'");
 if($sql)
 {
 $msg="Category Updated Successfully !!";

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
              <h6><a href="add-brand.php" class="btn btn-o btn-primary">
              Edit Category</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
			  <p style="padding-left:10vw;color:#cb0c9f;">	<?php if($msg) { echo htmlentities($msg);}?></p> 



								<?php
			$id=intval($_GET['id']);
			$query=mysqli_query($con,"select * from categories where cat_id='$id'");
			while($data=mysqli_fetch_array($query))
			{
			?>

<div class="form-group text-box" >


<h4><?php echo htmlentities($data['cat_title']);?>'s Details</h4>
<p><b>Category Creation Date: </b><?php echo htmlentities($data['creationDate']);?></p>
<?php if($data['updationDate']){?>
<p><b>Category's Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
<hr />
<form role="form"  method="post" action="">


      <div class="form-group">
  <label for="doctorname">
  Category Name
</label>
<input type="text" name="category" class="form-control" value="<?php echo htmlentities($data['cat_title']);?>" >
          </div>


   

													<br><br>



														<?php } ?>


														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
												
              </div>
            </div>
          </div>
        </div>
      </div>




<?php include('include/footer.php');?>
