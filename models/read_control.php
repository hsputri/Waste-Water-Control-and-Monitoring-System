<?php
require 'koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $nilai = mysqli_query($conn, "SELECT nilai FROM control WHERE id='$id'");
    if($val = mysqli_fetch_array($nilai)){
        echo $val['nilai'];
    }
}
?>