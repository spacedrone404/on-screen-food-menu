
<?php

$host = 'localhost';
$dbname = 'menus';
$user = 'postgres'; 
$password = 'Impulse#__44'; 

try {
 
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Подключение к базе данных успешно установлено";
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}




$sql = 'SELECT * FROM "2025-03-01-dinner" WHERE category = "Салаты"';
$stmt = $conn->prepare($sql);
$stmt->execute();

// Получаем результаты запроса
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Закрываем соединение
$conn = null;

// Преобразуем результат в JSON
echo json_encode($result);
?>

