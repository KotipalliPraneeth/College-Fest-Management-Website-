<?php
session_start();

      include("connection.php");
      include("functions.php");
      
      if($_SERVER['REQUEST_METHOD']=="POST")
      {
        //something was posted
        //$user_name=$_POST['user_name'];
        $days=$_POST['days'];
        $non_veg=$_POST['non_veg'];
        $starting_date=$_POST['starting_date'];
        if(!empty($_POST['bf'])){
            $bf=$_POST['bf'];}
            else{$bf=0;}
        if(!empty($_POST['lunch'])){
            $lunch=$_POST['lunch'];}
            else{$lunch=0;}
        if(!empty($_POST['dinner'])){
        $dinner=$_POST['dinner'];}
        else{$dinner=0;}
        if(!empty($_POST['snacks'])){
            $snacks=$_POST['snacks'];}
            else{$snacks=0;}
        

        echo "user id is" .$_SESSION['id'];

        if(!empty($non_veg)&&!empty($days))
        {
          //save to database
          
          $query="insert into food (id,days,non_veg,bf,lunch,dinner,snacks,starting_date) values ('" . $_SESSION['id'] . "','$days','$non_veg','$bf','$lunch','$dinner','$snacks','$starting_date')";

          mysqli_query($con,$query);

          header("Location: other.php");
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
    <title>food</title>
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

        #mini-box {
            background-color: rgba(6, 6, 8, 0.9);
            margin: auto;
            width: 80%; /* Adjusted width to 80% */
            padding: 20px;
            border-radius: 10px;
       }
        #login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
       }

       /* Added CSS to align checkboxes vertically */
       #mini-box .checkbox-container {
            display: flex;
            align-items: center;
       }

       #mini-box .checkbox-container input[type="checkbox"] {
            margin-right: 10px;
       }

    </style>

    <div id="box">

      <form id="login-form" method="post">
        <div style="font-size:20px;margin:10px;color:white;"><b>Food booking</b></div>
         non veg = 1, veg = 0<br><br>

        <input class="input-field"  type="boolean" name="non_veg" placeholder="1 or 0">
        <input class="input-field"  type="date" name="starting_date">
        <input class="input-field" type="text" name="days" placeholder="number of days">
          <div id="mini-box">
              <div class="checkbox-container">
                  <input type="checkbox" name="bf" value="1">
                  <label for="bf">Breakfast</label>
              </div>
              <div class="checkbox-container">
                  <input type="checkbox" name="lunch" value="1">
                  <label for="lunch">Lunch</label>
              </div>
              <div class="checkbox-container">
                  <input type="checkbox" name="snacks" value="1">
                  <label for="snacks">Snacks</label>
              </div>
              <div class="checkbox-container">
                  <input type="checkbox" name="dinner" value="1">
                  <label for="dinner">Dinner</label>
              </div>
          </div>

        <a href="other.php"><input id="button" type="submit" value="order">

        <!--<a href="login.php">Login</a><br><br>-->
      </form>
    </div>

</body>
</html>