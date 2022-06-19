<?php
require('db.php');
include("auth.php");
$status = "";
if(isset($_POST['submit'])){
 //$trn_date = date("Y-m-d H:i:s");
 $name =$_POST['name'];
 $rate = $_POST['rate'];
$publisher =$_POST['publisher'];
 $pyear = $_POST['year'];
 $submittedby = $_SESSION["username"];
 $ins_query="insert into new_record
 (bname,brate,publisher,pyear)values
 ('$name','$rate','$publisher','$pyear')";
 mysqli_query($con,$ins_query);
 $status = "New Record Inserted Successfully.
 </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="main.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a>
| <a href="view.php">View Records</a>
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Books</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Book Name" required /></p>
<p><input type="text" name="rate" placeholder="Enter Book Rate" required /></p>
<p><input type="text" name="publisher" placeholder="Enter Publisher Name" required /></p>
<p><input type="text" name="year" placeholder="Enter Published Year" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
