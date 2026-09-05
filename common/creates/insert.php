<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('INSERT INTO creates (category, title, description, dev_time) VALUES (?,?,?,?)');
$sql->execute([
$_POST['category'],
$_POST['title'],
$_POST['description'],
$_POST['dev_time']
]);
echo json_encode(['result' => $sql]);
?>