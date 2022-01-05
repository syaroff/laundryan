<?php
    session_start();
    include "db/konek.php";
    if(isset($_GET['id'])) {
        $selectOrderan = mysqli_query($konek,"SELECT
	    tbl_order.id_order,
	    tbl_order.nama_pengorder,
	    tbl_order.harga,
	    tbl_order.alamat,
	    tbl_order.ongkir,
	    tbl_jenis.jenis_laundryan,
	    tbl_order.statuss,
	    tbl_penghasilan.tanggal,
	    tbl_order.kode_promo,
	    tbl_order.jumlah,
	    tbl_penghasilan.jumlah as hatot
        FROM
	    tbl_order
	    INNER JOIN tbl_penghasilan ON tbl_order.id_order = tbl_penghasilan.id_order
	    INNER JOIN tbl_jenis ON tbl_order.jenis_laudry = tbl_jenis.id_jenis_laundry WHERE tbl_order.id_order='$_GET[id]' ORDER BY id_order DESC");
        $rows = mysqli_fetch_assoc($selectOrderan);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Invoice - LAUNDRYID<?=$rows['id_order']?> | Adela Laundry</title>
</head>
<body>
    <div class="mx-4 my-4 card col-3">
        <div class="card-body">
            <center>
                <span class="bi-basket-fill" style="font-size: 5rem;"></span>
                <h2 class="fw-bold">ADELA LAUNDRY</h2>
                <p class="pb-2">"Budayakan Malas Mencuci & Rajin Melaundry"</p>
                <hr>
                <h5>INVOICE</h5>
                <hr>
            </center>
            <div class="px-4">
                <div class="col-12">
                    <p class="my-2">ID Order : <?= $rows['id_order']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Status Pembayaran : 
                    <?php if($rows['statuss']==0) { ?>             
                        <span class="badge bg-danger">Belum Lunas</span>
                    <?php
                        }
                        else if($rows['statuss'] == 1)  {
                    ?>
                        <span class="badge bg-success">Lunas</span>
                    <?php
                        }
                    ?>      
                    </p>
                </div>
                <div class="col-12">
                    <p class="my-2">Tanggal : <?= $rows['tanggal']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Nama Pengorder : <?= $rows['nama_pengorder']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Kode Promo : <?= $rows['kode_promo']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Jenis : <?= $rows['jenis_laundryan']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Jumlah : <?= $rows['jumlah']; ?> Kg</p>
                </div>
                <div class="col-12">
                    <p class="my-2">Harga : Rp.<?= $rows['harga']; ?>/Kg</p>
                </div>
                <div class="col-12">
                    <p class="my-2">Ongkir : Rp.<?= $rows['ongkir']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Harga Total : Rp.<?= $rows['hatot']; ?></p>
                </div>
                <div class="col-12">
                    <p class="my-2">Alamat : <br><?= $rows['alamat']; ?></p>
                </div>
            </div>
            <hr>
                <center>
                <h6>Terima Kasih</h6>
                </center>
            <hr>
            <center>
                <p>Contact Person : +6285733231761</p>
            </center>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>