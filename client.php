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

  <body>
    <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
    <form action="client.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
        <div class="form-group">
            <center><pin> enter pin </pin></center>
            <input name="pin" type="pin" class="form-control" placeholder="Enter PIN" required=true pattern="[0-9]{4}">
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

        <center><button type="submit" class="btn join" >Join </button></center>
        <br>
        <center> <button class="btn create" onclick="window.location.href='host.php'">Create</button> </center>
    </from>
    
  </body>
</html>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'config.php';
    $pin = $_POST['pin'];

    $sql = "SELECT pin FROM class_pin WHERE pin=:pin";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindParam(':pin', $pin, PDO::PARAM_STR);
    $stmt -> execute();

    if($stmt->rowCount() == 1){
      session_start();
      $_SESSION['pin'] = $pin;
      header("Location:insert_name.php?room=$pin");
    }else{
      echo '<script language="javascript">';
      echo 'alert("PIN Invalid.")';
      echo '</script>';
    }
  }
?>

<script>
  // window.onhashchange = function() {
  //   window.location.reload('insert_name.php');
  // }
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