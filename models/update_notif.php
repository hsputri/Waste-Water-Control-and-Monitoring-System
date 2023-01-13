<?php
    include 'koneksi.php';
    $connect = $_GET['connect'];
    $alarm = $_GET['alarm'];

    if(isset($_GET['connect']) & isset($_GET['alarm'])){
        $sql = "UPDATE notification SET connect = $connect, alarm = $alarm WHERE id = 1";
        $result = mysqli_query($conn, $sql);
    }
