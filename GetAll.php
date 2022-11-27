<?php
require 'Database.php';

$truyvan = "SELECT * FROM tb_doctruyen";

$connection = (new Database())->connect();
$sv = $connection->query($truyvan);
$myArray = array();
$object = new stdClass();

if (mysqli_error($connection)){
    $object->{'errorCode'} = '500';
    $object->{'errorMessage'} = 'KHONG Thanh cong!!!';
    $object->{'data'} = null;
}else{
    while($row = $sv->fetch_assoc()) {
        $myArray[] = $row;
    }
    $object->{'errorCode'} = '200';
    $object->{'errorMessage'} = 'Thanh cong!!!';
    $object->{'data'} = json_encode($myArray);
}
echo json_encode($object);

$connection->close();
