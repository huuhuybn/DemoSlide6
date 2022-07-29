<?php

$server = "localhost";
$db_username = "root";
$db_password = "";
$database = "poly_students";

$connection = new mysqli(
    $server, $db_username, $db_password, $database);

if ($connection->error) echo "BI LOI";
else {

    $databaseName = "CREATE DATABASE poly2022";
    $connection->query($databaseName);

    $bang = "CREATE TABLE students(id INTEGER PRIMARY KEY , name TEXT,address TEXT)";

    if ($connection->query($bang)) {
        echo 'Tao bang thanh cong';
    } else {
        //echo " loi " . $connection->error;
    }

    echo "THANH CONG!!! <br>";


    $limit = 5;
    // nếu có tham số phân trang ở đg link thì lấy ra,
    // nếu ko có tức là mới vào trang chủ thì page=0
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 0;
    }
    $start_from = $page;

    $getAll = "SELECT * FROM students ORDER BY id ASC LIMIT $start_from,$limit"; // truy vấn từ page với số lương = limit

    $ketqua = $connection->query($getAll); // lay danh sach sinh vien
    echo 'SO luong : ' . $ketqua->num_rows . '<br>';

    if ($ketqua->num_rows > 0) {
        while ($row = $ketqua->fetch_assoc()) {
            echo $row['id'] . " || " . $row['name'] . " || " . $row['address'] . '<br>';
            echo '<hr>';
        }
    } else {
        echo ' ko co sinh vien nao';
    }

    // xem thong tin 1 sv co id = 1
    $truyvan = "SELECT * FROM students WHERE name = 'Sag Nguyen 123'";
    $sv = $connection->query($truyvan);
    echo $sv->num_rows . '<br>';
    if ($sv->num_rows > 0) {
        while ($row = $sv->fetch_assoc()) {
            echo '<a href="detail.php?id=' . $row['id'] . '">' . $row['id'] . '</a>';
            echo '<hr>';
        }
    }

    $connection->close();


}