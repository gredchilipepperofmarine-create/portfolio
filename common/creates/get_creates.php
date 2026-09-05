<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('SELECT * FROM creates');
$sql->execute();
$data_all = $sql->fetchAll();
echo json_encode(['result' => $data_all]);
?>
