<?php
session_start();
$a=$_SESSION["id"];
echo "Please Click on the Back Button on browser tab";
require_once('config/db1.php');
$sql="DELETE FROM category where `id`='$a'";
$res= mysqli_query($con,$sql);
$val1=mysqli_affected_rows($con);
?>
