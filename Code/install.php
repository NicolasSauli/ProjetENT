<?php


try {
    // Connexion MySQL sans base
    $pdo = new PDO("mysql:host=localhost;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base
    $pdo->exec("
        CREATE DATABASE IF NOT EXISTS ent
        CHARACTER SET utf8mb4
        COLLATE utf8mb4_general_ci
    ");


    $pdo = new PDO("mysql:host=localhost;dbname=ent;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS utilisateurs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL
        )
    ");

    $username = "nicolas";
    $password = password_hash("nicolas", PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT IGNORE INTO utilisateurs (username, password)
        VALUES (?, ?)
    ");
    $stmt->execute([$username, $password]);

    echo "Installation terminée avec succès<br>";
    echo "Utilisateur créé : <b>nicolas / nicolas</b>";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
