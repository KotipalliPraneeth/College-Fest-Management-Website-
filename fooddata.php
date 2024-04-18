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
            color: white;
            }

      @keyframes backgroundAnimation {
            0% { background-position: 0% 0%; }
            100% { background-position: 100% 100%; }
            }
      #box {
            background-color: rgba(4, 12, 17, 0.9);
            margin: auto;
            width: 60%;
            padding: 20px;
            border-radius: 10px;
       }
      table {
      width: 100%;
      text-align: center;
      {
      th {
      width: 20%;
      text-align: center;
      }
      td {
      text-align: center;
      }

    </style>

    <div id="box">

      <form method="post">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Days</th>
                <th>Starting date</th>
                <th>Non-veg</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
                <th>Snacks</th>
            </tr>
        <?php
session_start();

      include("connection.php");
      include("functions.php");

      //if($_SERVER['REQUEST_METHOD']=="POST")
      //{
        //something was posted
        //$user_name=$_POST['user_name'];
        //$event_name=$_POST['value'];
        //$event_name=$_POST['event_name'];
        //echo "user id is" .$_SESSION['id'];

        //if(!empty($event_name))
        //{
          //save to database

          $query = "SELECT food.*, users.user_name as name
          FROM food
          JOIN users ON food.id = users.id
          ";

$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>User Name</th><th>Event Name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["days"] . "</td><td>". $row["starting_date"] ."</td><td>". $row["non_veg"] ."</td><td>". $row["bf"] .
        "</td><td>". $row["lunch"] ."</td><td>". $row["dinner"] ."</td><td>". $row["snacks"] ."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 result";
}
      //}
          //else{
            //echo "0 result";
          //}
          //$user_data=mysqli_fetch_assoc($result);
          //foreach($user_data as $item){

            //echo $item;
          //}

          //header("Location: events.php");
          die;
        /*}else
        {
          echo "Please enter some valid information !";
        }*/
      //}

?></table>
        <!--<h3><b>EVENT2</b></h3>
        <input id="button" type="submit" name="value" value="EVENT2"><br><br>
        <h3><b>EVENT3</b></h3>
        <input id="button" type="submit" name="value"  value="EVENT3"><br><br>-->


        <!--<a href="login.php">Login</a><br><br>-->
      </form>
    </div>

</body>
</html>