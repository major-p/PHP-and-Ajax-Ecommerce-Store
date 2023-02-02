
<?php
ob_start();
include "../config/config.php";

$ip_add = getenv("REMOTE_ADDR"); //fetch ip address in PHP


if(isset($_POST['category'])){

    $cat_query="SELECT * FROM categories";
    $result=mysqli_query($con,$cat_query);
    

    echo " 		  
             ";
    if(mysqli_num_rows($result)>0){
     while ($row=mysqli_fetch_array($result)) {
       // print_r($row);

       $cat_id=$row['cat_id'];
       $cat_name=$row['cat_title'];

       echo   "
              
       <input type='checkbox' >
       <a class='category' href='#' cid='$cat_id'> 
									<label >
										<span></span>
										$cat_name
										<small>&nbsp;&nbsp;&nbsp;&nbsp; </small>
									</label>
                  </a>

              
              
              ";
             
            
              
            
           
        }   
        
    }
    echo "";

}//end of isset($_POST['category']--in HTML 5 U CAN SPECIFY UR QWN ATTRIBUTE LIKE E.G cid here...cid='$cat_id';

if(isset($_POST['brand'])){
  $brand_query="SELECT * FROM brands";
  $result=mysqli_query($con,$brand_query);

     echo "";

  if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_array($result)){
          $brand_id=$row['brand_id'];
          $brand_name=$row['brand_title'];
          echo "
                          
                      <a class='category brand brands' href='#' bid='$brand_id'>   
                      <label >
                      <span></span>
                      $brand_name
                      <small>&nbsp;&nbsp;&nbsp;&nbsp; </small>
                      </label>    
                      </a>
                          
                ";
      }
     }//end of if
     echo "";
}//end of  isset($_POST['brand']

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

if(isset($_POST['products'])){

  $limit=12;

  if(isset($_POST['setpage'])){
    $pageno=$_POST['pageno'];
    $start=($pageno*$limit) - $limit;
  }else{
    $start=0;
  }
  $product_query="SELECT * FROM `products`  LIMIT $start,$limit"  ;
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
      <div class='col-md-4 col-xs-6'>
      <div class='product'>
      <a href='product.php?id=$product_id&cid=$product_cat_id'>
          <div class='product-img'>
              <img src='admin/uploads/$product_image' alt=''>
              <div class='product-label'>
           
              <span class='new'>$product_tag</span>       
          
              </div>
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

  echo "";
}//end of isset($_POST['products'])



if(isset($_POST['get_selected_category'])){
  $cid=$_POST['cat_id'];

  $selected_product_query="SELECT * FROM products WHERE product_cat_id= '$cid'";
  $result=mysqli_query($con,$selected_product_query);

  echo "";
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){

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
     
     
<div class='col-md-4 col-xs-6'>
<div class='product'>
<a href='product.php?id=$product_id&cid=$product_cat_id'>
    <div class='product-img'>
        <img src='admin/uploads/$product_image' alt=''>
        <div class='product-label'>
     
        <span class='new'>$product_tag</span>       
    
        </div>
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

}
//end of isset($_POST['get_selected_category'])

if(isset($_POST['get_selected_brand'])){
  $bid=$_POST['brand_id'];

  $selected_product_query="SELECT * FROM products WHERE product_brand_id= '$bid'";
  $result=mysqli_query($con,$selected_product_query);

  echo "";
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){

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
           
<div class='col-md-4 col-xs-6'>
<div class='product'>
<a href='product.php?id=$product_id&cid=$product_cat_id'>
    <div class='product-img'>
        <img src='admin/uploads/$product_image' alt=''>
        <div class='product-label'>
     
        <span class='new'>$product_tag</span>       
    
        </div>
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
    <div class='no-product'>No product from this brand found! </div>
    ";
  }

}//end of isset($_POST['get_selected_brand'])


//-----------------query for search functionality---------------------------------------

if(isset($_POST['search'])){
  $searchword=$_POST['searchword'];

  $selected_product_query="SELECT * FROM products WHERE product_keywords LIKE '%$searchword%'";
  $result=mysqli_query($con,$selected_product_query);

  echo "<div class='row'>";
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){

      $product_id=$row['product_id'];
      $product_cat_id=$row['product_cat_id'];
      $product_brand_id=$row['product_brand_id'];
      $product_title=$row['product_title'];
      $product_price=$row['product_price'];
      $product_desc=$row['product_desc'];
      $product_image=$row['product_image'];
      $product_keywords=$row['product_keywords'];

      echo "
      <div class='col-md-6 col-lg-4' style='padding: 1%;'>
                           <div class='card'>
                               <div class='card-header'>$product_title</div>
                               <div class='card-body'>
                                   <img src='img/$product_image' class='card-img img-fluid' style='width:auto; height:40vh;'
                                    alt='$product_title'>
                               </div>
                               <div class='card-footer'>$ $product_price/-
                                <button class='btn btn-danger btn-sm' pid='$product_id' id='product' style='float: right;'>Add to cart</button>
                               </div>
                           </div>
                       </div>
      ";

    }
  }

}//end of isset($_POST['search'])


//----------------------------------add to cart code starts here-------------------------------
if(isset($_POST['addtoproduct'])){

  if(isset($_SESSION['userid'])){
/*====================if user is logged in then we will add product into cart with user_id and user ip_address=====================*/
   $p_id = $_POST['productid'];
   $user_id=$_SESSION['userid'];
  
   $sql="SELECT * FROM cart WHERE p_id='$p_id' AND user_id='$user_id'";
   $result=mysqli_query($con,$sql);
   if(mysqli_num_rows($result)>0){
     
     echo "<div class='alert alert-danger' role='alert'>
     Item already added to cart!
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
         </button>
     </div>";

   }else{

    $sql1="SELECT * FROM products WHERE product_id='$p_id'";
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)>0){
      $row=mysqli_fetch_array($result1);

      $pro_id = $row['product_id'];
      $pro_title= $row['product_title'];
      $pro_image= $row['product_image'];
      $pro_price= $row['product_price'];

    $sql2="INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`)
    VALUES ('$pro_id','$ip_add','$user_id','$pro_title','$pro_image',1,'$pro_price','$pro_price')";

    $result2=mysqli_query($con,$sql2);
    if($result2){
         
         echo "<div class='alert alert-success' role='alert'>
         $pro_title has been  added to cart
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        }
    }
   }
  }//if (isset($_SESSION['userid'])) ends
  else{
 /*====================if user is not logged in then we will add product into cart with user ip address,AND with user_id=-1=====================*/
            $p_id = $_POST['productid'];
            
            //$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
            $sql="SELECT * FROM cart WHERE p_id='$p_id' AND ip_add= '$ip_add' AND user_id = -1";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
              
              echo "<div class='alert alert-danger' role='alert'>
              Item already added to cart!
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
              </div>";
              exit();

 }else{
        $sql1="SELECT * FROM products WHERE product_id='$p_id'";
        $result1=mysqli_query($con,$sql1);
        if(mysqli_num_rows($result1)>0){
          $row=mysqli_fetch_array($result1);

          $pro_id = $row['product_id'];
          $pro_title= $row['product_title'];
          $pro_image= $row['product_image'];
          $pro_price= $row['product_price'];

        $sql2="INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`)
        VALUES ('$pro_id','$ip_add',-1,'$pro_title','$pro_image',1,'$pro_price','$pro_price')";

        $result2=mysqli_query($con,$sql2);
        if($result2){
            
            echo "<div class='alert alert-success' role='alert'>
            $pro_title has been  added to cart
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
            }
        }
        
 }
   
  }//end of else
}//if(isset($_POST['addtoproduct'])) ends


//----------------------------------add to cart code ends here-------------------------------





//----------------------------------get cart products on profile page & index page cart container-dropdown starts-------------------------------
if(isset($_POST['get_cart_products'])){
  if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];

    $sql="SELECT * FROM cart WHERE user_id='$user_id'  ";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
      $no=1;
      $total_amt=0;
          while($row=mysqli_fetch_array($result)){

            $pro_id=$row['p_id'];
            $pro_title=$row['product_title'];
            $pro_image=$row['product_image'];
            $pro_price=$row['price'];
            $pro_qty=$row['qty'];

            $price_array=array($pro_price);
            $total_sum=array_sum($price_array);
            $total_amt=$total_amt + $total_sum;



        echo " 
        <div class='product-widget'>
												<div class='product-img'>
                        <a href='product.php?id=$pro_id'>
													<img src='admin/uploads/$pro_image' alt='>
                          </a>
												</div>
												<div class='product-body'>
													<h3 class='product-name'><a href='product.php?id=$pro_id'> $pro_title</a></h3>
													<h4 class='product-price'><span class='qty'>1x</span>&#8358;$pro_price</h4>
												</div>
												<button class='delete'><i class='fa fa-close'></i></button>
											</div>
          
             ";

      $no=$no+1;
      }
      echo "
     
    <div class='cart-btns'>
      <a href='cart.php'>View Cart</a>
      <a href='cart.php'>Checkout  <i class='fa fa-arrow-circle-right'></i></a>
    </div>

    ";
    }else{
      echo "<div class='empty-cart' role='alert'>
      Your Cart is Empty
      </div>";
    }
  }else{
//if user is not logged in then we will do it with help of ip_address
$sql="SELECT * FROM cart WHERE user_id= -1 AND ip_add='$ip_add'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
  $no=1;
  $total_amt=0;
  while($row=mysqli_fetch_array($result)){

    $pro_id=$row['p_id'];
    $pro_title=$row['product_title'];
    $pro_image=$row['product_image'];
    $pro_price=$row['price'];
    $pro_qty=$row['qty'];

    $price_array=array($pro_price);
    $total_sum=array_sum($price_array);
    $total_amt=$total_amt + $total_sum;

            echo "
            <div class='product-widget'>
            <div class='product-img'>
            <a href='product.php?id=$pro_id'>
              <img src='admin/uploads/$pro_image' alt='>
              </a>
            </div>
            <div class='product-body'>
              <h3 class='product-name'><a href='product.php?id=$pro_id'> $pro_title</a></h3>
              <h4 class='product-price'><span class='qty'>1x</span>&#8358;$pro_price</h4>
            </div>
            <button class='delete'><i class='fa fa-close'></i></button>
          </div>

          
            ";

          $no=$no+1;    
    }
    echo "
    <div class='cart-btns'>
      <a href='cart.php'>View Cart</a>
      <a href='cart.php'>Checkout  <i class='fa fa-arrow-circle-right'></i></a>
    </div>
    ";

    }else{
      echo "<div class='empty-cart' role='alert'>
      Your Cart is Empty
      </div>";
    }
  }

}
//------------------------------------get cart products on profile page & index page cart container-dropdown ends----------------------------------

//-------------------get cart count on profile page &index page container starts here--------------------------

if(isset($_POST['cart_count'])){
  if(isset($_SESSION['userid'])){
       $user_id=$_SESSION['userid'];
 
       $sql="SELECT * FROM cart WHERE user_id='$user_id'";
       $result=mysqli_query($con,$sql);
       $count=mysqli_num_rows($result);
       echo $count;
     }else{
       //if user is not logged in then we will do it with help of ip_address
       $sql="SELECT * FROM cart WHERE user_id= -1 AND ip_add='$ip_add'";
       $result=mysqli_query($con,$sql);
       $count=mysqli_num_rows($result);
       echo $count;
     }
 }

//-------------------get cart count on profile page &index page container ends here--------------------------
//-----------------------------------|| cart.php-cart page starts here-----------------------------------------
if(isset($_POST['get_cart_products_list'])){
  if(isset($_SESSION['userid'])){
    $uid=$_SESSION['userid'];
  $sql="SELECT * FROM cart WHERE user_id='$uid'";
  }else{
    $sql="SELECT * FROM cart WHERE user_id=-1 AND ip_add='$ip_add'";
  }
  $result=mysqli_query($con,$sql);


  if(mysqli_num_rows($result)>0){
    echo "<form method='post' action='login_form.php' class='cart style2'>
    <div class='cart-container'>
    <table class='cart__table cart-table ' >
              <thead class='cart__row cart__header'>
                <tr class='cart-table__row'>
                  <th class='li-product-thumbnail'>
                    Image
                  </th>
                  <th class='li-product-name'>
                    Product
                  </th>
                  <th class='li-product-price'>
                    Price
                  </th>
                  <th class='li-product-quantity'>
                    Quantity
                  </th>
                  <th class='li-product-subtotal'>
                    Total
                  </th>
                  
				  <th class='cart-table__column cart-table__column--total'>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody class='cart-table__body' >
    
    ";
    $total_amt=0;
    while($row=mysqli_fetch_array($result)){

           $pid= $row['p_id'];
           $pro_title=$row['product_title'];
           $pro_image=$row['product_image'];
           $pro_qty=$row['qty'];
           $pro_price=$row['price'];
           $pro_total=$row['total_amount'];
           $cart_item_id = $row["id"];
           
           $price_array=array($pro_total);
           $total_sum=array_sum($price_array);
           $total_amt=$total_amt + $total_sum;
           
  /*we will setcookie here to check it at payment_success.php page as follows:here we are creating cookie for total amount which is going to b paid
  so we will give this name very intelligently,so no one able to understand that this cookie is used for what purpose.here i m givinig it name "ta"
  for totAL amount.*/
  setcookie("ta",$total_amt,strtotime("+1 Day"),"/","","None",TRUE);


  echo "

  <!--follow two items we will fetch at login_form.php page -->
  <input type='hidden' name='pid[]' value=$pid/>
  <input type='hidden' name='' value=$cart_item_id/>

 

<tr class='cart-table__row'>
                  <td class='li-product-thumbnail'>
                    <a href='#'><img class='cart__image' src='admin/uploads/$pro_image' alt='' style='width:100px;'
                    /></a>
                  </td>
                  <td class='cart__image-wrapper cart-flex-item'>
                  <div class='list-view-item__title'>
                    <a href='product.php?id=$pid' class='cart-table__product-name cart-title'
                      >
                      $pro_title</a
                    >
                   </div>
                  </td>
                  <td
                    class='text-right small--hide cart-price'
                    data-title='Price'
                  >
                  <div class='input-number'>
                  <input type='text' class='form-control input-number__input'
                   price' pid='$pid' id='price-$pid' value='$pro_price' disabled
                   style='background:none;border:none;width:100px;'>
</div>
                  </td>
                  <td
                    class='cart-table__column cart-table__column--quantity'
                    data-title='Quantity'
                  >
                    <div class='input-number'>

                      <input type='number' 
                      min='1' 
                      class='form-control input-number__input qty'
                       pid='$pid'  id='qty-$pid' value='$pro_qty' >
                    </div>
                  </td>
                  <td
                    class='cart-table__column cart-table__column--total'
                    data-title='Total'
                  >
                  <div class='input-number'>
                  <input type='text' class='form-control total' pid='$pid'  id='total-$pid' value='$pro_total' disabled
                  style='background:#fff;border:none !important;width:100px;'>
</div>

                  </td>
                 
                  <td class='cart-table__column cart-table__column--remove'>
                    <button
                      type='button' pid_remove_item='$pid' id='remove_item'
                      class='btn btn--secondary cart__remove'
                    >
                    <i class='fa fa-trash'></i>
                    </button>
                  
                    <button
                      type='button' pid_update_item='$pid' id='update_item'
                      class='btn btn--secondary cart__remove'
                    >
                    <i class='fa fa-check-square'></i>
                    </button>
                  </td>
                </tr>
               
";
    }
    echo "
    </tbody>
    </table>
   </div>
    
    <div class='row'>
    <div class='col-12'>
        <div class='coupon-all'>
           
            <div class='coupon2'>
            <a href='index.php' class='btn continue-shopping
           ' style='background:black;color:#fff'>Continue Shopping</a>
            </div>
        </div>
    </div>
</div>

  <br>
          
  <div class='col-12 col-sm-12 col-md-4 col-lg-6 cart__footer'>
           	
              <div class='solid-border'>
                
                    <h3 class='card-title'>Cart Totals</h3>
                    <div class='row cart-summary'>
                    <span class='col-12 col-sm-6 cart__subtotal-title'><strong>Subtotal</strong></span>
                    <span class='col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right'><span class='money'>&#8358; $total_amt</span></span>
                  </div>
                  <div class='row cart-summary'>
                  <span class='col-12 col-sm-6 cart__subtotal-title'><strong>Shipping</strong></span>
                  <span class='col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right'><span class='money'> &#8358;0.00</span></span>
                </div>
                <div class='row cart-summary'>
                <span class='col-12 col-sm-6 cart__subtotal-title'><strong>Total</strong></span>
                <span class='col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right'><span class='money'>&#8358;$total_amt</span></span>
              </div>
                       
           
            ";
          
            ?>
        <?php
          function randString($length, $charset='ABCDE0123456789')
          {
                                  $str = '';
                                  $count = strlen($charset);
                                  while ($length--) {
                                      $str .= $charset[mt_rand(0, $count-1)];
                                  }
        
                                  return $str;
                              }
        
                              $unique_id = randString(7);
                        
        
                                                $result =mysqli_query($con,"SELECT * FROM customer_order WHERE
                                                trx_id='$unique_id'");
                                                $count=mysqli_num_rows($result);
                                                if($count>0)
                                                {
                                                $unique_id = randString(7);
                                                }
                                                $tx="$unique_id";
        
                              ?>
        
             
                <?php
        
        
        
        if (!isset($_SESSION["userid"])) {
          //---------------------------if user is not logged in then show him a ready checkout and redirect to login page
            echo '<input type="submit" style="background:black;color:#fff;" name="login_user_with_product" class="btn btn--small-wide checkout " value="Ready to Checkout" >
                </form>';
          }else if(isset($_SESSION['userid'])){
        //isf user is already logged in then rediretct him to paypal itegration module--------------------------
        //-------------------------------------paypal code starts here---------------------------------------    
      ?>
 <a style="background:black;color:#fff;"
                      class='
                        btn btn--small-wide checkout
                      '
                      href="payment.php?amt=<?php echo $total_amt; ?> && tx=<?php echo $tx; ?>" 
                      >Proceed to checkout</a
                    >
                  </div>
                </div>
              </div>
              
            </div>
             
      <?php
        
        
          }
        
        }//mysqli_num_rows----which fetches added product list is ends here
        else{
         
   
          echo "<div class='alert alert-danger' role='alert' style='color:black;padding:5px;font-size:13px;'>
          Your Cart is Empty. Please add some Products into the Cart and then you can continue...
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                  echo"
                   <a href='catalog.php' class='btn' 
                   style='background:#d10024;color:black;margin-bottom:50px;color:#fff;width:150px
                   ;margin-left:30vw; '>Go to Shop</a>";
        }
  }//if(isset ) ends here
  
  
  
 
 



//----------------------------------------|| cart.php-cart page ends here-----------------------------

//-----------------------------remove item from code starts here-----------------------------------
//-----------------------------remove item from code starts here-----------------------------------
if(isset($_POST['removeFromCart'])){
  $pid=$_POST['removeId'];

  if(isset($_SESSION['userid'])){
  $userid=$_SESSION['userid'];
  $sql="DELETE FROM cart WHERE user_id='$userid' AND p_id='$pid' ";
  }else{
    $sql="DELETE FROM cart WHERE ip_add='$ip_add' AND p_id='$pid' AND user_id=-1";
  }
  $result=mysqli_query($con,$sql);

  if($result){
    echo "<div class='alert alert-danger' role='alert'>
    Item removed from the Cart. 
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
   </button>
  </div>";
  }

}

//-----------------------------remove item from code ends here-----------------------------------
//------------------------------------------code for update items of cart starts here--------------------------
if(isset($_POST['updateToCart'])){

  $pid=$_POST['updateId'];
  
  $qty=$_POST['qty'];
  $price=$_POST['price'];
  $total=$_POST['total'];

  if(isset($_SESSION['userid'])){
     $userid=$_SESSION['userid'];
     $sql= "UPDATE `cart` SET qty='$qty', price ='$price', total_amount='$total' WHERE  p_id= '$pid' ";
  }else{
    $sql= "UPDATE `cart` SET qty='$qty', price ='$price', total_amount='$total' WHERE p_id= '$pid'  ";
  }

  $result=mysqli_query($con,$sql);
  if($result){
    echo "<div class='alert alert-success' role='alert'>
    Product is Updated Successfully. 
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
   </button>
  </div>";
  }
}



//------------------------------------------code for update items of cart ends here--------------------------
