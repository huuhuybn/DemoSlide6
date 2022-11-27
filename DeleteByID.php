<?php
require 'Database.php';

$id = $_GET['id'];

$truyvan = "DELETE FROM tb_doctruyen WHERE id =" + $id;

$connection = (new Database())->connect();
$sv = $connection->query($truyvan);
echo "Xoa thanh cong!!!";

$connection->close();
