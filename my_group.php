<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Enter PIN </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>
  <style type="text/css">
    pingroup{
    font-weight: bold;
    text-align: center;
    font-size: 48px;
    color:  black;
  }
  namegroup{
    font-weight: bold;
    text-align: center;
    font-size: 24px;
    color:  black;
  }   
  </style>
  <body>
    <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
    <center>
        <?php
            require_once 'config.php';

            $sql = "SELECT * FROM client WHERE team_no=(SELECT team_no FROM client WHERE client_name=:client_name) and pin=:pin";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindParam(':client_name', $_GET["client"], PDO::PARAM_STR);
            $stmt -> bindParam(':pin', $_GET["room"], PDO::PARAM_STR);
            // $id = "590610656";
            // $roomom = "1150";
            // $stmt -> bindParam(':client_name', $id, PDO::PARAM_STR);
            // $stmt -> bindParam(':pin', $roomom , PDO::PARAM_STR);
            $stmt -> execute();
            
            echo "<pingroup>Your Team" . "</pingroup>".'<br><br>';

            while($row = $stmt->fetch()){          
                echo "<namegroup>Name " . $row['client_name'] . " type " . $row['type']."<namegroup>".'<br>';
            }
        ?>
    </center>  
  </body>
</html>
