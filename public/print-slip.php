<?php
#WE WILL GET following variables from the payment_sucess.php page's URL after order completion.
$trx_id=$_GET['tx'];//transaction id returnerd by generated id
$p_st="Pending";//payment status 
$amt=$_GET['amt'];//total amt which we have paid
$tbl=$_GET['tbl'];//total amt which we have paid

include_once "../config/config.php";

?>
<html>
<head>
<title>AJ Lounge- Order Slip</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/invoices.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>



  <header>
			<h1>Order Slip</h1>
			<address >
				<p>AJ Lounge</p>
				<p>10, Shell Road,<br>Sapele,<br>Delta State</p>
				<p>0903394492</p>
			</address>
			<span><img alt="" src="images/logo.png" width="100"></span>
		</header>
		<article>
			
		
			<table class="meta">
				<tr>
					<th><span >Date</span></th>
					<td><span ><?php echo  date("l jS \of F Y "); ?> </span></td>
				</tr>
				
				<tr>
					<th><span >Table Number</span></th>
					<td><span >Table <?php echo  $tbl; ?> </span></td>
				</tr>
			</table>

			

		</article>
        <div class="order-id" style="margin-bottom:50px;">
        <h1 style="font-weight:bold; margin-top:-5vh;">Order ID- <?php echo $trx_id ?></h1>
            <p style="padding:10px;line-height:1.5; text-align:center; margin-top:20px;" > Please take this slip to the accounts department for payment</p>
            </div>
<?php 
 $sql=mysqli_query($con,"select * from customer_order WHERE trx_id='$trx_id' ");
?>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Qty</span></th>
						<th><span >Drink</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
					
				<?php
				

				 while($row=mysqli_fetch_array($sql)){
				
                      ?>
					<tr>
						<td><span ><?php echo htmlentities($row['p_qty']);?></span></td>
						<td><span ><?php echo htmlentities($row['p_name']);?> </span></td>
						<td><span data-prefix>&#8358;</span><span ><?php echo htmlentities($row['p_price']);?></span></td>
						
					</tr>
					<?php } 
                 

				 ?>
					</tbody>
                </table>
				<p style="text-align:right; font-size:20px; font-weight:bold;
				margin-bottom:100px;">Total:&#8358; <?php echo $amt;?></p>
		<aside>
			<h1><span >Contact us</span></h1>
			<div >
				<p align="center">Email :- info@ajlounge.com  </p>
			</div>
		</aside>

</div>



<script type="text/javascript">

$(document).ready(function () {
    window.print();
	setTimeout("closePrintView()",3000);
});
function closePrintView() {
	document.location.href='index.php';
}

</script>
</body>
</html>