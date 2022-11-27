<?php
require 'Database.php';

$ten_truyen = $_POST('ten_truyen');
$tac_gia = $_POST('tac_gia');
$nam_xb = $_POST('nam_xb');
$anh_bia = $_POST('anh_bia');

$truyvan =
    "INSERT INTO tb_doctruyen (ten_truyen, tac_gia, nam_xb,anh_bia) VALUES ({$ten_truyen},{$tac_gia},{$nam_xb},{$anh_bia})";

$connection = (new Database())->connect();
$sv = $connection->query($truyvan);
$object = new stdClass();

if (mysqli_error($sv)){
    $object->{'errorCode'} = '400';
    $object->{'errorMessage'} = 'Co loi xay ra';
}else{
    $object->{'errorCode'} = '200';
    $object->{'errorMessage'} = 'Thanh cong!!!';
}
echo json_encode($object);

$connection->close();
