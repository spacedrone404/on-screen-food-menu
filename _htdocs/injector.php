<?php
$dsn = 'pgsql:host=localhost;port=5432;dbname=menus;user=postgres;password=';
try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Подключение к базе данных не удалось: " . $e->getMessage());
}

// getting data from POST query
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['code'], $data['category'], $data['title'], $data['description'], $data['weight'], $data['price'])) {
    http_response_code(400); // Код ошибки Bad Request
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Недостаточно данных']);
    exit();
}


// parse max value of id element
$sql_id_check = "SELECT MAX(id) FROM \"dinner20250301\"";
$stmt_id = $pdo->query($sql_id_check);
$id_max = $stmt_id->fetchColumn();

$new_id = $id_max + 1;

$sql = "INSERT INTO \"dinner20250301\" (id, code, category, title, description, weight, price)
        VALUES (:id, :code, :category, :title, :description, :weight, :price)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':id', $new_id, PDO::PARAM_INT);
$stmt->bindParam(':code', $data['code'], PDO::PARAM_STR);
$stmt->bindParam(':category', $data['category'], PDO::PARAM_STR);
$stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
$stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
$stmt->bindParam(':weight', $data['weight'], PDO::PARAM_INT);
$stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);

if ($stmt->execute()) {
    http_response_code(200); 
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Данные сохранены']);
} else {
    http_response_code(500); 
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Не удалось сохранить данные. Ошибка: ' . implode(', ', $stmt->errorInfo())]);
}
?>