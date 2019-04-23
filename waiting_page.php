<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> waiting page </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>

  <body>
    <form action="my_group.php?client=<?php echo $_GET["client"]?>&room=<?php echo $_GET["room"]?>" method="POST" name="waiting_page" id="waiting_page" class="needs-validation">
      <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
      <center><test>Waiting...</test>
    </form>
        <center><button type="button" class="btn create" onclick="window.location.href='delete_user.php?client=<?php echo $_GET['client']?>'">Exit</button></center>
        <br><br>
        <div id="refresh"></div>
              <div id="all_client">
                <?php 
                require_once 'config.php';

                $id_client = "SELECT team_no FROM client WHERE client_name=$_GET[client]";
                $result =  $pdo->query($id_client);

                if($result->rowCount() > 0) {
                  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if($row["team_no"]!="0"){
                      echo "<button name='submit1' type='submit' class='btn join'> Go to your group </button>";       
                    }else{
                    }                
                  }
                } else {
                    //echo "0 results";
                }
              ?>
        </div>
      </center>   
  </body>
</html>
<script type="text/javascript">
    setInterval("my_function();",500); 
    function my_function(){ 
      $('#refresh').load(' #all_client');
    }
</script>