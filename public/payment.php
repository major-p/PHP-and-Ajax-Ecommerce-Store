
<?php
session_start();
if(!isset($_SESSION['userid'])){
  echo "<script>window.location.href='login_form.php';</script>";

}

$uid=$_SESSION['userid'];

if (isset($_GET["amt"])) {
#WE WILL GET following variables from the payment_sucess.php page's URL after order completion.
$trx_id=$_GET['tx'];//transaction id returnerd by generated id
$p_st="Pending";//payment status 
$amt=$_GET['amt'];//total amt which we have paid
$dt = date('Y-m-d');


  include_once "../config/config.php";


      
include 'includes/header.php';  
?>
	<!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Payment</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Make Payment</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->



<div class="contact_form">
		<div class="container">


                 
		<h4 style="color:#d10024;font-size:16px;font-weight:normal;line-height:20px">
    Please Click the "Pay Now" button below to complete your transaction
  </h4><br />
        <h4>Total:&#8358;<?php echo $amt; ?></h4><br> 
     
<?php  
 $sql=mysqli_query($con,"select * from user_info WHERE user_id='$uid' ");

      while($rw=mysqli_fetch_array($sql)){
               
                     ?>
 <br /><br />

 <form id="paymentForm" >
 <script src="https://js.paystack.co/v1/inline.js"></script>
   <input type="button" class="btn btn-primary" value="Pay Now" 
    style="background:#d10024;border:none;width:200px;padding:10px;"
    onclick="payWithPaystack()">  
</form>

 <img src="img/paystack_icons.png"
 style="width:300px;margin-top:20px;" /><br />


<script >
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_ec4420cf68fdd269d1e4ee6c5265d8acbe81461e',
      email: 'info@ctechub.com',
      amount: <?php echo $amt*100; ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $rw['first_name'] ?>",
                variable_name: "<?php echo $rw['last_name'] ?>",
                value: "<?php echo $rw['mobile'] ?>"
            }
         ]
      },
      callback: function(response){
		  
		    
          alert('success. transaction ref is ' + response.reference   );
		 <?php  
      }

	?>
     
    
              
 
		 
		   window.location='payment_success.php?tx=<?php echo $trx_id; ?>&&amt=<?php echo $amt; ?>&&ref=' + response.reference;
      },
      onClose: function(){
		  
          alert('Payment window closed.Please try again');
      }
    });
    handler.openIframe();
  }
</script>	






			




        </div>

        </div>







<?php
include 'includes/footer.php';   
?>

<?php
}
else{
  header("Location:index.php");
  }
?>