<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>NG Communication- NG Gardens</title>

<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
<!-- Favicon -->
<link rel="shortcut icon" href="./img/logo.png" />
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/custom.css"/>


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li class="mobile-hidden"><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li class="mobile-hidden"><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right mobile-center">
						
				
                        <?php
                           if(isset($_SESSION['userid'])){
                           ?> 
                           
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="customer_order.php">My Orders</a></li>
                            <li><a href="logout.php"><i class="fa fa-sign-in"></i>Logout</a></li>
                            <?php
                           }else{
                            ?>
                             <li><a href="login_form.php"><i class="fa fa-sign-in"></i>Sign In</a></li>
                             <li><a href="customer_register_form.php"><i class="fa fa-user-o"></i>Sign Up</a></li>
                             <?php }?>

                    </ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header" style="background:#ffffff;">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="" class="logo">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form autocomplete="off" id="form" action="">
									<select class="input-select mobile-search-select">
										<option value="0">All Categories</option>
									
									</select>
									<input class="input mobile-search-input" type="search" placeholder="I'm searching for ..."  id="search" name="search" aria-label="Search" autocomplete="off">
									<button class="search-btn" type="submit">Search</button>
                                    <i  id="close"></i>
								</form>
							</div>
                            <div class="searchresult hm-searchbox" id="output" style="display:none"></div>

						</div>
						<!-- /SEARCH BAR -->
                    
                    
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix ">
							<div class="header-ctn mobile-nav-row" >		
						       <!-- Cart -->
								<div class="dropdown">
									<a href="cart.php" class="dropdown-toggle"  
									style="color:black;">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty  k1">0</div>
									</a>
									
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#" 	style="color:black;">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class=""><a href="index.php">Home</a></li>
						
						<?php 
							 $cat_query="SELECT * FROM categories";
							 $result=mysqli_query($con,$cat_query);
							 if(mysqli_num_rows($result)>0){
							  while ($row=mysqli_fetch_array($result)) {
								// print_r($row);
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_title'];
							?>
                            <li><a  href="products.php?cid=<?php echo $cat_id; ?>" > 
                                <?php echo $cat_name ?> </a></li>
                        <?php }} ?>    
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->



		<div id="addtoproduct_msg"></div>
        <div id="cart_msg">
            <!---cart message here----></div>
