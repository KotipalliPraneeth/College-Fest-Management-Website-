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
        $doit=$_POST['value'];

        if(!empty($user_name)&&!empty($password)&&!is_numeric($user_name)&&!is_numeric($college_name)&&!empty($college_name))
        {
          //save to database
          $user_id= random_num(20);
          if($doit==='add'){
          $query="insert into users (user_id,user_name,password,college_name) values ('$user_id','$user_name','$password','$college_name')";

          mysqli_query($con,$query);

          header("Location: login.php");
          die;}else if($doit=='delete'){
            $query=" DELETE FROM users
            WHERE college_name = '$college_name' AND password = '$password' AND user_name='$user_name'
            ";

          mysqli_query($con,$query);

          header("Location: login.php");
          die;
            
          }
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
    <title>admin</title>
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
    </style>

    <div id="box">

      <form id="login-form" method="post">
        <div style="font-size:20px;margin:10px;color:white;"></div>

        <input class="input-field"  type="text" placeholder="Enter user name"  name="user_name">
        <input class="input-field" type="password" placeholder="Enter password" name="password">
        <input class="input-field" type="text" placeholder="Enter college name" name="college_name">


        <input id="button" type="submit" name="value" value="add"><br><br>

        <input id="button" type="submit" name="value" value="delete">




        <!--<a href="login.php">Login</a><br><br>-->
      </form>
    </div>

</body>
</html>