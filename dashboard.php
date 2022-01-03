<?php
    session_start();
    include "db/konek.php";
    if(!$_SESSION['username']) {
        header("Location: login.php");
    }
    else if($_SESSION['level'] > 1) {
        header("Location: kurir/");
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
    <title>Dashboard - Adela Laundry</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include "components/sidebar.php"; ?>
            <div class="col px-0 w-100">
                <?php include "components/navbar.php"; ?>
                <div class="col-12 px-3 py-4">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                            <div class="card-body py-3">
                                    <center>
                                        <?php $selectCountMember = mysqli_query($konek,"SELECT COUNT(*) as total FROM tbl_member");$rowMember =mysqli_fetch_assoc($selectCountMember); ?>
                                        <h1><?=$rowMember['total']?></h1>
                                        <p>Jumlah Pelanggan</p>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-3">
                            <div class="card">
                            <div class="card-body py-4">
                                    <center>
                                        <h1><span class="bi bi-plus-circle"></span></h1>
                                        <a href="member.php" class="text-decoration-none text-dark">Tambah Pelanggan</a>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-3">
                            <div class="card">
                            <div class="card-body py-3">
                                    <center>
                                        <?php $selectCountOrder = mysqli_query($konek,"SELECT COUNT(*) as total FROM tbl_order");$rowOrder =mysqli_fetch_assoc($selectCountOrder); ?>
                                        <h1><?=$rowOrder['total']?></h1>
                                        <p>Jumlah Pesanan</p>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-3">
                            <div class="card">
                            <div class="card-body py-4">
                                    <center>
                                    <h1><span class="bi bi-plus-circle"></span></h1>
                                        <a href="order.php" class="text-decoration-none text-dark">Add Pertandingan</a>
                                    </center>
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-12 px-3 py-4">
                    <div class="card p-0">
                        <div class="card-header">
                            <h4>Daftar Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Kode Promo</th>
                                            <th>Potongan Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "db/showMember.php"; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>  
                <div class="col-12 px-3 py-4">
                    <div class="card p-0">
                        <div class="card-header">
                            <h4>Daftar Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Jenis Laundry</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Ongkir</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Kode Promo</th>
                                            <th>No.Wa</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "db/showOrder.php"; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>