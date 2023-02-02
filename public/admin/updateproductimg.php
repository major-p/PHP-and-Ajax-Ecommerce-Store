<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Edit Image";
$currentTime = date('d-m-Y h:i:s A', time () );

$id=intval($_GET['id']);// product id

if(isset($_POST['submit']))
{
	$productname=$_POST['product_title'];

//$dir="productimages";
//unlink($dir.'/'.$pimage);
$target_dir = "../admin/uploads/";
$target_file =($_FILES["product_image"]["name"]);
$filename = $_FILES['product_image']['name'];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
$sql=mysqli_query($con,"update products set product_image='$target_file'  where product_id='$id' ");
$_SESSION['msg']="Product Image Updated Successfully !!";
}
?>

<?php include('include/header.php');?>
		
<?php include('include/sidebar.php');?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
           
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <br>
			  <p style="padding-left:10vw;color:#cb0c9f;">	
        <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
      </p> 



								<?php
			$id=intval($_GET['id']);
			$query=mysqli_query($con,"select * from products where product_id='$id'");
			while($row=mysqli_fetch_array($query))
			{
			?>

<form class="form-horizontal row-fluid"  method="post" enctype="multipart/form-data">


<div class="form-group text-box" >



<div class="control-group">
<label class="control-label" for="basicinput">Drink Name</label>
<div class="controls">
<?php echo htmlentities($row['product_title']);?>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Current  Image</label>
<div class="controls">
<img src="../admin/uploads/<?php echo htmlentities($row['product_image']);?>" width="200" height="100"> 
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">New Product Image</label>
<div class="controls">
<input type="file" name="product_image" id="product_image" value="" class="form-control" required>
</div>
</div>


<?php } ?>
<br><br>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-o btn-primary">Update Image</button>
											</div>
										</div>
									</form>
							</div>
						</div>

          </div>
        </div>
      </div>




<?php include('include/footer.php');?>
