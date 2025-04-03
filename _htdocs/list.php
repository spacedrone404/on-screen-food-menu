<?php

$dsn = 'pgsql:host=localhost;port=5432;dbname=menus;user=postgres;password=';

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "SELECT code, category, title, description, weight, price FROM dinnermenus";
    $stmt = $pdo->query($query);

    
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($rows);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>