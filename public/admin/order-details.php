<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Order Details";
$trx_id=($_GET['id']);

?>

<?php include('include/header.php');?>
		
<?php include('include/sidebar.php');?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><a class="btn btn-o btn-primary">
             Order Details</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <?php 
 $sql2=mysqli_query($con,"select * from customer_order WHERE trx_id='$trx_id' LIMIT 1");
	 while($row2=mysqli_fetch_array($sql2)){
				 $uid=$row2['uid'];

    
                                 $query="select * from employees where id='$uid' ";
                                 $query_run=mysqli_query($con,$query);
                                 $row5 = mysqli_fetch_array($query_run);
                                ?>
                     <p style="text-align:center;font-weight:bold;text-transform:uppercase;"> SOLD BY:<?php echo htmlentities($row5['name']);?></p> 
<?php } ?>


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




<?php include('include/footer.php');?>
