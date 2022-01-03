<?php
    $sqlSelect = mysqli_query($konek,"SELECT * FROM tbl_member");
    if($sqlSelect) {
        $i = 1;
        while($rowMember=mysqli_fetch_assoc($sqlSelect)) {
?> 
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $rowMember['nama_member'] ?></td>
                <td><?= $rowMember['kode_promo'] ?></td>
                <td><?= $rowMember['diskon'] ?></td>
                <td>
                    <button class="btn btn-warning my-1 my-md-0" onclick="edit('<?= $rowMember['nama_member'] ?>','<?= $rowMember['kode_promo'] ?>', '<?= $rowMember['diskon'] ?>','<?= $rowMember['id_member'] ?>')"><span class="bi-pencil-fill"></span></button>
                    <a href="db/hapusMember.php?id=<?= $rowMember['id_member'] ?>" class="btn btn-danger"><span class="bi-trash-fill"></span></a>
                </td>
            </tr>
<?php
            
        }
    }
?>