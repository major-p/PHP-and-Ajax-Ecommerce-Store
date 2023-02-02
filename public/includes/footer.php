    
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>
								NG Communication is a leading retailer of affordable and long-lasting mobile phones, computers, accessories, and various types of electronics. 
								</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
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
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Account</h3>
								<ul class="footer-links">
								<?php
                           if(isset($_SESSION['userid'])){
                           ?> 
                           
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="customer_order.php">My Orders</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <?php
                           }else{
                            ?>
                             <li><a href="login_form.php">Sign In</a></li>
                             <li><a href="customer_register_form.php">Sign Up</a></li>
                             <?php }?>

								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Quick Links</h3>
								<ul class="footer-links">
								<li><a href="index.php">Home</a></li>
									
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
                            &copy; <?php echo date("Y", time()); ?>  All rights reserved.
                        <a href="https://majorp.000webhostapp.com" target="_blank" style="color:#3d464d;">
						 Major P</a>
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>


    <script src="includes/index.js"></script>


 <!--Script for cookie users consent -->
 <script>
    $(document).ready(function(){
    if (!!localStorage.getItem("cc")) {
        document.body.classList.add("cc")
    } 
    else {
        $("button").click(function() {
            localStorage.setItem("cc", "ok")
            $(".cookie").fadeOut();
        });
    }
});
</script>

 <!--Script for cookie users consent ends here-->

 <!--Script for live ajax search -->
   <script>
   input_box=document.getElementById("search")
   output=document.getElementById("output")
   close_btn=document.getElementById("close")
   form=document.getElementById("form")
   form.addEventListener("submit",notsubmit)
  function notsubmit(e)
{
e.preventDefault();
}
   close_btn.onclick=function()
   {
    input_box.value=''
    output.innerHTML=""
    output.style.display="none"
   }
   input_box.addEventListener("keydown",(e)=>
   {
    output.style.display="block"
output.innerHTML=`<div class='progress'>
<span class="fa fa-spinner fa-spin" style=""></span>
</div>`
q=e.target.value
const xhr=new XMLHttpRequest();
xhr.open("GET","livesearch.php?q="+q,true)
xhr.onload=function()
{
    if(xhr.status==200)
    {
output.innerHTML=''
output.innerHTML=xhr.responseText
    }
    else{
        alert("Something went wrong.")
    }
}
if(q.length>=2)
{
    xhr.send();
}
if(q.length==0)
{
    output.innerHTML=""
    output.style.display="none"
}
   })
   </script>
 <!--Script for live ajax search ends here -->

<script>
$('.close').click(function(){
    $("div.alert").hide();

});
</script>


</body>

</html>