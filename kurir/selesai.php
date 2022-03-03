<?php 
    session_start();
    include "../db/konek.php";
    $tanggal = date("Y-m-d");
    $log = mysqli_query($konek,"INSERT INTO tbl_log (id_user,tanggal,action) VALUES ('$_SESSION[id_user]','$tanggal','Pesanan dengan No Order : $_GET[id] Telah diantarkan ke rumah pemesan.')");
    $selesai = mysqli_query($konek,"UPDATE tbl_order SET statuss=1,status_order=1 WHERE id_order= '$_GET[id]'");
    
    if($selesai) {
        header("location: dashboard.php?id=all");
    }

?>