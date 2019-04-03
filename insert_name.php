<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Enter Name </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>

  <body>
    <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
    <form action="insert_name.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
        <div class="form-group">
          <center><pin> enter your code </pin></center>
          <input name="client_name" type="pin" class="form-control" placeholder="Enter Code" required=true pattern="[0-9]{9}">
          <div class="valid-feedback">
            <font color="white">Let's Go!!</font>
          </div>
          <div class="invalid-feedback">
            <font color="white">Please enter valid PIN.</font>
          </div>
        </div>  
        </div>
        <div class="col-sm-5"></div>
      </div>
      <!-- <center><input type="image" src="img\UI\StartGrouping.png" type="submit" width="250" height="250"></center> -->
      <center><input type="image" src="img\UI\StartGrouping.png" alt="submit" width="300" height="80"></center>
    </from>
  </body>
</html>

<?php
  session_start();
  $pin = $_SESSION['pin'];
  if(!isset($pin)){
    header('Location:client.php');
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $client_name = $_POST['client_name'];
    try{
      require_once 'config.php';
      $sql = "INSERT INTO client (pin,client_name) VALUES (:pin,:client_name)";
      $stmt = $pdo->prepare($sql);
      // Bind parameters to statement
      $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
      $stmt->bindParam(':client_name', $client_name, PDO::PARAM_STR);
      $stmt->execute();

      $_SESSION['pin'] = NULL;
      $_SESSION['client_name'] = $client_name;
      header('Location:personality_test.php');

      // echo '<script language="javascript">';
      // echo 'alert("Join room successfully.")';
      // echo '</script>';
    } catch(PDOException $e){
      echo '<script language="javascript">';
      echo 'alert("This name already used.")';
      echo '</script>';
    }
  }
?>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>