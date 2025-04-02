<?php


function transform($arrOld) {
        $arrNew = array(
            'id' => "$arrOld[0]",
            'code' => "$arrOld[1]",
            'category' => "$arrOld[2]",
            'title' => "$arrOld[3]",
            'description' => "$arrOld[4]",
            'weight' => "$arrOld[5]",
            'price' => "$arrOld[6]",
        );
    return $arrNew;
};


$arr1 = array(1, '1032', 'Холодные блюда', 'Паштет из печени', 'вторичное описание', '100', '97-10');
$arr2 = array(2, '1034', 'Холодные блюда', 'Паштет из печени 2', 'вторичное описание', '100', '97-10');
$arr3 = array(3, '1066', 'Гарниры', 'Закуска Уральская (из свеклы и солёных огурцов) ', 'вторичное описание', '150', '49-60');
$arr4 = array(4, '1067', 'Гарниры', 'Закуска Уральская (из свеклы и солёных огурцов) ', 'вторичное описание', '150', '49-60');
$arr5 = array(5, '2015', 'Первые блюда', 'Суп овощной с курицей и сметаной', 'вторичное описание', '250/50/10', '91-90');
$arr6 = array(6, '2006', 'Первые блюда', 'Бульон мясной прозрачный с яйцом', 'вторичное описание', '250/1', '56-30');
$arr7 = array(7, '3046', 'Вторые блюда', 'Ф.горбуши  отварное', 'вторичное описание', '75', '74-10');
$arr8 = array(8, '3040', 'Вторые блюда', 'Соус Тартар', 'вторичное описание', '50', '18-30');
$arr9 = array(9, '3047', 'Напитки', 'Ф.горбуши  отварное', 'вторичное описание', '75', '74-10');
$arr10 = array(10, '3041', 'Напитки', 'Соус Тартар', 'вторичное описание', '50', '18-30');
$arr11 = array(11, '3048', 'Выпечка', 'Ф.горбуши  отварное', 'вторичное описание', '75', '74-10');
$arr12 = array(12, '3049', 'Выпечка', 'Соус Тартар', 'вторичное описание', '50', '18-30');


$requestName = $_GET['category'];

// Холодные блюда
// Первые блюда
// Вторые блюда
// Напитки
// Гарниры
// Выпечка

if ($requestName == 'Холодные блюда') {
    // echo 'категория холодные блюда';
    $data1 = transform($arr1);
    $data2 = transform($arr2);
    $data = [$data1, $data2];
    print json_encode($data);
}

if ($requestName == 'Гарниры') {
    // echo 'категория холодные блюда';
    $data1 = transform($arr3);
    $data2 = transform($arr4);
    $data = [$data1, $data2];
    print json_encode($data);
}

if ($requestName == 'Первые блюда') {
    // echo 'категория холодные блюда';
    $data1 = transform($arr5);
    $data2 = transform($arr6);
    $data = [$data1, $data2];
    print json_encode($data);
}

if ($requestName == 'Вторые блюда') {
    // echo 'категория холодные блюда';
    $data1 = transform($arr7);
    $data2 = transform($arr8);
    $data = [$data1, $data2];
    print json_encode($data);
}

if ($requestName == 'Напитки') {
    // echo 'категория холодные блюда';
    $data1 = transform($arr9);
    $data2 = transform($arr10);
    $data = [$data1, $data2];
    print json_encode($data);
}

if ($requestName == 'Выпечка') {
    // echo 'категория холодные блюда';
    $data1 = transform($arr11);
    $data2 = transform($arr12);
    $data = [$data1, $data2];
    print json_encode($data);
}

?>


