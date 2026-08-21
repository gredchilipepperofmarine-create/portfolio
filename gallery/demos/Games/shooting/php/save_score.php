<?php
if(session_status() === PHP_SESSION_NONE) {
  session_start();
}
header('Content-Type: application/json; charset=utf-8');
require_once 'includes/db.php';
$player_name = $_POST['player_name'] ?? "Player";
$score = (int)($_POST['score'] ?? 0);
$result_sql = $pdo->prepare('INSERT INTO scores (player_name, score) VALUES(?, ?)');
$result_sql->execute([$player_name, $score]);
echo json_encode(['status' => 'success'], JSON_UNESCAPED_UNICODE);
exit;
?>