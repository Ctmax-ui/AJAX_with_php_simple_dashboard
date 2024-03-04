<?php
require_once("./utility/connect.php");

$userid=$_POST["uid"];

$deletDataSql= "DELETE FROM users WHERE userid='$userid'";

$result= mysqli_query($connect,$deletDataSql);

if($result){
    echo "success";
}else{
    echo "eror";
}


?>