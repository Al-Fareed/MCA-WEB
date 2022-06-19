<?php
$cookie_name = "Al-Fareed";
$cookie_value = 2;
?>
<html>
<body>
<?php
if(!isset($_COOKIE[$cookie_name])) {
 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
} else {
$newcookie_value=$_COOKIE[$cookie_name]+1;
setcookie($cookie_name, $newcookie_value, time() + (86400 * 30), "/");
 echo "Cookie '" . $cookie_name . "' is set!<br>";
 echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
</body>
</html>