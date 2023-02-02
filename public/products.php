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
						<h3 class="breadcrumb-header">Categories</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">
                            <?php 
$cid=$_GET['cid'];//product category ID
$product_query="SELECT * FROM categories WHERE cat_id='$cid' "  ;
$result=mysqli_query($con,$product_query);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $cat_id=$row['cat_id'];
    $cat_name=$row['cat_title'];
?>
                 <?php echo $cat_name; ?>

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
                      
<!--Collection Tab slider-->
<div class="tab-slider-product section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:-50px;">
                        <div class="section-header text-center">
                            <h2 class="h3">
                                Our Catalog for 
                                <?php 
$cid=$_GET['cid'];//product category ID
$product_query="SELECT * FROM categories WHERE cat_id='$cid' "  ;
$result=mysqli_query($con,$product_query);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $cat_id=$row['cat_id'];
    $cat_name=$row['cat_title'];
?>
                 <?php echo $cat_name; ?>
					<?php }}?>
                            </h2>
                            <p>Browse through our latest products</p>
                        </div>

<?php 
//-------------pagination starts here-------------------
if(isset($_POST['page'])){
    $sql="SELECT * FROM products";
    $result=mysqli_query($con,$sql);
    //follow line will give num of rows of products table.
    $count=mysqli_num_rows($result);
   
  // echo $count;
  //echo "<br/>";
  //we want to show 9 products on a page so we will devide it by 9.so we will get no of pages we required to show our all productts.
  //ceil function will convert float  value into integer
  $pageno=ceil($count/12);
  //echo $pageno;
  //pago no will be 6 ...means we required 6 pages to show our products
  
  for($i=1;$i<=$pageno;$i++){
   echo
           "<li class='page-item' >
           <a class='page-link' id='page' page='$i' href='#'>$i</a>
           </li>";
  }
  
  }//end of isset page-----------it just will give no of pages 
    
    $limit=12;
    if(isset($_POST['setpage'])){
      $pageno=$_POST['pageno'];
      $start=($pageno*$limit) - $limit;
    }else{
      $start=0;
    }
    $cid=$_GET['cid'];//product category ID
    $product_query="SELECT * FROM products WHERE product_cat_id='$cid'  LIMIT $start,$limit"  ;
    $result=mysqli_query($con,$product_query);
  
  echo "					";
  
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
  
        
        echo "           
        <div class='col-md-3 col-xs-6'>
        <div class='product'>
        <a href='product.php?id=$product_id&cid=$product_cat_id'>
            <div class='product-img'>
                <img src='admin/uploads/$product_image' alt=''>
                "?>
                <div class='product-label'>
                <?php 
                                        if(is_null($product_tag)){
                                            // Code Here
                                         }else{                        
                                            ?>
											  <span class='new'><?php echo $product_tag; ?></span>
                                        <?php } ?>
                </div> 
                <?php
                echo "
            </div>
            </a>
            <div class='product-body'>    
                <h3 class='product-name'><a href='product.php?id=$product_id&cid=$product_cat_id'>
                $product_title</a></h3>
                <h4 class='product-price'>&#8358;$product_price
                 <del class='product-old-price'>&#8358;$product_old_price;</del></h4>
            </div>
            <div class='add-to-cart'>
                <button class='add-to-cart-btn' pid='$product_id' id='product'><i class='fa fa-shopping-cart'></i> add to cart</button>
            </div>
        </div>
        </div>
        
        ";
      }
    }else{
      echo "
      <div class='no-product'>No product from this category found! </div>
      ";
    }

  //end of isset($_POST['products'])
  
?>


</div>

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

			</div>
		</div>
	</div>


<?php
include 'includes/footer.php';   
?>
						 

                            
				