<?php
    require('koneksi.php');

    // tabel data
    $tbl_data = mysqli_query($conn, "SELECT * from data ORDER BY id DESC");

    // tabel control
    $control = mysqli_query($conn, "SELECT * FROM control");
    while($hasil= mysqli_fetch_all($control)){
      // var_dump($hasil[0]); die();
        $ctrl_pump1= $hasil[0][2];
        $ctrl_pump2= $hasil[1][2];
        $ctrl_mode= $hasil[2][2];
    }
    // echo $ctrl_pump1; die();

    // data level terakhir
    $level = mysqli_query($conn, "SELECT * FROM data ORDER BY id DESC LIMIT 1");
    while($hasil= mysqli_fetch_assoc($level)){
      $current_level = $hasil["level"];
    }

?>