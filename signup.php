<?php
session_start();

      include("connection.php");
      include("functions.php");
      
      if($_SERVER['REQUEST_METHOD']=="POST")
      {
        //something was posted
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        $college_name=$_POST['college_name'];

        if(!empty($user_name)&&!empty($password)&&!is_numeric($user_name)&&!is_numeric($college_name)&&!empty($college_name))
        {
          //save to database
          $user_id= random_num(20);
          $query="insert into users (user_id,user_name,password,college_name) values ('$user_id','$user_name','$password','$college_name')";

          mysqli_query($con,$query);

          header("Location: login.php");
          die;
        }else
        {
          echo "Please enter some valid information !";
        }
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>

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

       #login-link {
            color: purple;
            text-decoration: none;
            margin-top: 10px;
            font-size: 14px;
       }

       #login-link:hover {
            text-decoration: underline;
       }


       .login-here, .login-link {
            color: white;
            font-size: 14px;
       }

       .login-container {
            text-align: center;
       }

       #organiser-link {
            color: purple;
            text-decoration: none;
            margin-top: 10px;
            font-size: 14px;
       }

       #organiser-link:hover {
            text-decoration: underline;
       }

       #login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
       }

       .organiser, .organiser-link {
            color: white;
            font-size: 14px;
       }

       .organiser-container {
            text-align: center;
       }

       #admin-link {
            color: purple;
            text-decoration: none;
            margin-top: 10px;
            font-size: 14px;
       }

       #admin-link:hover {
            text-decoration: underline;
       }


       .admin, .admin-link {
            color: white;
            font-size: 14px;
       }

       .admin-container {
            text-align: center;
       }

    </style>

    <div id="box">

      <form id="login-form" method="post">
        <div style="font-size:20px;margin:10px;color:white;">Signup</div>

        <input class="input-field"  type="text" name="user_name" placeholder="username">
        <input class="input-field" type="password" name="password" placeholder="password">
        <input class="input-field" type="text" name="college_name" placeholder="collage name">
        <input id="button" type="submit" value="Signup">
          <div class="login-container">
            <span class="login-here">login here.</span>
            <a class="login-link" href="login.php">log in</a>
        </div>
          <div class="organiser-container">
            <span class="organiser">Are you organizer?</span>
            <a class="organiser-link" href="organiser.php">sign in</a>
        </div>
        <div class="admin-container">
            <span class="admin">Are you admin?</span>
            <a class="admin-link" href="alogin.php">sign in</a>
        </div>

      </form>
    </div>

</body>
</html>