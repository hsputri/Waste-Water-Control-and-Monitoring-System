<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_POST['regist'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (name, username, email, password)
                    VALUES ('$name','$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!'); window.location.replace('../index.php');</script>";
                $name = "";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.'); window.location.replace('../register.php');</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.'); window.location.replace('../register.php');</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai'); window.location.replace('../register.php');</script>";
    }
}
 
?>