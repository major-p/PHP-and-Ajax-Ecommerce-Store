<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Receive Payment";



?>

<?php include('include/header.php');?>
		
<?php include('include/sidebar.php');?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>
            Pending Orders 
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <p style="padding-left:10vw;color:#cb0c9f;"><?php if($msg) { echo htmlentities($msg);}?> </h5>
</p>

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-secondary opacity-7">Order Details</th>
                      <th class="text-secondary opacity-7"></th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php $query=mysqli_query($con,"select * from received_payment WHERE status!='Delivered' ");
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
                      <td>
                      <p class="badge badge-sm bg-gradient-danger"><?php echo htmlentities($row['status']);?></p>

                      
                      </td>

        
           <td>
           <p class="text-xs font-weight-bold mb-0"><?php echo htmlentities($row['date']);?></p>
                      </td>
                      <td class="align-middle">
                      <a href="order-details.php?id=<?php echo $row['trx_id'];?>" class="btn btn-transparent btn-xs" >View Details</a>

                      
                      </td>
                      <td class="align-middle">
                      <a href="update-order.php?id=<?php echo $row['trx_id'];?>" class="btn btn-transparent btn-xs" >Update Progress</a>

                    
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
