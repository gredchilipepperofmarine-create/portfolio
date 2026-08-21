<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();
}
header('Content-Type: application/json; charset=utf-8');
require_once 'includes/db.php';
 $rank_sql = $pdo->prepare('SELECT * FROM scores ORDER BY score DESC LIMIT 5;');
 $rank_sql->execute();
 $ranking = $rank_sql->fetchAll(PDO::FETCH_ASSOC);
 echo json_encode($ranking);
 exit;
?>