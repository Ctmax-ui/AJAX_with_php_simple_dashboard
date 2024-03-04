<?php

require_once("./utility/connect.php");

$fetchDataFromUsers = "SELECT * FROM users";

$result = mysqli_query($connect, $fetchDataFromUsers);

//  print_r(mysqli_fetch_all($result));

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
                <td>" . $row['userid'] . "</td>
                
                <td>" . $row['username'] . "</td>

                <td>" . $row['usermail'] . "</td>

                <td><button class='edit-data' data-uid=".$row['userid'].">edit</button></td>

                <td><button class='delete-data' data-uid=".$row['userid'].">delete</button></td>
              
            </tr>
    
    ";
}



?>