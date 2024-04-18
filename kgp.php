<?php
session_start();
      include("connection.php");
      include("functions.php");

      $user_data=check_login($con);

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
            margin: 20px auto; /* Center the button */
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
            }
        .event-box {
            background-color: rgba(6, 6, 8, 0.8);
            margin: 20px auto;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            font-family: Arial, sans-serif;
            }

        .event-box pre {
            white-space: pre-wrap;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            text-align: left;
            }

       </style>
</head>
<header>
    <div>Hello, <?php echo $user_data['user_name'];?></div>
    <a href="logout.php"><input id="button" type="submit" value="Logout"></a>
</header>
<body>
<div id="box">
    <h1>Hola, Kgpians!</h1>
    <div class="event-box">
        <pre>
            Experience a whirlwind of excitement with our upcoming events! On March 12th, 2024, unleash your creativity at "Paint it!" in the Raman Auditorium, showcasing your artistic prowess for a chance to win up to 4k INR. Later, let loose and "Shake a Leg" at the Kalidas Auditorium, competing for a grand prize of 10k INR with your electrifying dance moves. Then, on March 13th, 2024, join us at the Pronites ground for a "Mega Event" featuring global artists, promising an unforgettable night of music and entertainment. Don't miss out—register now and be part of these thrilling experiences!
        </pre>
        <a href="events.php"><input id="button" type="submit" value="Event Registration"></a>
    </div>
    <div class="event-box">
        <pre>
            Calling all students! Fuel your passion for event management by volunteering at our upcoming events! Whether you're a budding artist, a dance enthusiast, or simply love the thrill of organizing unforgettable experiences, there's a place for you. Join us on March 12th, 2024, at the Raman Auditorium for "Paint it!" and the Kalidas Auditorium for "Shake a Leg." Then, on March 13th, 2024, lend your energy to the "Mega Event" at the Pronites ground. Dive into the behind-the-scenes action, gain valuable experience, and make lasting memories. Sign up now to become a vital part of these incredible events!
        </pre>
        <a href="volunteer.php"><input id="button" type="submit" value="Registration as Volunteer"></a>
    </div>
</div>
</body>
</html>
