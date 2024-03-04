<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax test</title>
</head>

<body>

    <form id="myform">
        <p id="msg">Type your name and email</p>
        <input id="username" type="text" placeholder="Create a username">
        <input id="useremail" type="email" placeholder="put your email">
        <button type="submit">submit</button>

    </form>


    <table>
        <thead>
            <tr>
                <th>id | </th>
                <th>user_name | </th>
                <th>user_email</th>
            </tr>
        </thead>
        <tbody id="table-body">
           
        </tbody>
    </table>

    <div id="abc"></div>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./index.js"></script>
    <script>
        $(document).ready(() => {

            $("#myform").on("submit", (e) => {
                e.preventDefault();

                let username = $("#username").val();
                let useremail = $("#useremail").val();

                if (username != "" && useremail != "") {
                    // console.log(username, useremail);

                    $.ajax({
                        url: "./insert.php",
                        method: "POST",
                        data: {
                            uName: username,
                            uEmail: useremail
                        },
                        success: (response) => {
                            switch (response) {
                                case "success":
                                    $("#username").val("");
                                    $("#useremail").val("");

                                    $("#msg").text("User created successfully.");

                                    getUserdata();

                                    break;
                                case "eror":
                                    $("#msg").html("Try again later. <a href='#'>click to see the details</a> ");

                                    break;

                            };
                        }
                    });




                } else {
                    $("#msg").text("Your username or email is empty.");
                }

            });

            function getUserdata() {
                $.ajax({
                    url: "./fetchuserdata.php",
                    method: "POST",
                    data: {},
                    success: (response) => {
                        $("#table-body").html(response);
                    }
                });
            };
            getUserdata();

            $(document).on("click", '.delete-data', (e) => {
                let userConfirmDelete = confirm("u sure u want to delet this data?");
                if (userConfirmDelete) {
                    let userid = $(e.target).data("uid");

                    $.ajax({
                        url: "./deletdata.php",
                        method: "POST",
                        data: {
                            uid: userid
                        },
                        success: (response) => {

                            switch (response) {
                                case "success":
                                    getUserdata();
                                    break;
                                case "eror":
                                    break;
                            }
                        }
                    });
                } else {

                };
            });

            $(document).on("click", ".edit-data", e => {
                let userid = $(e.target).data("uid");
                // console.log(userid);
                $.ajax({
                    url: "./fetchedituserform.php",
                    method: "POST",
                    data: {
                        uid: userid
                    },
                    success: (response) => {
                            $("#abc").html(response);
                    }
                });

            })

            $(document).on("click", "#editform", function (e) {
                e.preventDefault();
                const name = $("#editname").val();
            const email = $("#editemail").val();
            const id = $("#editid").val();

            $.ajax({
                url: "./edituser.php",
                method: "POST",
                data:{uid:id,uname:name,uemail:email},
                success: (response)=>{
                    switch(response){
                        case "success": 
                            $("#abc").html("");
                            getUserdata();
                            break;
                    }
                }
            })
        })


        })
    </script>
</body>

</html>