<?php
   require_once 'config.php';

   $sql = "INSERT INTO client (pin,client_name) VALUES (:pin,:client_name)";
   $stmt = $pdo->prepare($sql);
      // Bind parameters to statement
   $stmt->bindParam(':pin', $_GET["room"], PDO::PARAM_STR);
   $stmt->bindParam(':client_name', $_GET["client"], PDO::PARAM_STR);
   $stmt->execute();

	$N = 0;
	$S = 0;
	$F = 0;
	$T = 0;
	$J = 0;
	$P = 0;
   $type = 0;
  	if(isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4']) && isset($_POST['5']) && isset($_POST['6'])
    && isset($_POST['7']) && isset($_POST['8']) && isset($_POST['9']) && isset($_POST['10']) && isset($_POST['11']) && isset($_POST['12'])
    && isset($_POST['13']) && isset($_POST['14']) && isset($_POST['15'])
    )
   {
      if($_POST['1'] == 'a'){++$N;}
      else if($_POST['1'] == 'b'){++$S;}

      if($_POST['2'] == 'a'){++$T;}
      else if($_POST['2'] == 'b'){++$F;}

      if($_POST['3'] == 'a'){++$J;}
      else if($_POST['3'] == 'b'){++$P;}

      if($_POST['4'] == 'a'){++$T;}
      else if($_POST['4'] == 'b'){++$F;}
        
      if($_POST['5'] == 'a'){++$J;}
      else if($_POST['5'] == 'b'){++$P;}

      if($_POST['6'] == 'a'){++$N;}
      else if($_POST['6'] == 'b'){++$S;}

      if($_POST['7'] == 'a'){++$T;}
      else if($_POST['7'] == 'b'){++$F;}

      if($_POST['8'] == 'a'){++$S;}
      else if($_POST['8'] == 'b'){++$N;}

      if($_POST['9'] == 'a'){++$P;}
      else if($_POST['9'] == 'b'){++$J;}

      if($_POST['10'] == 'a'){++$S;}
      else if($_POST['10'] == 'b'){++$N;}

      if($_POST['11'] == 'a'){++$P;}
      else if($_POST['11'] == 'b'){++$J;}

      if($_POST['12'] == 'a'){++$F;}
      else if($_POST['12'] == 'b'){++$T;}

      if($_POST['13'] == 'a'){++$T;}
      else if($_POST['13'] == 'b'){++$F;}

      if($_POST['14'] == 'a'){++$J;}
      else if($_POST['14'] == 'b'){++$P;}

      if($_POST['15'] == 'a'){++$N;}
      else if($_POST['15'] == 'b'){++$S;}
 
      if($S > $N){
         if($J > $P){$type = 4;}//sj
         else{$type = 1;}//sp
      }
      else{
         if($F > $T){$type = 3;}//nf
         else{$type = 2;}//nt
      } 

      unset($stmt);

      $data = ['type' => $type,'client' => $_GET["client"],'room' => $_GET["room"],];
      $sql = "UPDATE client SET type=:type WHERE pin=:room and client_name=:client";
      $stmt = $pdo->prepare($sql);
      $stmt->execute($data);

      header("Location:waiting_page.php?client=$_GET[client]&room=$_GET[room]");
   }else{ 

      header("Location:question.php?client=$_GET[client]&room=$_GET[room]");
   }

?>