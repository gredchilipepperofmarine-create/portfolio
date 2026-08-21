<?php
header('Content-Type: application/json; charset=UTF-8');
$kuji = ['大吉', '中吉', '小吉', '吉', '凶', '大凶'];
$key = array_rand($kuji);
$omikujiResult = $kuji[$key];
echo json_encode(['fortune' => $omikujiResult]);
?>