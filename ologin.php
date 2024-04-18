<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
  //something was posted
  $name=$_POST['name'];
  $password=$_POST['password'];
  //$college_name=$_POST['college_name'];

  if(!empty($name)&&!empty($password)&&!is_numeric($name))
  {
    //read from database
    $query="select * from organizers where name='$name' limit 1";

    $result=mysqli_query($con,$query);
    
    if($result)
    {
        if($result&& mysqli_num_rows($result)>0)
        {
            $data=mysqli_fetch_assoc($result);

            if($data['password']===$password){
                $_SESSION['ID']=$data['ID'];
                
                
                  header("Location: organic.php");
                die;
            }
        }
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
    <title>Login</title>
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
        <div style="font-size:20px;margin:10px;color:white;">Organiser Login</div>

        <input class="input-field"  type="text" name="name" placeholder="username">
        <input class="input-field" type="password" name="password" placeholder="password">

        <input id="button" type="submit" value="Login">

        <!--<a href="signup.php">Signup</a><br><br>-->
      </form>
    </div>

</body>
</html>