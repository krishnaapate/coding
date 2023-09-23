<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function confirm_delete() {
            var ans = confirm("want to delete");
            if (ans)
                return true;
            else
                return false;
        }
    </script>

</head>

<body>
    <form method="post">
        <table border=1 align="center">
            <tr>
                <td><label>id</label> </td>
                <td><input type="text" name="id"></td>
            </tr>

            <tr>
                <td><label>name</label> </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label>gender</label> </td>
                <td><input type="radio" name="gender" value="female">female
                    <input type="radio" name="gender" value="male">male
                </td>
            </tr>
            <tr>
                <td><label>language</label> </td>
                <td><input type="checkbox" name="language[]" value="c++">c++
                    <input type="checkbox" name="language[]" value="java">java
                    <input type="checkbox" name="language[]" value="php">php
                </td>
            </tr>
            <tr>
                <td><label>course</label> </td>
                <td><select name="course">
                        <option value="bba">bba</option>
                        <option value="bca">bca</option>
                        <option value="mca">mca</option>

                </td>
            </tr>
            <tr>
                <td clospan="2" align="center">
                    <input type="submit" name="submit">
                </td>
            </tr>
        </table>

    </form>

<!--display reecord -->
    <?php
    include "connection.php";
    $query = "select * from tbl1";
    $recordset = mysqli_query($conn, $query);

    ?>
    <table border=1 align="center">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>gender</th>
            <th>language</th>
            <th>course</th>
            <th colspan=2>opration</th>
        </tr>
        <?php
        while ($record = mysqli_fetch_row($recordset)) {
        ?>
         <tr>
                <td><?php echo $record[0] ?></td>
                <td><?php echo $record[1] ?></td>
                <td><?php echo $record[2] ?></td>
                <td><?php echo $record[3] ?></td>
                <td><?php echo $record[4] ?></td>
           
                <td><a href="insdel.php? delid=<?php echo $record[0]; ?>" onclick="return confirm_delete()"><?php echo "delete" ?></td>
                <td><a href="insupdate.php? updateid=<?php echo $record[0]; ?>"><?php echo "update" ?></td>
            </tr>
 
        <?php
        }
        ?>

    </table>
</body>
</html>
<!--insert data-->
<?php
include "connection.php";
if (isset($_REQUEST['submit'])) {


    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];

    if (isset($_REQUEST['gender'])) {
        $gender = $_REQUEST['gender'];
    }
    if (isset($_REQUEST['language'])) {
        $lan = $_REQUEST['language'];
        $lan1 = implode(" , ", $lan);
    }
    if (isset($_REQUEST['course'])) {
        $course = $_REQUEST['course'];
    }

    $query = "insert into tbl1(name,gender,language,course)value('$name','$gender','$lan1','$course')";
    $ins = mysqli_query($conn, $query);
    $que = "select * from tbl1";
    $recordset = mysqli_query($conn, $que);

    
}
?>


<!-- delete-->
<?php
include "connection.php";
$id=$_REQUEST['delid'];
$query="delete from tbl1 where id='$id' ";
$ans=mysqli_query($conn,$query);
?>


<!--update-->
<?php
include "connection.php";
$upid = $_REQUEST['updateid'];
$query = "select * from tbl1 where id='$upid'";
$recordset = mysqli_query($conn, $query);
$record = mysqli_fetch_row($recordset);
$id = $record[0];
$name = $record[1];
$gender = $record[2];
$language = $record[3];
$lan = explode(" ", $language);
$stream = $record[4];
?>
<html>

<head>

</head>

<body>
    <form action=" " method="post">
        <table border="1" align="center">

            <tr>
                <td><label>id</label> </td>
                <td><input type="text" name="id" value="<?php echo $record[0]; ?>"></td>
            </tr>

            <tr>
                <td><label>name</label> </td>
                <td><input type="text" name="name" value="<?php echo $record[1]; ?>"></td>
            </tr>
            <tr>
                <td><label>gender</label> </td>
                <td><input type="radio" name="gender" value="female" <?php if ($record[2] == "female") { ?> checked="checked" <?php } ?>>female
                    <input type="radio" name="gender" value="male" <?php if ($record[2] == "male") { ?> checked="checked" <?php } ?>>male
                </td>
            </tr>
            <tr>
                <td><label>language</label> </td>
                <td>
                    <?php if (in_array("c++", $lan)) { ?>
                        <input type="checkbox" name="language[]" value="c++" checked="checked"><?php } else { ?>
                        <input type="checkbox" name="language[]" value="c++"><?php } ?> c++

                    <?php if (in_array("java", $lan)) { ?>
                        <input type="checkbox" name="language[]" value="java" checked="checked"><?php } else { ?>
                        <input type="checkbox" name="language[]" value="java"><?php } ?>java


                        <?php if (in_array("php", $lan)) { ?>
                            <input type="checkbox" name="language[]" value="php" checked="checked"><?php } else { ?>
                            <input type="checkbox" name="language[]" value="php"><?php } ?>php

                </td>
            </tr>
            <tr>
                <td><label>course</label> </td>
                <td><select name="course">
                <option disabled selected>select</option>
                        <option value="bba" <?php if($record[4]=="bba")
                        {
                            ?>  selected="selected"
                            <?php } ?>>bba</option>
                        <option value="bca" <?php if($record[4]=="bca")
                        {
                            ?> selected="selected"
                            <?php
                        }
                        ?>>bca</option>
                        <option value="mca" <?php if($record[4]=="mca")
                        {
                            ?> selected="selected"
                            <?php
                        }
                        ?>>mca</option>

                </td>
            </tr>
            <tr>
                <td clospan="2" align="center">
                    <input type="submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
if(isset($_REQUEST['submit']))
{
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $gender=$_REQUEST['gender'];
    if(isset($_REQUEST['language']))
    {
        $lan=$_REQUEST['language'];
        $subject=implode(" ",$lan);

    }
    else
    {
        $subject="NA";
        }
        $course=$_REQUEST['course'];
        $query="update tbl1 set id='$id', name='$name', gender='$gender' ,language='$subject',course='$course' where id='$id' ";
        $update=mysqli_query($conn,$query);
        
}
?>

<!-- connection-->
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="db217";
$conn=mysqli_connect($servername,$username,$password,$dbname);

?>





<!-- flask-->
1.
from flask import Flask
app = Flask(__name__)
@app.route('/')
def hello_world():
    return 'Hello World'
if __name__ == '__main__':
    app.run()



2.

from flask import Flask
app = Flask(__name__)
@app.route('/home/<name>')
def home(name):
    return 'Hello'+name;
if __name__ == '__main__':
    app.run()







