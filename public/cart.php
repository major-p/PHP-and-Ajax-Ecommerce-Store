<?php

include "../config/config.php";
session_start();
error_reporting(0);

include 'includes/header.php';  
?>
        <link type="text/css" rel="stylesheet" href="css/cart.css"/>

	<!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Shopping Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Shopping Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
	
        <div class="cart block">
          <div class="container"  id="cart_product_list">
          



          

		  
          </div>
        </div>
      </div>
      <!-- site__body / end -->
  
	






<?php
include 'includes/footer.php';   
?>