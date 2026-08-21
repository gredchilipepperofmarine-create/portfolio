<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/stgConnectDbData.php');

try {
    // 1. PDOインスタンスの作成（DBへの接続試行）
    $pdo = new PDO(ACCESSDB, DBID, DBPW, [
        // エラー発生時に例外（Exception）を投げてくれる
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // DBからのデータを扱いやすい「連想配列」の形で取得する
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // 静的プレースホルダを使用する（SQLインジェクション対策）
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

} catch (PDOException $e) {
    // 接続に失敗した場合の処理（エラーメッセージの表示と安全な停止）
    die('データベース接続エラー: ' . $e->getMessage());
}
?>