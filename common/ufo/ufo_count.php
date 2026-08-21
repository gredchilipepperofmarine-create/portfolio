<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=ufo_counter;charset=utf8', 'ufoUser', 'ufo_counter');
  $sql = $pdo->prepare('UPDATE ufo_counter SET count = count + 1 WHERE id = 1');
  $sql->execute();
  $current_sql = $pdo->prepare('SELECT count FROM ufo_counter WHERE id = 1');
  $current_sql->execute();
  $count = $current_sql->fetch();
  echo json_encode(['countUfo' => $count]);
} catch(Exeption $e) {
  echo '通信エラー';
}
?>