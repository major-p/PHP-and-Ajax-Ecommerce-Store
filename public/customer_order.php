<?php
include "../config/config.php";
session_start();
error_reporting(0);
if(!isset($_SESSION['userid'])){
  header("Location:index.php");
}
include 'includes/header.php';  



?>
 <!-- site__body -->
 <div class="site__body">
        <div class="page-header">
          <div class="page-header__container container">
            <div class="page-header__breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                      <use
                        xlink:href="images/sprite.svg#arrow-rounded-right-6x9"
                      ></use>
                    </svg>
                  </li>
                 
                  <li class="breadcrumb-item active" aria-current="page">
                Your Orders
                  </li>
                </ol>
              </nav>
            </div>
            <div class="page-header__title"><h1>Your Orders</h1></div>
          </div>
        </div>
		
<!-----------------------------customer_order_detail code starts here------------------------------------------>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header bg-primary text-white"><h5><?php echo $_SESSION['name'];?>, Your Order Details</h5></div>
         <div class="card-body">
           <?php
            include_once("db.php");
            $user_id=$_SESSION['userid'];
/*$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image 
FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";*/
            $order_list="SELECT o.id,o.uid,o.pid,o.p_name,o.p_price,o.p_qty,o.p_status,o.trx_id,p.product_image
             FROM customer_order o,products p WHERE o.uid=$user_id AND o.pid=p.product_id";

            $result=mysqli_query($con,$order_list);
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_array($result)){
           ?>
               <div class="row">
                 <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6" style="text-align: center;">
                      <img src="img/<?php echo $row['product_image']; ?>" class="img-thumbnail card-img img-fluid" style="width:50%; height: 85%; display:inline-block;" alt="">
                 </div>
                 <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                
                   <table class="table">
                     <tr><td>Product Name : </td> <td><?php echo $row['p_name']; ?></td></tr>
                     <tr><td>Product Price :  </td> <td><?php echo $row['p_price']; ?></td></tr>
                     <tr><td>Product Quantity : </td> <td><?php echo $row['p_qty']; ?></td></tr>
                     <tr><td>Product Payment : </td> <td><?php echo $row['p_status']; ?></td></tr>
                     <tr><td>Product Transaction Id : </td> <td><?php echo $row['trx_id']; ?></td></tr>
                   </table>
                 </div>
               </div>
        <?php
            }//end of while loop
          }//end of if statement

        ?>
         </div>
      </div>
    </div>
  </div>
</div>


<!-----------------------------customer_order_detail code ends here------------------------------------------>

<!-------------------------CODE TO ENABLE BOOTSTRAP------------------------------------------>
<script src="jquery-3.5.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="index.js"></script>


</body>
</html>