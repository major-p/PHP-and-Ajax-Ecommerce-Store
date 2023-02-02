<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Brands";


if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from brands where brand_id = '".$_GET['id']."'");
                  $_SESSION['msg']="Brand  Deleted !!";
		  }
?>

<?php include('include/header.php');?>
		
<?php include('include/sidebar.php');?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><a href="add-brand.php" class="btn btn-o btn-primary">
              Add Brand</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <p style="color:red; padding-left:10vw;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created On</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Updated</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $query=mysqli_query($con,"select * from brands");
                      $cnt=+1;
                      while($row=mysqli_fetch_array($query))
                      {
                      ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                         
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo htmlentities($cnt);?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo htmlentities($row['brand_title']);?></p>
                      </td>
                      <td class="align-middle text-center ">
                        <span class="mb-0 text-sm"><?php echo htmlentities($row['creationDate']);?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo htmlentities($row['updationDate']);?></span>
                      </td>
                      <td class="align-middle">
        
                        <a href="edit-brand.php?id=<?php echo $row['brand_id'];?>" class="badge badge-sm bg-gradient-secondary" data-toggle="tooltip" data-original-title="Edit Category">
                          Edit
                        </a>
                        <a href="brands.php?id=<?php echo $row['brand_id'];?>&del=delete" 
                        onClick="return confirm('Are you sure you want to delete?')" class="badge badge-sm bg-gradient-danger">
                      Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                   
                   
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>




<?php include('include/footer.php');?>
