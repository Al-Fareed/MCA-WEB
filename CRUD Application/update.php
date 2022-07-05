<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where bid='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="main.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a>
| <a href="insert.php">Insert New Record</a>
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['update']))
{
$id=$_POST['id'];
$name =$_POST['name'];
$rate =$_POST['rate'];
$publisher =$_POST['publisher'];
$pyear =$_POST['pyear'];
//$submittedby = $_SESSION["username"];
$update="update new_record set
bname='$name', brate='$rate',publisher='$publisher', pyear='$pyear' where bid='$id'";
mysqli_query($con, $update);
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['bid'];?>" />
<p><input type="text" name="name" placeholder="Enter Book Name"
required value="<?php echo $row['bname'];?>" /></p>
<p><input type="text" name="rate" placeholder="Enter Book Rate"
required value="<?php echo $row['brate'];?>" /></p>
<p><input type="text" name="publisher" placeholder="Enter Publisher Name"
required value="<?php echo $row['publisher'];?>" /></p>
<p><input type="text" name="pyear" placeholder="Enter Age"
required value="<?php echo $row['pyear'];?>" /></p>
<p><input name="update" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
