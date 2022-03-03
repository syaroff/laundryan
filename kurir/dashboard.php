<?php 
    session_start();
    include "../db/konek.php";

    if(!$_SESSION['username']) {
        header("Location: index.php");
    }
    else if($_SESSION['level'] < 2 ) {
        header("Location: ../dashboard.php?id=all");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Dashboard Kurir - Adela Laundry</title>
</head>
<body class="bg-dark">
    <center>
    <h1 class="text-light my-5">Data Pesanan</h1>
    <div class="card p-0 col-8 my-5">
        <div class="card-body">
            <div class="col-12 col-md-7 my-3 d-flex">
                <a href="dashboard.php?id=all" class="btn btn-dark">All</a>
                <button id="btn-search" class="btn btn-dark"><span class="bi-search"></span></button>
                <input id="search" type="text" class="form-control" placeholder="Search Here">
                <a href="../db/signout.php" class="btn btn-danger">LogOut</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                        <th>NO</th>
                        <th>Nama Pengorder</th>
                        <th>Nama Pengorder</th>
                        <th>Jenis Laundry</th>
                        <th>Alamat</th>
                        <th>No.Whatsapp</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php include "showOrder.php" ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </center>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        $('#btn-search').click(function (e) { 
                e.preventDefault();
                let query = $('#search').val();
                window.location.href = "dashboard.php?search=" + query;
        });
    </script>
</body>
</html>