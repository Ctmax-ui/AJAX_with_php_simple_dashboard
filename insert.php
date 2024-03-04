<?php

require_once("./utility/connect.php");




if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["uName"];
    $useremail = $_POST["uEmail"];

    // echo $useremail . $username;

    if (empty($username)) {
        echo "username empty!!";
    }else{

        $insertSql = "INSERT INTO users (username, usermail,userfile) VALUES ('$username', '$useremail', '')";

        $result = mysqli_query($connect, $insertSql);
        if ($result) {
            echo "success";
        } else {
            echo "eror";
        }
    }
}
