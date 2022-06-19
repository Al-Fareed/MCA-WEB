<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM new_record WHERE bid=$id";
$result = mysqli_query($con,$query);
header("Location: view.php");
?>