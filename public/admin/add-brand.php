<?php
session_start();
error_reporting(0);
include('../../config/config.php');
include('include/checklogin.php');
check_login();
$title="Add Brand";

if(isset($_POST['submit']))
{
  $btitle=$_POST['title'];

  $sql1 =mysqli_query($con,"SELECT brand_title FROM brands WHERE brand_title='$btitle' ");
	$count=mysqli_num_rows($sql1);

	if($count>0)
{
	$msg="Brand already exists";

} else{

    $sql=mysqli_query($con,"insert into brands(brand_title) values
    ('$btitle')");
  if($sql)
  {
  $msg="New Brand Added Successfully !!";
  
  }
  

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
              <h6><a href="add-category.php">
              Add Brand</a>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
		<p style="padding-left:10vw;color:#cb0c9f;">	<?php if($msg) { echo htmlentities($msg);}?></p> 

              <div class="table-responsive p-0" >
			  <form role="form" name="" method="post">


<div class="form-group text-box" >
<label for="category">
  Brand Title
</label>

<input type="text" placeholder="Enter category Name"  name="title" class="form-control" required>

</div>





<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary" style="margin-left:10vw;">
Add
</button>
</form>


<div style="margin-left:10vw;height:5vh;"></div>  
              </div>
            </div>
          </div>
        </div>
      </div>

	  <div style="margin-left:10vw;height:30vh;"></div>


<?php include('include/footer.php');?>
