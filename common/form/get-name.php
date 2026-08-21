<?php
header('Content-Type: application/json; charset=UTF-8');
$name_check = isset($_POST['name']) ? ($_POST['name']) : '';
$name = ($name_check !== '') ? htmlspecialchars($name_check, ENT_QUOTES, 'UTF-8') : 'ゲスト';
$category = $_POST['category'];
echo json_encode(['result' => $name]);
?>