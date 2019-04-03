<?php
  require_once 'config.php';
   session_start();
  $pin = $_SESSION['pin'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Create Room </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>

  <body>
      <form action="gen_pin.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
          <br><br>
          <center>
            <pin> pin : <?php echo $pin?></pin>
            <div class="col-sm-6">
              <button type="submit" class="btn join"> Start Grouping </button>
            </div>
            <br>
            <!-- <id> 590610674 <id> -->
            <div id="refresh"></div>
            <div id="all_client">
              <?php
              $myfile = fopen("pin.txt", "r") or die("Unable to open file!");
              $pin_store = fgets($myfile);
              fclose($myfile);
              $pin_store_array = explode(",", $pin_store);      
              $id_client = "SELECT * FROM client WHERE pin='$pin_store_array[0]'";
              $result =  $pdo->query($id_client);

              if($result->rowCount() > 0) {
                $count_roll = 0;
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  //echo $row["client_name"];
                  echo "<id>".$row["client_name"]."<id><br>";
                }
              } else {
                  //echo "0 results";
              }
            ?>
            </div>
          </center>
      </form>
  </body>
</html>
<script type="text/javascript">
    setInterval("my_function();",500); 
    function my_function(){ 
      $('#refresh').load(' #all_client');
    }
</script>