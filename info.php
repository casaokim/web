<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$message = filter_input(INPUT_POST, 'message');

if(!empty($username)){
if(!empty($password)){
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname = "kamote";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errorno() .') '. mysqli_connect_error());

}
else{
$sql = "INSERT INTO kims (username, password, message)
values ('$username','$password', '$message')";
if ($conn->query($sql)){
echo "New record inserted sucessfully";
}
else{
echo "Error: ". $sql ."<br>". $conn->error; 
}
$conn->close();
}
}
else{
echo "Password should not be empty";
}
}
else{
echo "Username should not be empty";
die();
}


?>