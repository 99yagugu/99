<?php
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];

$sql = "INSERT INTO board (title, author, content) VALUES ('$title', '$author', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "게시물이 성공적으로 등록되었습니다.";
} else {
    echo "게시물 등록에 실패했습니다: " . $conn->error;
}

$conn->close();
?>