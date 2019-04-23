<?php
    require_once 'config.php';

    $sql = "DELETE FROM client WHERE client_name =  :client_name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':client_name', $_GET["client"], PDO::PARAM_INT);   
    $stmt->execute();

    header("Location: client.php");
?>
?>