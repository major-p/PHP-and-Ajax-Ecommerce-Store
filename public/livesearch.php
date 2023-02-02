
<?php
include "../config/config.php";
error_reporting(0);



if(isset($_GET['q']))
{
$q=$_GET['q'];
$q=mysqli_real_escape_string($con,$q);
$q=htmlentities($q);
$sql="SELECT * FROM products WHERE product_keywords='$q' or product_keywords like '%$q' or product_keywords like '$q%' 
or product_keywords like '%$q%' LIMIT 10";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
    ?>
    <?php
while($x=mysqli_fetch_assoc($res))
{
    $product_id=$x['product_id'];
$product_title=$x['product_title'];
$product_cat_id=$x['product_cat_id'];
?>
<!-- Link to search -->
<p class='search-text'>
<a class="search-result" href="product.php?id=<?php echo $product_id; ?>&cid=<?php echo $product_cat_id; ?>">
<?php echo $product_title;?>
</a></p>
<!-- link to search ends here -->

<?php
}
?>
</ul>
<?php
}
else
{
    echo "<p class='error-text' style='color:#ff0000;padding:8px;'>Sorry, we couldn't find what you are looking for. Try searching again.</p>";
}
}
else
{
    echo "<p class='black-text' style='color:#ff0000;padding:8px;'>Bad Request</p>";
}
?>