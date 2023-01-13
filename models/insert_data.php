<?php
    include 'koneksi.php';
    $level = $_GET['level'];
    $pump1 = $_GET['pump1'];
    $pump2 = $_GET['pump2'];

    if(isset($_GET['level']) & isset($_GET['pump1']) & isset($_GET['pump2'])){
    $sql = "INSERT INTO data (level, pump1, pump2)
            VALUES ('$level','$pump1', '$pump2')";
    $result = mysqli_query($conn, $sql);
    }