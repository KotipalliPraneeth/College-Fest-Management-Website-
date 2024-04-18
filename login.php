<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $college_name = $_POST['college_name'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Read from database
        $query = "SELECT * FROM users WHERE user_name='$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password&&$user_data['college_name']===$college_name) {
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['id'] = $user_data['id'];
                
                // Set $_SESSION['college_name'] based on user input
                $_SESSION['college_name'] = $college_name;

                if ($college_name === 'IIT KGP') {
                    header("Location: kgp.php");
                    die;
                } else {
                    header("Location: other.php");
                    die;
                }
            } else {
                echo "Incorrect information!";
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Please fill all fields";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">

       body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: rgba(8, 8, 8, 0.89);
            animation: backgroundAnimation 20s infinite linear;
            animation-delay: -5s;
            display: flex;
            flex-direction: column;
            height: 100vh;
            color: white;
            }

       @keyframes backgroundAnimation {
            0% { background-position: 0% 0%; }
            100% { background-position: 100% 100%; }
            }
       header {
            background-color: rgba(10, 10, 8, 0.7);
            color: white;
            text-align: left;
            padding: 20px;
            box-sizing: border-box;
            width: 100%;
            z-index: 100;
            }

       .input-field {
            height: 35px;
            border-radius: 5px;
            padding: 8px;
            border: solid thin #aaa;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 16px;
       }

       #button {
            padding: 12px;
            width: 100%;
            color: white;
            background-color: purple;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
       }

       #button:hover {
            background-color: darkpurple;
       }

       #box {
            background-color: rgba(6, 6, 8, 0.8);
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
       }

       #signup-link {
            color: purple;
            text-decoration: none;
            margin-top: 10px;
            font-size: 14px;
       }

       #signup-link:hover {
            text-decoration: underline;
       }

       #login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
       }

       .create-account, .signup-link {
            color: white;
            font-size: 14px;
       }

       .signup-container {
            text-align: center;
       }

    </style>
</head>
<header>
    <div class="title-box">
        <h1>University Cultural Fest</h1>
    </div>
</header>
<body>

    <div id="box">

      <form id="login-form" method="post">
        <div style="font-size:20px;margin:10px;color:white;">Login</div>

        <input class="input-field" type="text" name="user_name" placeholder="Username">
        <input class="input-field" type="password" name="password" placeholder="Password">
        <input class="input-field" type="text" name="college_name" placeholder="College Name">

        <input id="button" type="submit" value="Login">

        <div class="signup-container">
            <span class="create-account">Create an account.</span>
            <a class="signup-link" href="signup.php">Sign up</a>
        </div>
        

      </form>
    </div>

</body>
</html>