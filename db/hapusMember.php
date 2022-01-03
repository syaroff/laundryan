<?php

    include "konek.php";
    if(isset($_GET['id'])) {
        $hapus = mysqli_query($konek,"DELETE FROM tbl_member WHERE id_member='$_GET[id]'");
        if($hapus) {
            header("location: ../member.php");
        }
    }

?>