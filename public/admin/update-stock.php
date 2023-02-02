<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Confirm Payment";
$trx_id=$_GET['trx-id'];//transaction id returnerd by generated id
                    
                            $query=mysqli_query($con,"select * from customer_order where trx_id='$trx_id' ");
                            $result=mysqli_query($con,$query);
      
                            while($row=mysqli_fetch_array($query))
                            {

                             
                                ?>
  <?php
$pid=$row['pid'];
$qty=$row['p_qty'];

$query2=mysqli_query($con,"select * from products where product_id='$pid' ");
$result=mysqli_query($con,$query2);

while($row2=mysqli_fetch_array($query2))
{

$istock=$row2['stock'];
$nstock=$istock-$qty;

$sql=mysqli_query($con,"UPDATE products set
stock='$nstock' WHERE product_id='$pid' ");

if($sql)
{

  $msg="Payment Confimed and Stock Updated! Please do not refresh this page";

}else{

$msg="Sorry, an error occured!";
 
}

?>
 
 <?php } }?>
 <?php include('include/header.php');?>
		
<?php include('include/sidebar.php');?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><a href="add-brand.php" class="btn btn-o btn-primary">
             Order Details</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <p style="padding-left:10vw;color:#cb0c9f;"><?php if($msg) { echo htmlentities($msg);}?> </h5>
</p>

<div class="form-group text-box" >
<?php 
 $sql=mysqli_query($con,"select * from customer_order WHERE trx_id='$trx_id' ");
?>
			
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Drink</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                     
                    </tr>
                  </thead>
                  <tbody>
				<?php
				

				 while($row=mysqli_fetch_array($sql)){
				
                      ?>
					<tr>
						<td><?php echo htmlentities($row['p_qty']);?></td>
						<td><?php echo htmlentities($row['p_name']);?> </td>
						<td>&#8358;<?php echo htmlentities($row['p_price']);?></td>
						
					</tr>
					<?php } 
                 

				 ?>
					</tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>



