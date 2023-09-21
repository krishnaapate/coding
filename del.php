<?php
include "con.php";
$id=$_REQUEST['delid'];
$qry= "delete from product where id='$id'";
$result=mysqli_query($con,$qry);
header("location:product.php");
?>


