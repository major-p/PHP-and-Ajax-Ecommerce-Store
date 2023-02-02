<?php
session_start();
error_reporting(0);
include('../config/config.php');
include 'includes/header.php';   
?>
<?php 
$uname=$_SESSION['dlogin'];
$uid=$_SESSION['id'];

?>
    

	<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Catalog</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">	
								<div class="input-checkbox" id="get_category">
									
								</div>								
							</div>
						</div>
						<!-- /aside Widget -->

					
	                    <!-- aside Widget -->
                             <div class="aside">
							<h3 class="aside-title">Brands</h3>
							<div class="checkbox-filter">	
								<div class="input-checkbox" id="get_brand">
									
								</div>								
							</div>
						</div>
						<!-- /aside Widget -->
						

						<!-- aside Widget -->
						<div class="aside desktop-top-selling">
							<h3 class="aside-title">Top selling</h3>
                            <?php   
$product_query="SELECT * FROM products WHERE `product_cat_id`='10' ORDER BY RAND() DESC LIMIT 3"  ;
$result=mysqli_query($con,$product_query);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){

    $product_id=$row['product_id'];
    $product_cat_id=$row['product_cat_id'];
    $product_brand_id=$row['product_brand_id'];
    $product_title=$row['product_title'];
    $product_price=$row['product_price'];
    $product_desc=$row['product_desc'];
    $product_image=$row['product_image'];
    $product_keywords=$row['product_keywords'];
    $product_tag=$row['product_tag'];
    $product_availability=$row['availability'];
	$product_old_price=$product_price*1.08;

?>

							<div class="product-widget">
							<a href='product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>'>
								<div class="product-img">
									<img src="admin/uploads/<?php echo $product_image; ?>" alt="">
								</div>
  							</a>
								<div class="product-body">
									<p class="product-category">
                                    <?php 
							 $cat_query="SELECT * FROM categories WHERE cat_id='$product_cat_id' ";
							 $result2=mysqli_query($con,$cat_query);
							
							 if(mysqli_num_rows($result2)>0){
							  while ($row2=mysqli_fetch_array($result2)) {
								// print_r($row);
								$cat_id=$row2['cat_id'];
								$cat_name=$row2['cat_title'];
						 
							?>
							<?php echo $cat_name ?>
							<?php }} ?>
	                            </p>
                                <h3 class="product-name">
											<a href="product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>">
											<?php echo $product_title; ?>
										    </a></h3>
											<h4 class='product-price'>&#8358;<?php echo $product_price; ?> 
	                          	<del class='product-old-price'>&#8358;<?php echo $product_old_price; ?></del></h4>

								</div>
							</div>
                            <?php } } ?>

						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
					

						<!-- store products -->
						<div class="row" id="get_products">
							
						



						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty"></span>
 <!------------------------------pagination number will be shown here----------------->

							<ul class="store-pagination" id="pageno">
								
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


<?php
include 'includes/footer.php';   
?>
						 

                            
				