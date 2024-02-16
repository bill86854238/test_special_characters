<?php
include 'config.php'; // 引入資料庫設定


try {
    // 建立 PDO 連線
    $pdo = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8mb4", $dbConfig['username'], $dbConfig['password']);

    // 設定錯誤模式為例外
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 從 POST 請求中獲取特殊字元
    $special_character = $_POST['special_character'];

    // 使用預備語句準備 SQL 查詢
    $stmt = $pdo->prepare("SELECT * FROM test_special_characters");

    // 執行查詢
    $stmt->execute();

    // 取回結果
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 輸出結果
    if ($results) {
        echo "<h2>Special character(s) successfully accessed:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Special Characters</th></tr>";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . json_decode($row['special_characters']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo "No data found for the given special character.";
    }
    echo "<br>";
    echo "<a href='index.php'>Back to Home</a>"; // 加入返回主頁的按鈕

} catch (PDOException $e) {
    // 處理連線錯誤
    echo "Connection failed: " . $e->getMessage();
}
?>
