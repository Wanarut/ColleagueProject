<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        header('Location:client.php');
    }

    session_start();
    $team_size = $_SESSION['team_size'];
    if(!isset($team_size)){
        header('Location:client.php');
    }

    require_once 'config.php';
    while(true){
        $pin = rand(1000,9999);
        try{
            $sql = "INSERT INTO class_pin (pin,team_size) VALUES (:pin,:team_size)";
            $stmt = $pdo->prepare($sql);
            // Bind parameters to statement
            $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
            $stmt->bindParam(':team_size', $team_size, PDO::PARAM_STR);
            $stmt->execute();
      
            $_SESSION['pin'] = $pin;
            $_SESSION['team_size'] = $team_size;
            break;
        } catch(PDOException $e){}
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Create Room </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </head>

  <body class="login">
    <div class="container container-login">
      <form action="gen_pin.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
        <div class="form-group has-feedback">
          <center>
            <label class="col-sm-6">Your PIN : <?php echo $pin ?></label>

            <br>

            <div class="col-sm-6">
              <button type="submit" class="btn btn-success"> Start Grouping </button>
            </div>
          </center>
        </div>
      </form>
    </div>
  </body>
</html>