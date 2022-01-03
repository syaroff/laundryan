<?php

    include "konek.php";

    if(isset($_GET['act'])=='filter') {
        filter();
    }

    function filter()
    {
        global $konek;
        $tanggal = $_GET['tanggal'];
        $result = [];
        $selectLaporan = mysqli_query($konek,"SELECT * FROM tbl_penghasilan WHERE tanggal LIKE '$tanggal' ORDER BY tanggal DESC");
        while($data = mysqli_fetch_assoc($selectLaporan)) {
            $result[] = $data;
            
        }

        if(mysqli_num_rows($selectLaporan) < 0) {
            echo json_encode($result=0);
        }
       else if(mysqli_num_rows($selectLaporan) >=1) {
            echo json_encode($result);
       }
        
    }

?>