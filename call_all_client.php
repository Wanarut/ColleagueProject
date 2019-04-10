<?php     
              $id_client = "SELECT * FROM client WHERE pin=$_GET[room]";
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