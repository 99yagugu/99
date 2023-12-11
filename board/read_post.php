<?php
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = $_GET['id'];
$sql = "SELECT * FROM board WHERE id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>{$row['title']}</h2>";
    echo "<p>작성자: {$row['author']} | 작성일: {$row['created_at']}</p>";
    echo "<p>{$row['content']}</p>";
} else {
    echo "게시물을 찾을 수 없습니다.";
}

$conn->close();
?>
