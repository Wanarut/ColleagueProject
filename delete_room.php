<?php
    require_once 'config.php';

    $sql = "DELETE FROM class_pin WHERE pin =  :pin";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pin', $_GET["room"], PDO::PARAM_INT);   
    $stmt->execute();

    $sql = "DELETE FROM client WHERE pin =  :pin";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pin', $_GET["room"], PDO::PARAM_INT);   
    $stmt->execute();

    header("Location: client.php");
?>