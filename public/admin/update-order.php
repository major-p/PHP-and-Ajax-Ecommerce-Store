<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Update Progress";
$trx_id=($_GET['id']);


if(isset($_POST['submit']))
{
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);



$sql=mysqli_query($con,"UPDATE received_payment set
status='$status' WHERE trx_id='$trx_id' ");

if($sql)
{

    $msg="Status Updated Successfully !!";

}else{

  $msg="Sorry, an error occured!";
 
}

}
?>

<?php include('include/header.php');?>
		
<?php include('include/sidebar.php');?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><a class="btn btn-o btn-primary">
            Update Order</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <p style="padding-left:10vw;color:#cb0c9f;">	<?php if($msg) { echo htmlentities($msg);}?></p> 

  <?php $query=mysqli_query($con,"select * from received_payment WHERE trx_id='$trx_id' ");
                      $result=mysqli_query($con,$query);

                      $cnt=+1;
                     

                      while($row=mysqli_fetch_array($query))
                      {
                      ?>

<p style="text-align:center;font-weight:bold;text-transform:uppercase;">
Current Status:<?php echo htmlentities($row['status']);?></p> 

<?php }?>
<div class="form-group text-box" >
			
<form role="form" name="" method="post">
<select name="status" class="form-control">
    <div class="form-group">
								<option value="">Select Status</option>
								<option value="In Progress">In Progress</option>
								<option value="Dispatched">Dispatched</option>
								<option value="Delivered">Delivered</option>
							</select>
                      </div>
                     
<div style="margin-left:10vw;">
                        <button type="submit" class="badge badge-sm bg-gradient-secondary" name="submit" >
                       Update Order Status
                        </button>
                      </div>                
                        </form>

              </div>
            </div>
          </div>
        </div>
      </div>
<div style="height:300px;"></div>



<?php include('include/footer.php');?>
