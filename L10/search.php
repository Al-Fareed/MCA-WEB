<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="main.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<p><a href="search.php">Search Books</a></p>
<a href="logout.php">Logout</a>
<form>
<br/><br/>
<label for="book">Book Search </label>
<div>
<input type="text" id="book" onKeyUp="book_suggestion()">
<div id="suggestion"></div>
</div>
<input name="submit" type="submit" value="Submit" />
</form>
</div>
<script>
function book_suggestion()
{
var book = document.getElementById("book").value;
var xhr;
if (window.XMLHttpRequest) { // Mozilla, Safari, ...
 xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
 xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "bname=" + book;
 xhr.open("POST", "suggestion.php", true);
 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 xhr.send(data);
xhr.onreadystatechange = display_data;
function display_data() {
if (xhr.readyState == 4) {
 if (xhr.status == 200) {
 //alert(xhr.responseText);
 document.getElementById("suggestion").innerHTML = xhr.responseText;
 } else {
 alert('There was a problem with the request.');
 }
 }
}
}
</script>
</body>
</html>
