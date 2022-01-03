<?php

    include "konek.php";
    $search = mysqli_query($konek,"SELECT * FROM tbl_order WHERE nama_pengorder LIKE '%$_GET[search]%'");
    while($row=mysqli_fetch_assoc($search)) {
        $data+= $row;
    }
    echo json_encode($data);

?>