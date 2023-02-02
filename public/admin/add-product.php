<?php ob_start(); ?>
<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Add Item";

	
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$brand=$_POST['brand'];
		$stock=$_POST['stock'];

	$productname=$_POST['productName'];
	$productprice=$_POST['productprice'];
	$productkeywords=$_POST['product_keywords'];
	$product_image=$_FILES["product_image"]["name"];
//for getting product id
$query=mysqli_query($con,"select max(product_id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="uploads";

	
    $target_dir = "../admin/uploads/";
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
$filename = $_FILES['product_image']['name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["product_image"]["tmp_name"]);
  if($check !== false) {
  
    $uploadOk = 1;
  } else {
    $msg = " file is not an image";

    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    $msg = "file already exists";

  $uploadOk = 0;
}

// Check file size
if ($_FILES["product_image"]["size"] > 500000) {
    $msg = "Sorry your file is too large";


  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg = "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
    $msg="Item image has been uploaded.";

  } else {
    $msg = "Sorry, there was an error uploading yourfile";

  
  }



$sql=mysqli_query($con,"insert into products(product_cat_id,product_brand_id,stock,product_title,product_price,product_keywords,product_image)
 values('$category','$brand','$stock','$productname','$productprice','$productkeywords','$product_image')");

if($sql)
{
$msg="New Item Added Successfully !!";

}


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
             
            </div>
            <div class="card-body px-0 pt-0 pb-2">
		<p style="padding-left:10vw;color:#cb0c9f;">	<?php if($msg) { echo htmlentities($msg);}?></p> 

              <div class="table-responsive p-0" >

          
									<?php if(isset($_POST['submit']))
{?>
								
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

<div class="text-box">									<br />
<h4> Upload a New Item</h4>
			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<div class="form-group">
<label class="" for="basicinput">Category</label>
<div class="">
<select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
<option value="">--Select Category--</option> 
<?php $query=mysqli_query($con,"select * from categories");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_title'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="form-group">
<label class="" for="basicinput">Brand</label>
<div class="">
<select name="brand" class="form-control" required>
<option value="">--Select Brand--</option> 
<?php $query=mysqli_query($con,"select * from brands");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['brand_id'];?>"><?php echo $row['brand_title'];?></option>
<?php } ?>
</select>
</div>
</div>
									
<div class="form-group">
<label class="control-label" for="basicinput"> Name</label>
<div class="">
<input type="text" class="form-control" name="productName"  placeholder="Enter Name of Item" class="span8 tip" required>
</div>
</div>

<div class="form-group">
<label class="control-label" for="basicinput"> Price</label>
<div class="">
<input type="text"   class="form-control"  name="productprice"  placeholder="Enter Item Price" class="span8 tip" required>
</div>
</div>
									
<div class="form-group">
<label class="control-label" for="basicinput"> Qty in Stock</label>
<div class="">
<input type="number" class="form-control" name="stock"  placeholder="Stock" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"> Keywords</label>
<div class="controls">
<input type="text" class="form-control"   name="product_keywords"  placeholder="Enter Keywords and seperate them with a comma(,)" class="span8 tip" required>
</div>
</div>


<div class="form-group">
<label class="control-label" for="basicinput">Image</label>
<div class="controls">
<input type="file"  name="product_image" id="product_image" value="" class="form-control" required>
</div>
</div>



	<div class="">
											<div class="form-group">
												<button type="submit" name="submit" class="btn btn-o btn-primary" >Upload Item</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>
