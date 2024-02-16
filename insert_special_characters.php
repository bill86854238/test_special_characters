<?php
include 'config.php'; // 引入資料庫設定

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // 建立 PDO 連線
        $pdo = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8mb4", $dbConfig['username'], $dbConfig['password']);
    
        // 設定錯誤模式為例外
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // 準備 SQL 查詢以寫入特殊字元到資料庫
        $stmt = $pdo->prepare("INSERT INTO test_special_characters (special_characters) VALUES (:special_characters)");
    
        // 欲寫入的特殊字元
        $special_character_to_insert = json_encode($_POST['special_character'], JSON_UNESCAPED_UNICODE);
    
        // 將特殊字元綁定到參數
        $stmt->bindParam(':special_characters', $special_character_to_insert, PDO::PARAM_STR);
    
        // 執行 SQL 查詢
        $stmt->execute();
    
        echo "Special character inserted successfully.";
          // 寫入成功後重定向到顯示頁面
            header('Location: process_special_characters.php');
            exit();
    
    } catch (PDOException $e) {
        // 處理連線錯誤
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
