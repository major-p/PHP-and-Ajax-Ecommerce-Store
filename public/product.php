<?php
include "../config/config.php";
session_start();
error_reporting(0);
include 'includes/header.php';  

if(!isset($_GET['id'])){
    echo "<script>window.location.href='index.php';</script>";
  }
  
$pid=$_GET['id'];//product ID
$cid=$_GET['cid'];//product category ID


//page view script starts here
 if(isset($_GET['id']))
 {
    $now = date('Y-m-d');
    $pid=intval($_GET['id']);

    $query="select * from products where product_id='$pid'";
    $query_run=mysqli_query($con,$query);
    $row = mysqli_fetch_array($query_run);
    $dateview=$row['date_view'];

    
    if($dateview == $now){
     $sql=mysqli_query($con,"UPDATE products SET counter=counter+1 WHERE product_id='$pid' ");
    }else{
        $sql=mysqli_query($con,"UPDATE products SET counter=1, date_view='$now' WHERE product_id='$pid' ");

    }
 
 }
//page view script ends here


?>
  

	<!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Product Details</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">
              <?php 
  $product_query="SELECT * FROM products WHERE product_id='$pid' "  ;
  $result=mysqli_query($con,$product_query);
  if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_cat_id=$row['product_cat_id'];
    $product_brand_id=$row['product_brand_id'];
    $product_title=$row['product_title'];

?>
                 <?php echo $product_title; ?>

					<?php }}?>

              </li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		
			<?php 

$product_query="SELECT * FROM products WHERE product_id='$pid' "  ;
$result=mysqli_query($con,$product_query);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){

    $product_id=$row['product_id'];
    $product_cat_id=$row['product_cat_id'];
    $product_brand_id=$row['product_brand_id'];
    $product_title=$row['product_title'];
    $product_price=$row['product_price'];
    $product_desc=$row['product_desc'];
    $product_stock=$row['stock'];
    $product_image=$row['product_image'];
    $product_keywords=$row['product_keywords'];
	  $product_availability=$row['availability'];
    $product_old_price=$product_price*1.08;
    
  
?>


<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="admin/uploads/<?php echo $product_image;?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->


          <!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="admin/uploads/<?php echo $product_image;?>" alt="">
							</div>

						</div>
					</div>
					<!-- /Product thumb imgs -->
		
          	<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $product_title;?></h2>
							<div>
															
            </div>
							<div>
								<h3 class="product-price">&#8358;<?php echo $product_price; ?> 
                 <del class="product-old-price">&#8358;<?php echo $product_old_price; ?> </del></h3>
                 <?php 
                                        if($product_availability=="In Stock"){
                                            ?>
                                             <span class="product-available"><?php echo $product_availability; ?></span> 
											<?php
                                         }else{
                                           
                                            ?>
                                             <span class="outstock hide"><?php echo $product_availability; ?></span>
                                        
                                        <?php
                                         }
                                        ?> 
							</div>
							<p><?php echo $product_desc; ?></p>

							

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
                <?php 
                                        if($product_availability=="In Stock"){
                                            ?>
                                            
                                                <button type="button"  pid='<?php echo $product_id; ?>' id="product" 
                                                class="add-to-cart-btn">
                                                    <span><i class="fa fa-shopping-cart"></i>Add to cart</span>
                                                </button>
                                            
                                       <?php
                                         }else{   
                                        ?>
                                                <button type="button" style="cursor: not-allowed;"
                                                class="add-to-cart-btn"><?php echo $product_availability; ?></button>
                                       <?php
                                         }
                                        ?>                        
                                          
							</div>

          

							<ul class="product-links">
								<li>Category:</li>
								<li>
                <?php 
							 $cat_query="SELECT * FROM categories WHERE cat_id='$product_cat_id' ";
							 $result=mysqli_query($con,$cat_query);
							
							 if(mysqli_num_rows($result)>0){
							  while ($row=mysqli_fetch_array($result)) {
								// print_r($row);
						 
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_title'];
						 
							?>
					<?php echo $cat_name ?>
							<?php }} ?>
                </li>
							</ul>

							<ul class="product-links">
								<li>Brand:</li>
								<li>
                <?php 
							 $cat_query="SELECT * FROM brands WHERE brand_id='$product_brand_id' ";
							 $result=mysqli_query($con,$cat_query);
							
							 if(mysqli_num_rows($result)>0){
							  while ($row=mysqli_fetch_array($result)) {
								// print_r($row);
						 
								$brand_id=$row['brand_id'];
								$brand_name=$row['brand_title'];				 
							?>
		<?php echo $brand_name ?>
							<?php }} ?>
                               
                </li>
							
							</ul>



                                        </div>

						
						</div>
					</div>
					<!-- /Product details -->

        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-details-img">
                                    <div class="product-thumb">
                                       
                                    </div>
                                    <div class="zoompro-wrap product-zoom-right pl-20">
                                       
                                        <?php 
                                        if(is_null($product_tag)){
                                            // Code Here
                                         }else{
                                           
                                            ?>
                                             <div class="product-labels"><span class="lbl pr-label1"><?php echo $product_tag; ?></span></div>
                                      <div class="product-labels rectangular">
                                    <span class="lbl pr-label1"><?php echo $product_tag; ?></span></div>
                                        <?php } ?>
                                       
                                        <div class="product-buttons">
                                            <a href="#" class="btn prlightbox" title="Zoom"><i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="lightboximages">
                                        <a href="admin/uploads/<?php echo $product_image;?>" data-size="1462x2048"></a>
                                       
                                    </div>
        
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product-single__meta">
                                       
                                        <div class="prInfoRow">
                                           
                                            
                                      
                                 
                                    <?php 
                                        if($product_availability=="In Stock"){
                                            ?>
             <div id="quantity_message">Hurry! Only  <span class="items"><?php echo $product_stock; ?></span>  left in stock.</div>

                                       <?php
                                         } 
                                        ?>
                                     
                                           
                                        </div>
                                        <!-- End Product Action -->
                                   <?php 
                                   // date_from must be from 3rd day (from order date)
                                   // date_to must be the next 5th days
                                    $date = date('Y-m-d');
                                    $today_date = date('l jS \of F Y');
                                    $three_day_from_today = date('j F, Y', strtotime($date . ' + 3 days'));
                                    $fifth_day_from_today = date('j F, Y', strtotime($date . ' + 5 days'));
                                    $seven_day_from_today = date('j F, Y', strtotime($date . ' + 7 days'));
                                    $seventh_day_from_today = date('l jS \of F Y ', strtotime($date . ' + 7 days'));
                                   ?>
                                
                                        
                                    <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                     ESTIMATED DELIVERY BETWEEN
                                     <b ><?php echo $today_date?></b> and <b id="toDate"><?php echo $seventh_day_from_today?></b>.</p>
                                    <div class="userViewMsg" data-user="20" data-time="11000">
                                        <i class="fa fa-users" aria-hidden="true"></i> 
                                        <strong class="uersView">14</strong> PEOPLE ARE ALSO LOOKING FOR THIS PRODUCT</div>
                                </div>
                        </div>
                    </div>
                                        </div>
                    <!--End-product-single-->
<?php }?>
		

			

        </div></div></div>                        

<?php }?>



<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Related Products</h3>
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
$product_query="SELECT * FROM products WHERE product_id !='$pid' AND product_cat_id = '$product_cat_id' 
ORDER BY RAND() LIMIT 10"  ;
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
<p class="home-empty">No related product found</p>
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

