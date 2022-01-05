<?php 

    $selectJenis = mysqli_query($konek,"SELECT * FROM tbl_jenis");
    $noJenis = 1;
    while($rowJenis = mysqli_fetch_assoc($selectJenis)) {
?>
        <tr>
            <td><?=$noJenis++?></td>
            <td><?= $rowJenis['jenis_laundryan'] ?></td>
            <td><?= $rowJenis['harga'] ?></td>
            <td>
                <button onclick="edit('<?= $rowJenis['jenis_laundryan']?>','<?= $rowJenis['harga']?>','<?= $rowJenis['id_jenis_laundry']?>')" class="btn btn-warning my-1 my-md-0"><span class="bi-pencil-fill"></span></button>
                <a href="db/deleteJenis.php?id=<?=$rowJenis['id_jenis_laundry']?>" class="btn btn-danger"><span class="bi-trash-fill"></span></a>
            </td>
        </tr>
<?php
    }

?>