<?php
require_once('DBConnection.php');
$id=$_GET['id'];
$d= mysqli_query($con,"DELETE FROM users WHERE id='$id'");
if ($d) {
    echo"Delete Hogya";
    header('location:Users_List.php');
}
else {
    echo"Something went Wrong";
}
?>