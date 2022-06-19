<!DOCTYPE html>
<html>
<head>
<style>
table {
 width: 100%;
 border-collapse: collapse;
}
table, td, th {
 border: 1px solid black;
 padding: 5px;
}
th {text-align: left;}
</style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
First name:<br>
<input type="text" name="firstName" id="firstName">
<br><br/>
Last name:<br>
<input type="text" name="lastName" id="lastName">
<br><br>
 
Email:<br>
<input type="text" name="email" id="email">
<br><br>
 
Mobile:<br>
<input type="text" name="mobile" id="mobile">
<br><br>
<input type="submit" value="Submit">
</form>

<?php
 
 $myFile = "data.json";
 $arr_data = array(); // create empty array
 try
 {
 //Get form data
 $formdata = array(
 'FirstName'=> $_POST['firstName'],
 'LastName'=> $_POST['lastName'],
 'Email'=>$_POST['email'],
 'Mobile'=> $_POST['mobile']
 );
 //Get data from existing json file
 $jsondata = file_get_contents($myFile);
 // converts json data into array
 $arr_data = json_decode($jsondata, true);
 // Push user data to array
 array_push($arr_data,$formdata);
 //Convert updated array to JSON
 $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
 
 //write json data into data.json file
 if(file_put_contents($myFile, $jsondata)) {
 echo 'Data successfully saved';
$arr_data = json_decode($jsondata, true);
echo "<br/> <h4> Information Entered </h4>";
echo "<table>
<tr>
<th>FirstName</th>
<th>LastName </th>
<th>Email</th>
<th>Mobile</th>
</tr>";
foreach($arr_data as $x=>$x_value){
echo "<tr>";
echo "<td>" .$x_value["FirstName"]. "</td>";
echo "<td>" .$x_value["LastName"]. "</td>";
echo "<td>" .$x_value["Email"]. "</td>";
echo "<td>" .$x_value["Mobile"]. "</td>";
echo "</tr>";
}
echo "</table>";
} 
 else 
 echo "error";
 }
 catch (Exception $e) {
 echo 'Caught exception: ', $e->getMessage(), "\n";
 }
?>
</body>
</html>