<?php
session_start();
      include("connection.php");
      include("functions.php");

      $data=check_log($con);

     $_SESSION;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #button {
            padding: 12px 58px;
            color: white;
            background-color: purple;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            display: block;
            margin: 10px auto; /* Center the button */
        }

        #button:hover {
            background-color: darkpurple;
        }

        #box {
            background-color: rgba(6, 6, 8, 0.8);
            margin: auto;
            width: 90%;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            justify-content: space-between; /* Align buttons */
        }

        .logistic-box {
            background-color: rgba(6, 6, 8, 0.8);
            margin: 10px 5px; /* Adjust margin */
            width: calc(50% - 10px); /* Adjust width to make them side by side */
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 16px;
            box-sizing: border-box;
        }
    </style>
</head>
<header>
    <div>Welcome</div>
    <a href="logout.php"><input id="button" type="submit" value="Logout"></a>
</header>
<body>
<div id="box">
    <div class="logistic-box">
        <h2>Manage Events</h2>
        <p>Know the participants</p>
        <a href="eventsinfo.php"><input id="button" type="submit" value="Event Management"></a>
    </div>
    <div class="logistic-box">
        <h2> Volunteers</h2>
        <p>Get to know the registered volunteers</p>
        <a href="volunteerd.php"><input id="button" type="submit" value="Volunteer Recruitment"></a>
    </div>
    <div class="logistic-box">
        <h2>Food Catering</h2>
        <p>Look into food requirements</p>
        <a href="fooddata.php"><input id="button" type="submit" value="Food Catering"></a>
    </div>
    <div class="logistic-box">
        <h2>Accommodation Management</h2>
        <p>Check out lodging arrangements.</p>
        <a href="accommodation.php"><input id="button" type="submit" value="Accommodation Management"></a>
    </div>
</div>
</body>
</html>