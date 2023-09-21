<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="pink">
    <form>
        <table border="1">
        <tr>
            <td>id</td>
            <td><input type="text" name="pid"/></td>
        </tr>
        <tr>
                <td>name</td>
                <td><input type="text" name="pname"/></td>
        </tr>
        <tr>
                    <td>price</td>
                    <td><input type="text" name="pprice"/></td>
        </tr>
        <tr>
            <td><a href="display.php"><button>insert</button></td>
        </tr>
</table>
    </form>
</body>
</html>

<!-- insert -->
<?php
include "con.php";
if(isset($_REQUEST['submit']))
{
    $id=$_REQUEST['pid'];
    $name=$_REQUEST['pname'];
    $price=$_REQUEST['pprice'];
    $qry="insert into product(id,name,price) values('$id','$name','$price')";
    $ans=mysqli_query($con,$qry);
}
?><br><br>


<!-- display data-->
<?php
include "con.php";
$qry= "select * from product";
$result=mysqli_query($con,$qry);
?>
<table align="center" border="1" cellspacing="7" cellpadding="7">
    <tr>
        <th>pid</th>
        <th>pname</th>
        <th>pprice</th>
        <th colspan="2">opration</th>
    </tr>

<?php
while ($record=mysqli_fetch_row($result))
{
?>
<tr>
    <td><?php echo $record[0]?></td>
    <td><?php echo $record[1]?></td>
    <td><?php echo $record[2]?></td>
    <td><a href="del.php?delid=<?php echo $record[0]?>"><button>delete</td>
    <td><a href="up.php?upid=<?php echo $record[0]?>"><button>edit</button></td>
</tr>

<?php }
?>
</table>
<br>
<td><a href="search.php"><button>search</button>
<!-- end -->