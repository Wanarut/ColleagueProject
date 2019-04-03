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
      <form action="host.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
        <div class="form-group has-feedback">
          <center>
            <label class="col-sm-6">Create Room</label>

            <div class="col-sm-6">
              <input name="room_name" type="text" class="form-control" placeholder="Enter Name" 
                    required=true>
              <div class="valid-feedback">
                Looks good!
              </div>
              <div class="invalid-feedback">
                Please enter valid room name.
              </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Select01">Member per Team</label>
                    <select name="team_size" class="custom-select" id="Select01">
                        <?php
                            for ($i = 3; $i <= 20; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <br>

            <div class="col-sm-6">
              <button type="submit" class="btn btn-success"> Go </button>
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
    $_SESSION['team_size'] = $_POST['team_size'];
    header('Location:gen_pin.php');
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