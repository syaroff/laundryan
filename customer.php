<?php 

    include "db/konek.php";

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
    <title>Dashboard Kurir - Adela Laundry</title>
</head>
<body class="bg-dark">
    <center>
    <h1 class="text-light my-5">Data Pesanan</h1>
    <div class="card p-0 col-8 my-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                        <th>NO</th>
                        <th>Nama Pengorder</th>
                        <th>Jenis Laundry</th>
                        <th>Alamat</th>
                        <th>No.Whatsapp</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php $selectOrderan = mysqli_query($konek,"SELECT
                                tbl_order.id_order,
                                tbl_order.nama_pengorder,
                                tbl_order.harga,
                                tbl_order.alamat,
                                tbl_order.ongkir,
                                tbl_jenis.jenis_laundryan,
                                tbl_order.jenis_laudry,
                                tbl_order.statuss,
                                tbl_penghasilan.tanggal,
                                tbl_order.kode_promo,
                                tbl_order.jumlah,
                                tbl_order.status_order,
                                tbl_order.no_wa,
                                tbl_penghasilan.jumlah as hatot
                                FROM
                                tbl_order
                                INNER JOIN tbl_penghasilan ON tbl_order.id_order = tbl_penghasilan.id_order
                                INNER JOIN tbl_jenis ON tbl_order.jenis_laudry = tbl_jenis.id_jenis_laundry WHERE tbl_order.id_order='$_GET[id]'");
                                $noOrder = 1;
                                while($orderan = mysqli_fetch_assoc($selectOrderan)) {
                         ?>
                                        <tr>
                                            <td><?=$noOrder++; ?></td>
                                            <td><?= $orderan['nama_pengorder']; ?></td>
                                            <td><?= $orderan['jenis_laundryan']; ?></td>
                                            <td><?= $orderan['alamat']; ?></td>
                                            <td><?= $orderan['no_wa']; ?></td>
                                            <td>
                                            <?php 
                                                    if(!$orderan['statuss']) {
                                            ?>
                                                        <span class="badge bg-danger">Belum Lunas</span>
                                            <?php

                                                    }
                                                    else if($orderan['statuss'] == 1)  {
                                            ?>
                                                        <span class="badge bg-success">Lunas</span>
                                            <?php
                                                    }
                                            ?>
                                            </td>
                                            <td><?= $orderan['hatot']; ?></td>
                                            <td>
                                                <a href="bukti.php?id=<?= $orderan['id_order']?>" class="btn btn-primary my-2">Print</a>
                                            </td>
                                        </tr>
                        <?php
                                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </center>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>