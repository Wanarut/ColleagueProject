<?php
    require_once 'config.php';
    session_start();
    $client_name = $_SESSION['client_name'];
    if(!isset($client_name)){
        header('Location:client.php');
    }

    $sql = "SELECT * FROM client WHERE team_no=(SELECT team_no FROM client WHERE client_name=:client_name)";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindParam(':client_name', $client_name, PDO::PARAM_STR);
    $stmt -> execute();
    
    echo "Your Team" . '<br>';

    while($row = $stmt->fetch()){                
        echo "name " . $row['client_name'] . " type " . $row['type'].'<br>';
    }
?>