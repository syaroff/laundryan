<?php

    $selectOrderan = mysqli_query($konek,"SELECT
	tbl_penghasilan.id_penghasilan,
    tbl_penghasilan.tanggal,
    tbl_penghasilan.jumlah
    FROM tbl_penghasilan ORDER BY tanggal DESC");
    $noOrder = 1;
    $total = 0;
?>
        
<?php
    while($orderan = mysqli_fetch_assoc($selectOrderan)) {
        $total += $orderan['jumlah'];
?>
        <tr>
            <td><?=$noOrder++; ?></td>
            <td><?= $orderan['tanggal']; ?></td>
            <td><?= $orderan['jumlah']; ?></td>
        </tr>
        
<?php
        
    }

?>
        