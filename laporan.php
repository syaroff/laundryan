<?php
    session_start();
    include "db/konek.php";
    if(!$_SESSION['username']) {
        header("Location: login.php");
    }
    else if($_SESSION['level'] > 1) {
        header("Location: kurir/");
    }
    $selectlaporan = mysqli_query($konek,"SELECT
	tbl_penghasilan.id_penghasilan,
    tbl_penghasilan.tanggal,
    tbl_penghasilan.jumlah
    FROM tbl_penghasilan ORDER BY tanggal DESC");
    $noOrder = 1;
    $total = 0;
    foreach($selectlaporan as $row) {
        $total += $row['jumlah'];
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
    <title>Laporan - Adela Laundry</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include "components/sidebar.php"; ?>
            <div class="col px-0 w-100">
                <?php include "components/navbar.php"; ?>
                <div class="col-12 px-3 py-2">
                    <div class="card p-0">
                        <div class="card-header pt-3">
                            <h5>Data Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-5 my-3 d-flex">
                                <div class="col-4">
                                    <input type="date" name="filter" id="filter" class="form-control">        
                                </div>
                                <div class="col-12">
                                    <button id="btn-filter" class="btn btn-dark">Filter</button>
                                    <a href="laporan.php" class="btn btn-dark">Show All</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark text-center">
                                        <tr class="table-light">
                                            <td colspan="2" class="fw-bold">TOTAL</td>
                                            <td id="total"><?=$total;?></td>
                                        </tr>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-data" class="text-center">
                                            <?php
                                                foreach($selectlaporan as $data) {
                                            ?>
                                                    <tr>
                                                        <td><?=$noOrder++; ?></td>
                                                        <td><?= $data['tanggal']; ?></td>
                                                        <td><?= $data['jumlah']; ?></td>
                                                    </tr>
                                                    
                                            <?php
                                                    
                                                }

                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer py-3">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btn-filter').click(function (e) { 
                e.preventDefault();
                const tanggal = $('#filter').val();
                let nomor = 1;
                let data = [];
                let total = 0;
                console.log(tanggal)
                $.ajax({
                    type: "GET",
                    url: "db/filterLaporan.php?act=filter&tanggal=" + tanggal,
                    dataType: "JSON",
                    success: function (response) {
                        datatable = [...response];
                        console.log(datatable)
                        datatable.forEach(el => {
                            data += `
                            
                                    <tr>
                                        <td>${nomor++}</td>
                                        <td>${el.tanggal}</td>
                                        <td>${el.jumlah}</td>
                                    </tr>
                            
                            `;
                            total += parseInt(el.jumlah);
                            
                        });
                        $('#total').text('');
                        $('#total').text(total);
                        $('#tbody-data').empty();
                        $('#tbody-data').append(data);
                    },
                    error: function() {
                        data += `

                                    <tr>
                                        <td colspan="3">Data Tidak Ditemukan</td>
                                    </tr>
                        
                        `;
                        $('#total').text('');
                        $('#tbody-data').empty();
                        $('#tbody-data').append(data);
                    }
                });
            });
        });
    </script>
</body>
</html>