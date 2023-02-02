<?php
session_start();
error_reporting(0);
include('../config/config.php');
include 'includes/header.php';   
?>
<?php 
$user_id=$_SESSION['userid'];
?>

<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Phone<br>Collection</h3>
								<a href="products.php?cid=7" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="" height="240">
							</div>
							<div class="shop-body">
								<h3>Router<br>Collection</h3>
								<a href="products.php?cid=7" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Wireless Device<br>Collection</h3>
								<a href="products.php?cid=10" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


	<!-- SECTION -->
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a  href="catalog.php">See all</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div  class=" active">
									<div class="products-slick"  data-nav="#slick-nav-1">
									<?php   
$product_query="SELECT * FROM products  ORDER BY product_id DESC LIMIT 10 "  ;
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
<div class='product' style="min-height:300px;">
<a href='product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>'>
      <div class='product-img product-img-home'>
        <img src='admin/uploads/<?php echo $product_image; ?>' alt=''>
        <div class='product-label'>
		<?php 
                                        if(is_null($product_tag)){
                                            // Code Here
                                         }else{
                                           
                                            ?>
											  <span class='new'><?php echo $product_tag; ?></span>
                                        <?php } ?>
        
        </div>
      </div>
										 </a>
      <div class='product-body'>
        <p class='product-category'>
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
        <h3 class='product-name'>
		<a href='product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>'>
		<?php echo $product_title; ?>
	    </a>
	    </h3>
        <h4 class='product-price'>&#8358;<?php echo $product_price; ?> 
		<del class='product-old-price'>&#8358;<?php echo $product_old_price; ?></del></h4>
      </div>
      <div class='add-to-cart'>
	  <?php 
                                        if($product_availability=="In Stock"){
                                            ?>
										<button class='add-to-cart-btn' pid='<?php echo $product_id; ?>' id="product"><i class='fa fa-shopping-cart'></i> add to cart</button>
                                       <?php
                                         }else{   
                                        ?>
                                     <button class="add-to-cart-btn" 
									 style="color:#fff;cursor: not-allowed;" disabled><?php echo $product_availability; ?></button>
                                       <?php
                                         }
                                        ?> 

      </div>
    </div>
										

<?php   
}} ?> 									


									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->  

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="catalog.php">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->


	
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
							<?php   
$product_query="SELECT * FROM `products`  ORDER BY RAND() LIMIT 3"  ;
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
								<!-- product widget -->
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
									<!-- /product widget -->

									<?php   
}} ?>

								

							
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Phones</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
							<?php   
$product_query="SELECT * FROM products WHERE `product_cat_id`='7' ORDER BY RAND() DESC LIMIT 3"  ;
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
								<!-- product widget -->
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
								<!-- /product widget -->

								<?php   
}} ?>

								

							
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Accessories</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
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
								<!-- product widget -->
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
								<!-- /product widget -->

								<?php   
}} ?>


							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	<!-- SECTION -->
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Most Viewed Today</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a  href="catalog.php">See all</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div  class=" active">
									<div class="products-slick"  data-nav="#slick-nav-1">
									<?php 
$now = date('Y-m-d');  
$product_query="SELECT * FROM products WHERE date_view='$now' ORDER BY counter DESC LIMIT 10"  ;
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
<div class='product' >	
		<a href='product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>'>
      <div class='product-img product-img-home'>
        <img src='admin/uploads/<?php echo $product_image; ?>' alt=''>
        <div class='product-label'>
		<?php 
                                        if(is_null($product_tag)){
                                            // Code Here
                                         }else{
                                           
                                            ?>
											  <span class='new'><?php echo $product_tag; ?></span>
                                        <?php } ?>
        
        </div>
      </div>
	 </a>
      <div class='product-body'>
        <p class='product-category'>
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
					
        <h3 class='product-name'>
		<a href='product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>'>
		<?php echo $product_title; ?>
	    </a>
	    </h3>
        <h4 class='product-price'>&#8358;<?php echo $product_price; ?> 
		<del class='product-old-price'>&#8358;<?php echo $product_old_price; ?></del></h4>
      </div>
      <div class='add-to-cart'>
	  <?php 
                                        if($product_availability=="In Stock"){
                                            ?>
										<button class='add-to-cart-btn' pid='<?php echo $product_id; ?>' id="product"><i class='fa fa-shopping-cart'></i> add to cart</button>
                                       <?php
                                         }else{   
                                        ?>
                                     <button class="add-to-cart-btn"
									  style="color:#fff;cursor: not-allowed;" disabled><?php echo $product_availability; ?></button>
                                       <?php
                                         }
                                        ?> 

      </div>
    </div>
	<?php   
}}else{ ?>


<div class="col-12 item empty-wrapper">
<p class="home-empty">No product has been viewed today</p>
<img src="img/empty.png" class="empty">
</div>

<?php }?>
          

									</div>
									
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->  


		
<?php
include 'includes/footer.php';   
?>
						 

                            
				