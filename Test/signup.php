<?php
    require("conn.php");
    $name=$_POST['uname'];
    $mail=$_POST['email'];
    $pass=$_POST['pass'];
    $conpass=$_POST['cnpass'];
    $pregname="/^[A-Z]+[A-z]{5,}/";
    $pregmail="/^[a-z]+[.][a-z]+(@gmail.com)$/";
    $pregpass="/^(?=.+\w)(?=.+\d)(?=.+[$])/";
    

    if((preg_match($pregname,$name)) && (preg_match($pregmail,$mail)) && (preg_match($pregpass,$pass)))
    {   
        ?><script>alert("got in");</script><?php
        $srch="SELECT * FROM newuser where name='$name'";
        $result=mysqli_query($conn,$srch);
        while($row=mysqli_fetch_array($result)){
            if($mail==$row['email'])
            {
                echo "User with this mail already exist";
                exit;
            }
        }
        //
            $file="data.json";
            $arrdata=array();
            $formdata=array(
                'UserName' => $name,
                'Email'=>$mail,
                'Password'=>$pass 
            );
            
            $jsondata=file_get_contents($file);
            $arrdata=json_decode($jsondata,true);
            array_push($arrdata,$formdata);
            $jsondata=json_encode($arrdata,JSON_PRETTY_PRINT);
            if(file_put_contents($file,$jsondata))
            {
                echo "\nInserted Successfully into jason file";
            }    
            //        
                $insquery="INSERT into `newuser` (name,email,password) values ('$name','$mail','$pass')";
                $insert=mysqli_query($conn,$insquery);
                if($insert)
                {
                    echo "\nInserted Successfully into DB";
                }
               
            
        
    }
    else
    {
        echo "aaayiji";
    }
?>