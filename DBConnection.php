<?php
$con=mysqli_connect("localhost","root","","school");
// if($con){
//     echo"Db Connected";
// }
if(mysqli_connect_error($con))
{
    echo"Db Problem";
}
else{
    echo"Db Seccess";
}
?>