<?php
include("conn.php");
$id = $_POST['id'];
$sql = "select * from tb_text_book where uname LIKE '$id%'";
$result = mysqli_query($mysqli, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<p>" .$row['uname']."</p>";
}
?>