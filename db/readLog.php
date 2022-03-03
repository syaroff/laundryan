<?php 

    include "konek.php";

   if(!isset($_GET['s'])) {
        $no = 1;
        $selRead = mysqli_query($konek,"SELECT * FROM tbl_log INNER JOIN tbl_user ON tbl_log.id_user = tbl_user.id_user ORDER BY tanggal DESC");
        foreach($selRead as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['action']?></td>
            </tr>
<?php
        }
   }
   else if(isset($_GET['s'])) {
       $no = 1;
        $selRead = mysqli_query($konek,"SELECT * FROM tbl_log INNER JOIN tbl_user ON tbl_log.id_user = tbl_user.id_user WHERE tanggal LIKE '%$_GET[s]%' OR action LIKE '%$_GET[s]%' ORDER BY tanggal DESC");
        foreach($selRead as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['action']?></td>
            </tr>
<?php
        }
   }


?>