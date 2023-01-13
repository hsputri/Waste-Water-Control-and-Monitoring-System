<?php

session_start();
require_once 'koneksi.php';
$op = $_GET['op'];
if ($op == "in") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: ../data.php");
    } else {
        echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!');window.location.replace('../index.php');</script>";
    }
}
 
} else if ($op == "out") {
    unset($_SESSION['username']);
    echo '<script>alert("Berhasil Logout");window.location.replace("../index.php");</script>';
}
?>
