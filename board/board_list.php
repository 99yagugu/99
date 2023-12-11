<?php
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM board ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h2>게시판 목록</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<a href='read_post.php?id={$row['id']}'>";
        echo "<h3>{$row['title']}</h3>";
        echo "<p>작성자: {$row['author']} | 작성일: {$row['created_at']}</p>";
        echo "</a>";
    }
} else {
    echo "게시물이 없습니다.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button type="button" onclick="window.location.href='write_post.html'">글 작성</button>
</body>
</html>
