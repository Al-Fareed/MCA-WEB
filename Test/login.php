<?php
    $name=$_POST['uname'];
    $pass=$_POST['pass'];
    require('conn.php');
    $srch="SELECT * FROM newuser where password='$pass'";
    $query=mysqli_query($conn,$srch);
    
    while($row=mysqli_fetch_array($query))
    {

        if($pass==$row['password'])
        {
            header('Location:home.php');
        }
        else
        {
            echo "There was an error";
        }
    }
?>