<?php

session_start();
$uid=$_SESSION['id'];

if (isset($_GET["amt"])) {
#WE WILL GET following variables from the payment_sucess.php page's URL after order completion.
$trx_id=$_GET['tx'];//transaction id returnerd by generated id
$p_st="Pending";//payment status 
$amt=$_GET['amt'];//total amt which we have paid
$dt = date('Y-m-d');


if(isset($_COOKIE["ta"]) == $amt){
 // echo "everything is okey";

  include_once "../config/config.php";
  $sql="SELECT p_id,product_title,price,qty FROM cart ";
  $result=mysqli_query($con,$sql);

  if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
              $product_id[]=$row['p_id'];
              $qty[]=$row['qty'];
              $p_name[]=$row['product_title'];
              $p_price[]=$row['price'];
              
          }//end of while
  
    
       for($i=0;$i<count($product_id);$i++){
            $sql_customer_order="INSERT INTO `customer_order`(`pid`,`uid`, `p_name`, `p_price`, `p_qty`, `p_status`, `trx_id`) 
            VALUES ('$product_id[$i]','".$uid."','".$p_name[$i]."','".$p_price[$i]."','".$qty[$i]."','".$p_st."','".$trx_id."')";
            $result1=mysqli_query($con,$sql_customer_order);
         //   echo"customer_order table is updated" ;
        }//end of for loop
        $sql3 = "INSERT INTO `received_payment`(`amount`, `trx_id`, `status`,date) VALUES ('$amt','$trx_id','Pending', '$dt' ) ";
        $result2=mysqli_query($con,$sql3);

        $sql2 = "DELETE FROM cart";
        $result2=mysqli_query($con,$sql2);

        if($result2){
        //  echo "products deleted from the cart sucessfully.";
    ?>
<?php
include 'includes/header.php';  
?>

<div class="main-container">

<div class="container-left" style="margin-left:10vw; width:80vw">
        <div class="container-left-top">
        <div class="logo-container">
            <a href="index.php">
            <img src="images/logo.png">
</a>
        </div>
        <div class="search-container">
            <form action="">
                <i class="fa fa-search"></i>
                <input type="text" name="search" placeholder="Search.." class="search">
            
              </form>
        </div>
  <div class="cart-container">
            <div class="cart">
          
    <div class="cart-image">
    <a href="cart.php" class="">          <img src="images/cart.png"></a>
                </div>
                <div class="cart-value">
                     <p class="k1">0</p>
                </div>
        
            </div>
        </div>
      </div>
</div>
</div>



<div class="cart-container-wrap" style="height:70vh;">
<div class="card-header" >
      <h5>Thanks for your patronage</h5></div>
         <div class="card-body" style="padding:2%;">
               
                 <p class="card-text">Dear customer, your order has been placed.
                 Your Order ID is <?php echo $trx_id; ?>. 
                 </p>
                 <p>Please select your table number to print your slip and proceed to accounts department to make your payment</p>

                 <div class="clearfix"> </div>
                 <div class="clearfix"> </div>
<br> <br>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=1 " class="print-btn" >Table  1</a>

<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=2 " class="print-btn"  >Table  2</a>

<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=3 " class="print-btn"  >Table  3</a>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=4 " class="print-btn"  >Table  4</a>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=5 " class="print-btn"  >Table  5</a>
<br> <br><br>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=6 " class="print-btn"  >Table  6</a>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=7 " class="print-btn"  >Table  7</a>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=8 " class="print-btn"  >Table  8</a>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=9 " class="print-btn"  >Table  9</a>
<a href="print-slip.php?tx=<?php echo $trx_id; ?> && amt=<?php echo $amt; ?> && tbl=10 " class="print-btn"  >Table  10</a>


<div class="clearfix"> </div>
<div class="clearfix"> </div>
<div class="clearfix"> </div>

           </div>
      </div>
    </div>
  </div>

</div>

<?php
include 'includes/footer.php';  
?>

<?php
    }//end of if($result2)----data deleted from cart
}//end of if(mysqli_num_rows($result)>0) statement
else{
  header("Location:index.php");
  }
}//end of isset cookie['ta'] && p-st==Completed
}//end of if (isset($_GET["st"])) {
?>
