<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Inform </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>

  <body>
    <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
    <center><test>Waiting...</test></center>
      <!-- <form action="personality_test.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
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
        <center><button type="submit" class="btn start" > Start Grouping </button></center>
    </from> -->
  </body>
</html>

<?php
  function calculate_personality($team_size){
    $type = rand(1,$team_size);
    return $type;
  }

  require_once 'config.php';
  session_start();
  $client_name = $_SESSION['client_name'];
  $team_size = 1;

  $sql = "SELECT team_size FROM class_pin WHERE pin=(SELECT pin FROM client WHERE client_name=:client_name)";
  $stmt = $pdo->prepare($sql);
  $stmt -> bindParam(':client_name', $client_name, PDO::PARAM_STR);
  $stmt -> execute();

  if($stmt->rowCount() == 1){
    $row = $stmt->fetch();
    $team_size = $row['team_size'];
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $type = calculate_personality($team_size);
    $sql = "UPDATE client SET type=:type WHERE client_name=:client_name";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindParam(':type', $type, PDO::PARAM_STR);
    $stmt -> bindParam(':client_name', $client_name, PDO::PARAM_STR);
    $stmt -> execute();

    echo 'Your personal type is '.$type;
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