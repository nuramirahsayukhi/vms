<?php
//database connection  file
include('dbconnect.php');
//Code for deletion
if(isset($_GET['delid']))
{
$taskid=intval($_GET['delid']);
$sql=mysqli_query($con,"DELETE from tasks where id=$taskid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'managetasks.php'</script>";     
} 
?>