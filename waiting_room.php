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
      <form action="grouping.php?room=<?php echo $_GET["room"]?>&team_size=<?php echo $_GET["team_size"]?>" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
          <br><br>
          <center>
            <pin> pin : <?php 
                          echo $_GET["room"];
                        ?>               
            </pin>
            <br>
              <button type="submit" class="btn join"> Start Grouping </button>
            </center>
            <br>
      </form>
      <center><button type="button" class="btn create" onclick="window.location.href='delete_room.php?room=<?php echo $_GET['room']?>'">Back</button></center>
            <div id="refresh"></div>
            <div id="all_client">
              <?php     
              $id_client = "SELECT * FROM client WHERE pin=$_GET[room]";
              // $id_client = "SELECT * FROM client WHERE pin='1150'";
              $result =  $pdo->query($id_client);

              if($result->rowCount() > 0) {
                echo "<div class='row'>
                      <div class='col-sm-1'></div>
                      <div class='col-sm-1'>";
                echo "<br><center><pingen>".$result->rowCount()."</pingen>"."<h2>Person</h2></center>";
                echo "</div>";
                echo "<div class='col-sm-8'></div>";
                echo "</div>";

                echo "<div class='row'>
                      <div class='col-sm-2'></div>
                      <div class='col-sm-8'>
                      <id>";
                $count_roll = 0;
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  //echo $row["client_name"];
                  
                  echo $row["client_name"]." , ";
                  
                }
                echo "<id></div>";
                echo "<div class='col-sm-2'></div>";
                echo "</div>";
              } else {
                  //echo "0 results";
              }
            ?>
            </div>
  </body>
</html>
<script type="text/javascript">
    setInterval("my_function();",500); 
    function my_function(){ 
      $('#refresh').load(' #all_client');
    }
</script>