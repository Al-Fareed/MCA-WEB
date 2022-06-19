<?php
//provide your hostname, username and dbname
require('db.php');
include("auth.php");
$book_name = $_POST['bname'];
$sql = "select bname from new_record where bname LIKE '$book_name%'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<p>".$row['bname']."</p>";
}
?>