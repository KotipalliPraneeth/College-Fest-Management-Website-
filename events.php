<?php
session_start();

      include("connection.php");
      include("functions.php");
      
      if($_SERVER['REQUEST_METHOD']=="POST")
      {
        //something was posted
        //$user_name=$_POST['user_name'];
        $event_name=$_POST['value'];
        //$event_name=$_POST['event_name'];
        //echo "user id is" .$_SESSION['id'];
        $pid=$_SESSION['id'];
        //$cllg=$_SESSION['college_name'];

        //if(!empty($event_name))
        //{
          //save to database
          if($event_name!='Back'){
          $check_query="select * from participants where PID='$pid'  and  event_name='$event_name'";
          $check=mysqli_query($con,$check_query);
          if(mysqli_num_rows($check)<=0){
          $query="insert into participants (PID,event_name) values ('" . $_SESSION['id'] . "','$event_name')";

          mysqli_query($con,$query);
          echo"Event registered";


          header("Location: events.php");
          die;}
        else
        {
          echo "You already registered that event";
        }}
        //$back=$_POST['back'];
        
        //echo "user id is" .$_SESSION['college_name'];
        //if($event_name==='Back'){
          //if($cllg==='IIT KGP'){
           // header("Location: kgp.php");
           // die;
          //}else{
           // header("Location: other.php");
           // die;
          //}
        //}
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
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
            justify-content: center;
            align-items: center;
            height: 160vh;
            color: white;
        }

        @keyframes backgroundAnimation {
            0% { background-position: 0% 0%; }
            100% { background-position: 100% 100%; }
        }

        #big-box {
            background-color: rgba(6, 6, 8, 0.7);
            width: 90%;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .event-box {
            background-color: rgba(6, 6, 8, 0.8);
            margin: 20px 0;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
        }

        .event-box h3 {
            text-align: center;
        }

        .event-box pre {
            white-space: pre-wrap;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            text-align: left; /* Ensure pre content is left-aligned */
        }

        #button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        #button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="big-box">
        <div class="event-box">
            <form method="post">
                <h3><b>Mega Event</b></h3>

                    Come and join the concerts of well-known artists from around the world!!
                <pre>
                    Date      :      13th March, 2024
                    Venue     :      Pronites ground
                    Time      :      7:00 PM
                    Register here!
                </pre>
                <input id="button" type="submit" name="value" value="Mega Event">
            </form>
        </div>

        <div class="event-box">
            <form method="post">
                <h3><b>Paint it!</b></h3>

                    Art enthusiasts get ready for showcasing your artistic skills.Paint it! is here..
                    Competition type: Art, Solo
                <pre>
                    Date            : 12th March, 2024
                    Venue           : Raman Auditorium
                    Timings         : 10:00 AM - 12:00 PM
                    1st prize       : 4k INR
                    2nd prize       : 3k INR
                    3rd prize       : 2k INR
                    Register here.
                </pre>
                <input id="button" type="submit" name="value" value="Paint it!">
            </form>
        </div>

        <div class="event-box">
            <form method="post">
                <h3><b>Shake a Leg</b></h3>

                    Hey there!! Are you ready to show your energetic and electrifying dance moves?
                    If yes, what are you waiting for? Register and participate to win exciting prizes
                    Competition type: Dance, Group (minimum: 3 - maximum: 7)
                <pre>
                    Date            : 12th March, 2024
                    Venue           : Kalidas Auditorium
                    Timings         : 2:00 PM - 5:00 PM
                    1st prize       : 10k INR
                    2nd prize       : 7k INR
                    3rd prize       : 5k INR
                    Register here.
                </pre>
                <input id="button" type="submit" name="value" value="Shake a Leg">
            </form>
        </div>
    </div>
</body>
</html>