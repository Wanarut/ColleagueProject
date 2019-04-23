<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> all group </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>
  <style type="text/css">
    pingroup{
    font-weight: bold;
    text-align: center;
    font-size: 36px;
    color:  black;
  }
  namegroup{
    font-weight: bold;
    text-align: center;
    font-size: 20px;
    color:  black;
  }   
  </style>
  <body>
    <center><img src="img\UI\NameWhite.png" alt="Girl in a jacket" style="width:500px;height:280px;"></center>
    <form action="delete_room.php?room=<?php echo $_GET['room']?>'" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
        <center><input type="image" src="img\UI\finish.png"  alt="submit" width="200" height="80"></center>
    <!-- <center><button type="submit" class="btn join"> Finished </button></center> -->
    <br>
    <?php
        session_start();
        // $pin = $_SESSION['pin'];
        // $team_size = $_SESSION['team_size'];

        // $pin = "1150";
        // $team_size = 3;
        $pin = $_GET["room"];
        $team_size = $_GET["team_size"];
        $alpha = 0.5;

        require_once 'config.php';

        $sql = "SELECT * FROM client WHERE pin=:pin ORDER BY type";
        $stmt = $pdo->prepare($sql);
        $stmt -> bindParam(':pin', $pin, PDO::PARAM_STR);
        $stmt -> execute();

        $count = $stmt->rowCount();
        if($count > 0){
            $team_count = (int)($count / $team_size);
            // $remainder = $count % $team_size;

            // if($remainder < $team_size * $alpha){
            //     $team_count--;
            // }

            $arrData = array();
            $arrRows = array();
            $team_no = 1;
            while($row = $stmt->fetch()){
                $arrRows['client_name'] = $row['client_name'];
                $arrRows['team_no'] = $team_no;
                $arrRows['type'] = $row['type'];
                
                $team_no++;
                if($team_no > $team_count) $team_no = 1;

                array_push($arrData, $arrRows);
            }
            // echo json_encode($arrData);
            unset($stmt);

            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE client SET team_no=:team_no WHERE pin=:pin and client_name=:client_name";
                $stmt = $pdo->prepare($sql);
                $stmt -> bindParam(':team_no', $arrData[$i]['team_no'], PDO::PARAM_STR);
                $stmt -> bindParam(':pin', $pin, PDO::PARAM_STR);
                $stmt -> bindParam(':client_name', $arrData[$i]['client_name'], PDO::PARAM_STR);
                $stmt -> execute();
            }
            unset($stmt);
            // echo "<div class='row'>
            // <div class='col-sm-2'></div>";
            for ($i = 1; $i <= $team_count; $i++) {
                $sql = "SELECT * FROM client WHERE pin=:pin and team_no=:team_no";
                $stmt = $pdo->prepare($sql);
                $stmt -> bindParam(':pin', $pin, PDO::PARAM_STR);
                $stmt -> bindParam(':team_no', $i, PDO::PARAM_STR);
                $stmt -> execute();
               
                if($i==1||$i==5||$i==9||$i==13||$i==17||$i==21||$i==25||$i==29||$i==33){
                  echo "<div class='row'>
                  <div class='col-sm-2'></div>";
                }
                echo "<div class='col-sm-"."2"."'>";
                echo "<center><pingroup>"."Team ".$i."</pingroup>"."</center>";
                while($row = $stmt->fetch()){                
                    echo "<center><namegroup>name ".$row['client_name']." type ".$row['type']."<namegroup></center>";
                }
                echo "</div>";

                if($i==4||$i==8||$i==12||$i==16||$i==20||$i==24||$i==28||$i==32||$i==36){
                  echo "<div class='col-sm-2'></div>";
                  echo "</div><br><br>";
                }

                // echo "team " . $i.'<br>';
            }
            // echo "<div class='col-sm-2'></div>";
            // echo "</div>";
        }
    ?>     
    </from>   
  </body>
</html>
