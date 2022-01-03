<?php 

    include "../db/konek.php";
    $selesai = mysqli_query($konek,"UPDATE tbl_order SET status_order=1 WHERE id_order= '$_GET[id]'");
    if($selesai) {
        header("location: dashboard.php?id=all");
    }

?>