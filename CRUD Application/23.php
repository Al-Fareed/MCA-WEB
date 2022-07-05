<?php   
    if(isset($_POST["submit"])) {
        $host="localhost";
        $dbName = "bestjobs";
        $userName = "root";
        $password = "";

        $con = new mysqli($host, $userName, $password, $dbName);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database";
            exit;
        } 


        $username = $_POST["username"];
        $password = $_POST["password"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $gender = $_POST["gender"];
        $nationality = $_POST["nationality"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];
        $address = $_POST["address"];
        $twitter = $_POST["twitter"];
        $facebook = $_POST["facebook"];
        $google = $_POST["google"];
        $ugCgpa = $_POST["ugCgpa"];
        $pgCgpa = $_POST["pgCgpa"];
        $project1 = $_POST["project1"];
        $project2 = $_POST["project2"];
        $project3 = $_POST["project3"];
 

        $sql = "insert into jobdata(username,password, firstName, lastName,gender,nationality,dob, email,phoneNumber,address,twitter,facebook,google,ugCgpa,pgCgpa,project1,project2,project3) values ('$username','$password','$firstName','$lastName','$gender','$nationality','$dob','$email','$phoneNumber','$address','$twitter','$facebook','$google','$ugCgpa','$pgCgpa','$project1','$project2','$project3')";
        mysqli_query($con,$sql);
        echo "Successfully stored data";
    }

 
    if(isset($_GET["step"]))  {
        $userData = array( 
            "step1" => array(
                "username" => array(
                    "validator" => function($text) {
                        if(!preg_match("/[A-Z][a-zA-Z0-9]\w+/",$text)) {
                            return "* Username should start with Uppercase followed by Alpha numeric values";
                        } else {
                            return false;
                        }
                    }
                ),
                "password" => array(
                    "validator" => function($text) {
                        if(strlen($text) < 8) {
                            return "* Password should have atleast 7 characters";
                        } else {
                            return false;
                        }
                    }
                ),
                "cpassword" => array(
                    "validator" => function($text) {
                        if(!$_GET['cpassword'] || $_GET['password'] != $text) {
                            return "* Password does not match";
                        } else {
                            return false;
                        }
                    }
                ),

            ), 

            "step2" => array(
                "firstName" => array(
                    "validator" => function($text) {
                        if(!preg_match("/^[A-Z a-z 0-9]{2,25}$/",$text)) {
                            return "* Enter Valid Name";
                        } else {
                            return false;
                        }
                    }
                ),
                "lastName" => array(
                    "validator" => function($text) {
                        if(!preg_match("/^[A-Z a-z 0-9]{2,25}$/",$text)) {
                            return "* Enter Valid Name";
                        } else {
                            return false;
                        }
                    }
                ),
                "gender" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* Gender Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ),
                "nationality" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* Nationality Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ),

                "dob" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* DOB Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ),
                

            ), 
            "step3" => array(
                "email" => array(
                    "validator" => function($text) {
                        if(!preg_match("/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?manipal\.edu$/",$text)) {
                            return "* Enter Valid email address";
                        } else {
                            return false;
                        }
                    }
                ),
                "phoneNumber" => array(
                    "validator" => function($text) {
                        if(strlen($text) < 10) {
                            return "* Enter Valid 10 digit Phone Number";
                        } else {
                            return false;
                        }
                    }
                ),
                "address" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* Address Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ), 
            ), 

            "step4" => array(
                "twitter" => array(
                    "validator" => function($text) {
                        if(!preg_match("/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%.\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%\+.~#?&=]*)/",$text)) {
                            return "*Enter Valid url";
                        } else {
                            return false;
                        }
                    }
                ),
                "facebook" => array(
                    "validator" => function($text) {
                        if(!preg_match("/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%.\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%\+.~#?&=]*)/",$text)) {
                            return "*Enter Valid url";
                        } else {
                            return false;
                        }
                    }
                ),
                "google" => array(
                    "validator" => function($text) {
                        if(!preg_match("/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%.\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%\+.~#?&=]*)/",$text)) {
                            return "*Enter Valid url";
                        } else {
                            return false;
                        }
                    }
                ), 
            ), 

            "step5" => array(
                "ugCgpa" => array(
                    "validator" => function($text) {
                        if(empty($text) || $text < 0 || $text > 10) {
                            return "*Enter Valid Marks";
                        } else {
                            return false;
                        }
                    }
                ),
                "pgCgpa" => array(
                    "validator" => function($text) {
                        if(empty($text) || $text < 0 || $text > 10) {
                            return "*Enter Valid Marks";
                        } else {
                            return false;
                        }
                    }
                ),
                "project1" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* Project 1 Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ), 
                "project2" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* Project 2 Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ), 
                "project3" => array(
                    "validator" => function($text) {
                        if(empty($text)) {
                            return "* Project 3 Field cannot be empty";
                        } else {
                            return false;
                        }
                    }
                ), 
            ), 
        );
        $data = array();
        foreach ($userData as $step => $setData) {
            if($step == $_GET["step"]) {
                foreach($setData as $key => $keyData) {
                    if($keyData["validator"]($_GET[$key])) {
                        array_push(
                            $data,
                            array(
                                "key" => $key,
                                "message" => $keyData["validator"]($_GET[$key])
                            )
                        );
                    }
                }
            }
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data); 
    }
?>