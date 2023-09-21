<?php
include "con.php";
?>

<html>
<head></head>
<body bgcolor="skyblue">
    <form>
        <input type="text" placeholder=" search data" name="search">
        <button name="submit">search</button>
    </form>
    <table border="1" cellpadding="4">
        <tr>
            <th>pid</th>
            <th>pname</th>
            <th>price</th>
        </tr>

<tr>
    <?php
    if(isset($_REQUEST['submit']))
    {
        $a=$_REQUEST['search'];
        $qry="select * from product where CONCAT(name,price) like '%$a%' ";
        $run=mysqli_query($con,$qry);
        if(mysqli_num_rows($run)>0)
        {
            while($row=mysqli_fetch_array($run))
            {
            ?>
            
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['price'];?></td>

</tr>
<?php
 }
}
 else
 {
    ?>
    <tr>
        <td>no record</td>
    </tr>
    <?php

 }
} 
?>

</table>
<br>
<a href="product.php"><button>back to home</button>
</body>
</html>