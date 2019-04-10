<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Create Room </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>

  <body>
    <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
    <form action="create_room.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <center><pin> enter room name </pin></center>
        <input name="room_name" type="room_name" class="form-control" placeholder="Enter Room Name">
      </div>
      <div class="col-sm-4"></div>
    </div>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <center><selectf>number per group </selectf></center> 
        <div class="input-group-prepend">        
          <select name="team_size" class="custom-select" id="Select01">
            <?php
              for ($i = 1; $i <= 20; $i++) {
                echo "<option value=\"$i\">$i</option>";
              }
            ?>
          </select>
        </div>
        <input type="image" src="img\UI\create.png" alt="submit" width="250" height="70">
      <div class="col-sm-4"></div>
    </div>
    </form>
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