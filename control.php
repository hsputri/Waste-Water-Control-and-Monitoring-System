<?php
require 'models/koneksi.php';
if(isset($_GET['nilai'])){
    $id = $_GET['id'];
    $nilai = $_GET['nilai'];
    mysqli_query($conn, "UPDATE control SET nilai = '$nilai' WHERE id='$id'");
    header("location:data.php");
}

?>