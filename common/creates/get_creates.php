<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('SELECT * FROM creates');
$sql->execute();
$data_all = $sql->fetchAll();
?>

<?php foreach($data_all as $product): ?>
  <div class="container text-center py-3">
    <div style="border: 1px solid #E6CCB2;">
      <div><?= $product['id'] ?></div>
      <div><?= $product['category'] ?></div>
      <div><?= $product['title'] ?></div>
      <div><?= $product['description'] ?></div>
      <div><?= $product['dev_time'] ?></div>
      <div><?= $product['is_guest'] ?></div>
      <div><?= $product['created_at'] ?></div>
    </div>
  </div>


<?php endforeach; ?>