<?php 

    include "konek.php";
    mysqli_query($konek,"UPDATE tbl_member SET nama_member='$_POST[nama_member]',kode_promo='$_POST[kode_promo]',diskon='$_POST[diskon]' WHERE id_member='$_POST[id_member]'");

?>