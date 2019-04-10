<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        header('Location:client.php');
    }

    session_start();
    $team_size = $_SESSION['team_size'];
    if(!isset($team_size)){
        header('Location:client.php');
    }

    require_once 'config.php';
    while(true){
        $pin = rand(1000,9999);
        try{
            $sql = "INSERT INTO class_pin (pin,team_size) VALUES (:pin,:team_size)";
            $stmt = $pdo->prepare($sql);
            // Bind parameters to statement
            $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
            $stmt->bindParam(':team_size', $team_size, PDO::PARAM_STR);
            $stmt->execute();
      
            $_SESSION['pin'] = $pin;
            $_SESSION['team_size'] = $team_size;

            header("Location: waiting_room.php?room=$pin&team_size=$team_size"); 
            break;
        } catch(PDOException $e){}
    }
?>