<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_POST['changePass'])) {
    $currentPass = md5($_POST['currentPass']);
    $newPass = md5($_POST['newPass']);
    $confirmPass = md5($_POST['confirmPass']);
    $username = $_SESSION["username"];
    // echo $currentPass; die();
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$currentPass'";
    $result = mysqli_query ($conn, $query);
    if (!$result->num_rows > 0) {
        echo "<script>alert('Password lama tidak sesuai, silahkan ulangi kembali'); window.location.replace('../data.php');</script>";

    } else if (empty($_POST['newPass']) || empty($_POST['confirmPass'])) {
        echo "<script>alert('Ganti Password Gagal! Data Tidak Boleh Kosong.'); window.location.replace('../data.php');</script>";
    
    } else if (($_POST['newPass']) !== ($_POST['confirmPass'])) {
        echo "<script>alert('Ganti Password Gagal! New Password dan Confirm Password Harus Sama.'); window.location.replace('../data.php');</script>";

    } else {
        $query = "UPDATE users SET password='$newPass' WHERE username='$username'";
        $sql = mysqli_query ($conn, $query);
        if($sql){
            echo "<script>alert('Change Password Success!'); window.location.replace('../data.php');</script>";
        }else{
            echo "<script>alert('Change Password Failed!'); window.location.replace('../data.php');</script>";
        }
    }
}