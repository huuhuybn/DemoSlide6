<?php
require 'Database.php';


echo time();

$id = $_GET['id']; // lấy ra tham số id trong link request ở trang trước
echo $id;

$connection = (new Database())->connect();

// viết câu lệnh truy vấn sinh viên với id lấy được
$truyvan = "SELECT * FROM students WHERE id=" . $id;

// hiển thị thông tin sinh viên lấy được nếu có
$sv = $connection->query($truyvan);
echo $sv->num_rows . '<br>';
if ($sv->num_rows > 0) {
    while ($row = $sv->fetch_assoc()) {
        echo $row['id'] . " || " . $row['name'] . " || " . $row['address'] . '<br>';
        echo '<hr>';
    }
}

$connection->close();





