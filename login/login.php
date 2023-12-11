<?php
// 데이터베이스 연결 설정
$host = 'localhost'; // 호스트명
$db = 'test'; // 데이터베이스명
$user = 'root'; // 사용자명
$pass = ''; // 패스워드

// 데이터베이스 연결
$conn = new mysqli($host, $user, $pass, $db);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 입력된 사용자 정보 가져오기
$username = $_GET['username'];
$password = $_GET['password'];

// SQL 쿼리 실행
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// 로그인 성공 여부 확인
if ($result->num_rows > 0) {
    echo "Login successful";
} else {
    echo "Login failed. Invalid username or password.";
}

// 데이터베이스 연결 종료
$conn->close();
?>