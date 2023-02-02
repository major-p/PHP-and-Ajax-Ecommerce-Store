

<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Edit Item";



if(isset($_GET) & !empty($_GET)){
	$pid=intval($_GET['id']);// get product id
}else{
		echo "<script>window.location.href='products.php';</script>";
	}

	if(isset($_POST) & !empty($_POST)){
		$category = mysqli_real_escape_string($con, $_POST['category']);
		$brand = mysqli_real_escape_string($con, $_POST['brand']);
		$stock = mysqli_real_escape_string($con, $_POST['stock']);
		$productname = mysqli_real_escape_string($con, $_POST['productName']);
		$productprice = mysqli_real_escape_string($con, $_POST['productprice']);
		$productkeywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
		

			
		$sql = "UPDATE products SET product_title='$productname', product_cat_id='$category', product_price='$productprice',stock='$stock',
		product_brand_id='$brand',product_keywords='$productkeywords' WHERE product_id = $pid";		$res = mysqli_query($con, $sql);
		if($res){
			$smsg = "Item Updated";
		}else{
			$fmsg = "Failed to Update Item";
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
              <h6><a href="add-category.php">
              Edit Item</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
		<p style="padding-left:10vw;color:#cb0c9f;">
		<?php if(isset($fmsg)){ ?><?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?> <?php echo $smsg; ?> </div><?php } ?>
			
         
							<?php $query3=mysqli_query($con,"SELECT * FROM products WHERE product_id=$pid");
while($r=mysqli_fetch_array($query3))
{?>
              <div class="table-responsive p-0" >
			

			 <div class="text-box">									<br />
<h4> Edit <?php echo $r['product_title']; ?></h4>
			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<div class="form-group">
<label class="" for="basicinput">Category</label>
<div class="">
<select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
<?php $query=mysqli_query($con,"select * from categories");
while($row=mysqli_fetch_array($query))
{?>
<option value="<?php echo $row['cat_id']; ?>" <?php if( $row['cat_id'] == $r['cat_id']){ echo "selected"; } ?>><?php echo $row['cat_title']; ?></option>

<?php } ?>
</select>
</div>
</div>

<div class="form-group">
<label class="" for="basicinput">Brand</label>
<div class="">
<select name="brand" class="form-control" required>
<?php $query=mysqli_query($con,"select * from brands");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['brand_id']; ?>" <?php if( $row['brand_id'] == $r['brand_id']){ echo "selected"; } ?>><?php echo $row['brand_title']; ?></option>
<?php } ?>
</select>
</div>
</div>
									
<div class="form-group">
<label class="control-label" for="basicinput"> Name</label>
<div class="">
<input type="text" class="form-control" name="productName"  value="<?php echo $r['product_title']; ?>" class="span8 tip" required>
</div>
</div>

<div class="form-group">
<label class="control-label" for="basicinput"> Price</label>
<div class="">
<input type="text"   class="form-control"  name="productprice"  value="<?php echo $r['product_price']; ?>" class="span8 tip" required>
</div>
</div>


<div class="form-group">
<label class="control-label" for="basicinput"> Qty in Stock</label>
<div class="">
<input type="number"   class="form-control"  name="stock"  value="<?php echo $r['stock']; ?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Keywords</label>
<div class="controls">
<input type="text" class="form-control"   name="product_keywords"  value="<?php echo $r['product_keywords']; ?>" class="span8 tip" required>
</div>
</div>



<div class="form-group">
			    <label for="productimage">Image</label>
			    <?php if(isset($r['product_image']) & !empty($r['product_image'])){ ?>
			    <br>
			    	<img src="../admin/uploads/<?php echo $r['product_image'] ?>" widht="100px" height="100px">
			    	<a href="delproductimg.php?id=<?php echo $r['product_id']; ?>">Delete Image</a> <br>
					<a href="updateproductimg.php?id=<?php echo $r['product_id']; ?>" 
					style="margin-left:70px;">Update Image</a>

			    <?php }else{ ?>
			    
					<a href="updateproductimg.php?id=<?php echo $r['product_id']; ?>">Add Image</a>

			    <?php  }?>
			  </div>

			 
	<div class="">
											<div class="form-group">
												<button type="submit" name="submit" class="btn btn-o btn-primary" >Update Item</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<?php }?>
						
						
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
