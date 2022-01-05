<?php 

    include "konek.php";
    if(isset($_GET['id'])) {
        $hapus = mysqli_query($konek,"DELETE FROM tbl_jenis WHERE id_jenis_laundry='$_GET[id]'");
        if($hapus) {
            header("location: ../jenis.php");
        }
    }

?>