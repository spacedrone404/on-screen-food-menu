<?php

include 'dbconnconf.php';

// функция создания многомерного массива элементов таблицы базы данных
function getData($query){
    $i = 0;

    while ($row = pg_fetch_row($query)) {
        $data[$i] = array(
            'id' => "$row[0]",
            'code' => "$row[1]",
            'category' => "$row[2]",
            'title' => "$row[3]",
            'description' => "$row[4]",
            'weight' => "$row[5]",
            'price' => "$row[6]",
        );
        $i++;
    };

    return $data;
};

// функция получения строк из БД по определенной категории и передачи на клиент
function getDataCategory($connectConfig, $tableName, $categoryName) {
    
    // открыли подключение к БД
    $dbconn = pg_connect($connectConfig) or die ("Не удалось". pg_last_error());
    
    // тело запроса
    if ($categoryName == ''){
        $operation = "SELECT * FROM \"$tableName\""; // если без сатегории, то выводим всю таблицу 
                                                //!!значение $categoryName вставляется напрямую в строку запроса SQL открывая дорогу прямиком для SQL иньекций 
                                                //как раз о чем предупреждал роскосмос, чему не подвержен код подготовленный с помощью prepare метода
    } else {                                        
        $operation = "SELECT * FROM \"$tableName\" WHERE category = '$categoryName'";
    }

    // запрос к БД
    $query = pg_query($dbconn, $operation);

    $data = getData($query); // сформировали массив строк
    header("Content-tupe: application/json; charset=utf-8"); //Указываем заголовки, что чтраница возвращает данные в JSON
    print json_encode($data); // отдали на клиент
    
    pg_close($dbconn); // закрыли подключение к БД
};



// принимаем от клиента запрос с категорией по которой выводим значения из базы
$categoryName = $_GET['category'];

$tableName = '20250301dinner'; // таблица

// вызываем функцию получения строк и передачи на клиент
// конфиг коннекта с ДБ, таблица, категория (если без категории, то выведет всю таблицу)
getDataCategory($connectConfig, $tableName, $categoryName);





?>