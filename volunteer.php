<?php
session_start();

      include("connection.php");
      include("functions.php");
      
      if($_SERVER['REQUEST_METHOD']=="POST")
      {
        //something was posted
        //$user_name=$_POST['user_name'];
        
        $event_name=$_POST['event_name'];
        //echo "user id is" .$_SESSION['id'];
        $id=$_SESSION['id'];
        $check_query="select * from volunteers where id='$id'  and  event_name='$event_name'";
          $check=mysqli_query($con,$check_query);
          

        if(!empty($event_name))
        {
          //save to database
          if(mysqli_num_rows($check)<=0){
          $query="insert into volunteers (id,event_name) values ('" . $_SESSION['id'] . "','$event_name')";

          mysqli_query($con,$query);

          header("Location: kgp.php");
          die;
        }else
        {
          echo "Already registered as volunteer for that event";
        }
      }else{
        echo "Enter some event name";
      }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accommodate</title>
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
        #login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
       }

    </style>

    <div id="box">

      <form id="login-form" method="post">
        <div style="font-size:20px;margin:10px;color:white;">Volunteer registration</div>



        <input class="input-field" type="text" placeholder="Enter event name" name="event_name">
        <a href="other.php"><input id="button" type="submit" value="Register"></a>

        <!--<a href="login.php">Login</a><br><br>-->
      </form>
    </div>

</body>
</html>