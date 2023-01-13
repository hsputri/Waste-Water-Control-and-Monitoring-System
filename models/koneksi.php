<?php
$conn= mysqli_connect("localhost", "root", "", "broduino");

//konek pake pdo
$dbname = "broduino";
$user = "root";
$password = "";

try{
    $dbh = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
    echo "Gagal Koneksi";
}   
?>
