<?php

    include "konek.php";
    if(isset($_GET['id'])) {
        $query ="DELETE FROM tbl_order WHERE id_order='$_GET[id]'";
        $hapus = mysqli_query($konek,"DELETE FROM tbl_order WHERE id_order='$_GET[id]'");
        if($hapus) {
            header("location: ../order.php?id=all");
        }
        echo $query;
    }

?>