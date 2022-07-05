<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <h3>Upload your Resume</h3>
    <input type="file" name="resume" id="">
    <input type="submit">
</form>
    <?php
       if(isset($_FILES['resume']))
       {
           $file_name=$_FILES['resume']['name'];
           $file_size=$_FILES['resume']['size'];
           $file_tmp=$_FILES['resume']['tmp_name'];
           $file_type=$_FILES['resume']['type'];
           $tmp=explode('.',$_FILES['resume']['name']);
           $file_ext=end($tmp);
           
           if($file_ext=='pdf')
           {
               if($file_size>2097152)
               {
                   echo "<br/>File size must be less than 2MB";
               }
               else{
                    move_uploaded_file($file_tmp,"Resume/".$file_name);
                    echo "<br/>Success";
               }
           }
           else{
            echo $file_ext;
               print "files can't be uploaded Only PDF formats are allowed";
           }


       }
    ?>
</body>
</html>