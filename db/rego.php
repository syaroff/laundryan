<?php

    include "konek.php";
    $id_jenis = $_GET['id_jenis'];
    $selectRego = mysqli_query($konek,"SELECT harga FROM tbl_jenis WHERE id_jenis_laundry = '$id_jenis'");
    $result = mysqli_fetch_assoc($selectRego);
    echo json_encode($result);
?>
