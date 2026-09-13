<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('SELECT * FROM main_creates');
$sql->execute();
$creates = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($creates);
?>