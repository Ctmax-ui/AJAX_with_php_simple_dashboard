<?php
require_once("./utility/connect.php");


if (!empty($_POST["uid"])) {
    $userid = $_POST["uid"];

    $deletDataSql = "SELECT * FROM users WHERE userid='$userid'";

    $result = mysqli_query($connect, $deletDataSql);
    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {

            echo "<form>
    <input id='editid' value='" . $data['userid'] . "' type='hidden' />
    <input id='editname' value='" . $data['username'] . "' type='text' placeholder='name' />
    <input id='editemail' value='" . $data['usermail'] . "' type='text' placeholder='email' />
    <button id='editform' type='submit'>Submit</button>
</form>";
        }
    } else {
        echo "eror";
    }
}
