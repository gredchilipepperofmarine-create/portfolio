<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('INSERT INTO creates (category, title, description, dev_time) VALUES (?,?,?,?)');
$sql->execute([
  $_POST['category'],
  $_POST['title'],
  $_POST['description'],
  $_POST['dev_time']
]);
$get_sql = $pdo->prepare('SELECT * FROM creates WHERE id = (SELECT MAX(id) FROM creates)');
$get_sql->execute();
$result = $get_sql->fetch(PDO::FETCH_ASSOC);
echo json_encode([$result]);
?>