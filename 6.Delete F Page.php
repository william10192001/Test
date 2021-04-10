<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
if(isset($_GET['id']))
{
 $id=$_GET['id'];
 $table=$_GET['table'];
 $delete="delete from facility where id=$id";
 $query=mysqli_query($con,$delete);
 header('location:5.Admin page.php');
}
?>