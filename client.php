<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Enter PIN </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </head>

  <body class="login">
    <div class="container container-login">
      <form action="client.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
        <div class="form-group has-feedback">
          <center>
            <label class="col-sm-6">PIN</label>

            <div class="col-sm-6">
              <input name="pin" type="text" class="form-control" placeholder="Enter PIN" 
                    required=true pattern="[0-9]{4}">
              <div class="valid-feedback">
                Looks good!
              </div>
              <div class="invalid-feedback">
                Please enter valid PIN.
              </div>
            </div>

            <br>

            <div class="col-sm-6">
              <button type="submit" class="btn btn-success"> Submit </button>
              <button type="reset" class="btn btn-danger"> Reset </button>
            </div>
          </center>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'config.php';
    $pin = $_POST['pin'];

    $sql = "SELECT * FROM class_pin WHERE pin=:pin";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindParam(':pin', $pin, PDO::PARAM_STR);
    $stmt -> execute();

    if($stmt->rowCount() == 1){
      session_start();
      $_SESSION['pin'] = $pin;
      header('Location:insert_name.php');
    }else{
      echo '<script language="javascript">';
      echo 'alert("PIN Invalid.")';
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