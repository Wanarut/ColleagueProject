<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Enter Name </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </head>

  <body class="login">
    <div class="container container-login">
      <form action="insert_name.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
        <div class="form-group has-feedback">
          <center>
            <label class="col-sm-6">Name</label>

            <div class="col-sm-6">
              <input name="client_name" type="text" class="form-control" placeholder="Enter your name" 
                    required=true pattern="[0-9]{9}">
              <div class="valid-feedback">
                Looks good!
              </div>
              <div class="invalid-feedback">
                Please enter valid Name.
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
    session_start();
    $pin = $_SESSION['pin'];
    $client_name = $_POST['client_name'];
    if(isset($pin)){
      try{
        require_once 'config.php';
        $sql = "INSERT INTO client (pin,client_name) VALUES (:pin,:client_name)";
        $stmt = $pdo->prepare($sql);
        // Bind parameters to statement
        $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
        $stmt->bindParam(':client_name', $client_name, PDO::PARAM_STR);
        $stmt->execute();

        session_unset();
        session_destroy();
        header('Location:personality_test.php');
        echo '<script language="javascript">';
        echo 'alert("Join room successfully.")';
        echo '</script>';
      } catch(PDOException $e){
        echo '<script language="javascript">';
        echo 'alert("This name already used.")';
        echo '</script>';
      }
    }else{
      header('Location:client.php');
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