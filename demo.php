 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accommodate</title>
</head>
<body>
    
    <style type="text/css">

    #text{
        height:25px;
        border-radius:5px;
        padding:4px;
        border:solid thin #aaa;
        width:100%;
    }

    #button{
        padding:10px;
        width:100px;
        color:white;
        background-color:lightblue;
        border:none;
        
    }

    #box{
        background-color:grey;
        margin:auto;
        width:300px;
        padding:20px;
    }

    </style>

    <div id="box">

      <form method="post">
        <div style="font-size:20px;margin:10px;color:white;">Event registration</div>

        
        
        <br><br>
        <h3><b>EVENT1</b></h3>
        <input id="button" type="submit" name="value" value="EVENT1"><br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        <?php
session_start();

      include("connection.php");
      include("functions.php");
      
      if($_SERVER['REQUEST_METHOD']=="POST")
      {
        //something was posted
        //$user_name=$_POST['user_name'];
        //$event_name=$_POST['value'];
        //$event_name=$_POST['event_name'];
        //echo "user id is" .$_SESSION['id'];

        //if(!empty($event_name))
        //{
          //save to database
          
          $query="select * from users";


          $result=mysqli_query($con,$query);
          
          if($result-> num_rows >0){
            while($row = $result-> fetch_assoc()){
                echo "<pre><tr><td>". $row["id"] ."</td><td>  ". $row["user_name"] ."</td><td>    ". $row["password"] ."</td></tr><br></pre>" ;
            }
            
          }
          else{
            echo "0 result";
          }
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
      }

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

