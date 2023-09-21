0<?php
include "con.php";
$id=$_REQUEST['upid'];
$qry= "select * from product where id='$id'";
$result=mysqli_query($con,$qry);
$record=mysqli_fetch_row($result);
$id=$record[0];
$name=$record[1];
$price=$record[2];
?>

<html>
<head>
</head>
<body>
    <form>
        <table border="1">
        <tr>
            <td>id</td>
            <td><input type="text" name="pid" value="<?php echo $record[0]?>"></td>
        </tr>
        <tr>
                <td>name</td>
                <td><input type="text" name="pname" value="<?php echo $record[1]?>"></td>
        </tr>
        <tr>
                    <td>price</td>
                    <td><input type="text" name="pprice" value="<?php echo $record[2]?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit"/></td>
        </tr>
</table>
    </form>
</body>
</html>

<!-- update query-->
<?php
include "con.php";
if(isset($_REQUEST['submit']))
{
    $id=$_REQUEST['pid'];
    $name=$_REQUEST['pname'];
    $price=$_REQUEST['pprice'];
    $qry="update product set name='$name',price='$price' where id='$id'";
    $ans=mysqli_query($con,$qry);
    header("location:product.php");
} 
?> 
<!-- end -->

