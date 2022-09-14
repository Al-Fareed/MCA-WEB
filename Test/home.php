<?php
    require("conn.php");
    $fetch="SELECT * from newuser";
    $res=mysqli_query($conn,$fetch);
    while(true)
    {
        $row=mysqli_fetch_array($res);
        if($row){
        echo "<p>".$row['name']."</p>";
        }else
        {
        exit;}
    }
?>