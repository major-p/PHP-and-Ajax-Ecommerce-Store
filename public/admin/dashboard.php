<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Dashboard";
?>


						<?php include('include/header.php');?>

		
<?php include('include/sidebar.php');?>
			


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Sales</p>
                    <h5 class="font-weight-bolder mb-0">

                    <?php $query=mysqli_query($con,"select * from received_payment WHERE status='Payed' AND 
                     date=DATE(NOW()) ");
                      $result=mysqli_query($con,$query);
					  
					  $sum = 0;
                      while($row=mysqli_fetch_array($query))
                      { 
						$amount = $row['amount'];
						$sum += (int)$amount;
						
						  ?>

          

		   <?php }  
		   
		      ?>
	
			&#8358;<?php echo $sum?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Orders</p>
                    <h5 class="font-weight-bolder mb-0">
					<h5 class="font-weight-bolder mb-0">
					<?php $result = mysqli_query($con,"SELECT amount FROM received_payment WHERE status=!'Confirmed' AND 
                     date=DATE(NOW()) ");
$num_rows = mysqli_num_rows($result);
{
?>
										<?php echo htmlentities($num_rows);  } ?>
                  
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Confirmed Orders</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?php $result = mysqli_query($con,"SELECT amount FROM received_payment WHERE status='Confirmed' AND 
                     date=DATE(NOW()) ");
$num_rows = mysqli_num_rows($result);
{
?>
										<?php echo htmlentities($num_rows);  } ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Items</p>
                    <h5 class="font-weight-bolder mb-0">
                  	<?php $result = mysqli_query($con,"SELECT * FROM products  ");
$num_rows = mysqli_num_rows($result);
{
?>
										<?php echo htmlentities($num_rows);  } ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Confirmed Orders(Last 5)</p>

                    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php $query=mysqli_query($con,"select * from received_payment WHERE status='Confirmed' ORDER BY 'id' DESC LIMIT 5");
                      $result=mysqli_query($con,$query);

                      $cnt=+1;
                     

                      while($row=mysqli_fetch_array($query))
                      {
                      ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                         
                          <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs font-weight-bold mb-0"><?php echo htmlentities($row['trx_id']);?></p>
                     
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">&#8358;<?php echo htmlentities($row['amount']);?></p>
                      </td>
                     

        
          
                     
                    </tr>
                    
                    <?php } 
                 

                    ?>

                 
                   
                   
                  
                  </tbody>
                </table>
                 
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4" src="assets/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('assets/img/logo.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder "> Today's Pending Orders</h5>
               
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs text-white font-weight-bolder opacity-7">Order ID</th>
                      <th class="text-uppercase text-secondary text-xxs text-white font-weight-bolder opacity-7 ps-2">Amount</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php $query=mysqli_query($con,"select * from received_payment WHERE status='Pending' AND date=DATE(NOW()) ORDER BY 'id' DESC LIMIT 5");
                      $result=mysqli_query($con,$query);

                      $cnt=+1;
                     

                      while($row=mysqli_fetch_array($query))
                      {
                      ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                         
                          <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs text-white font-weight-bold mb-0"><?php echo htmlentities($row['trx_id']);?></p>
                     
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs text-white font-weight-bold mb-0">&#8358;<?php echo htmlentities($row['amount']);?></p>
                      </td>
                     

        
          
                     
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

      <div style="margin-left:10vw;height:30vh;"></div>


			<?php include('include/footer.php');?>


