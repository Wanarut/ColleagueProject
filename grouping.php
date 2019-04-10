<?php
    session_start();
    // $pin = $_SESSION['pin'];
    // $team_size = $_SESSION['team_size'];

    //$pin = "1150";
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

        for ($i = 1; $i <= $team_count; $i++) {
            $sql = "SELECT * FROM client WHERE pin=:pin and team_no=:team_no";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindParam(':pin', $pin, PDO::PARAM_STR);
            $stmt -> bindParam(':team_no', $i, PDO::PARAM_STR);
            $stmt -> execute();
            
            echo "team " . $i.'<br>';

            while($row = $stmt->fetch()){                
                echo "name " . $row['client_name'] . " type " . $row['type'].'<br>';
            }
            echo '<br>';
        }
    }
?>