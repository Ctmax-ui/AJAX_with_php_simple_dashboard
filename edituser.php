<?php
require_once("./utility/connect.php");

$name = $_POST['uname'];
$email = $_POST['uemail'];
$id = $_POST['uid'];

$updateSQl = "UPDATE users SET username ='$name',usermail='$email' WHERE userid = '$id'";


$result = mysqli_query($connect, $updateSQl);

if ($result) {
      echo "success";
} else {
      echo "error";
}
