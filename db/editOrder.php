<?php 
    include "konek.php";
    
    $id_order = $_POST['id_order2'];
    $nama_pengorder = $_POST['nama_member2'];
    $jl = $_POST['jenis_laudry2'];
    $harga = $_POST['harga2'];
    $jumlah = $_POST['jumlah2'];
    $ongkir = $_POST['ongkir2'];
    $alamat = $_POST['alamat2'];
    $statuss = $_POST['statuss2'];
    $kode_promo = $_POST['kode_promo2'];
    $no_wa = $_POST['no_wa2'];
    $hargaTotal = 0;

    if(!empty($_POST['kode_promo2'])) {
        $cekPromo = mysqli_query($konek,"SELECT diskon FROM tbl_member WHERE kode_promo='$_POST[kode_promo]'");
        if(mysqli_num_rows($cekPromo)) {
            $selectPromo = mysqli_fetch_assoc($cekPromo);
            $diskon = $selectPromo['diskon'];
        }
        else {
            $diskon = 0;
        }
    }
    else {
        $diskon = 0;
    }
    $hargaTotal = $harga * $jumlah + $ongkir - $diskon;
    $insertOrder = mysqli_query($konek,"UPDATE tbl_order SET nama_pengorder='$nama_pengorder',jenis_laudry='$jl',harga='$harga',jumlah='$jumlah',ongkir='$ongkir',alamat='$alamat',statuss='$statuss',kode_promo='$kode_promo',no_wa='$no_wa' WHERE id_order = '$id_order'");

    $insertPenghasilan = mysqli_query($konek,"UPDATE tbl_penghasilan SET jumlah='$hargaTotal' WHERE id_order = '$id_order' ");

?>