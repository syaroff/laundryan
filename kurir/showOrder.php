<?php

   if(isset($_GET['id'])=='all') {
        $selectOrderan = mysqli_query($konek,"SELECT
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
        INNER JOIN tbl_jenis ON tbl_order.jenis_laudry = tbl_jenis.id_jenis_laundry WHERE status_order = 0 ORDER BY id_order DESC");
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
                    <a href="selesai.php?id=<?= $orderan['id_order']?>" class="btn btn-primary my-2">Selesai</a>
                </td>
            </tr>
<?php
        
        }
    }
    else if(isset($_GET['search'])) {
        $selectOrderan = mysqli_query($konek,"SELECT
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
        INNER JOIN tbl_jenis ON tbl_order.jenis_laudry = tbl_jenis.id_jenis_laundry WHERE nama_pengorder LIKE '%$_GET[search]%' AND status_order = 0 ORDER BY id_order DESC");
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
                    <a href="selesai.php?id=<?= $orderan['id_order']?>" class="btn btn-primary my-2">Selesai</a>
                </td>
            </tr>
<?php
        
        }
    }
?>