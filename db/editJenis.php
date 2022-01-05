<?php 

    include "konek.php";
    mysqli_query($konek,"UPDATE tbl_jenis SET jenis_laundryan='$_POST[jenis2]',harga='$_POST[harga2]' WHERE id_jenis_laundry='$_POST[id_jenis]'");

?>