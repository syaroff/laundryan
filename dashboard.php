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
                                        <a href="order.php" class="text-decoration-none text-dark">Tambah Pesanan</a>
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
    <div id="edit" class="modal " tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEdit" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="my-3">
                                <label>Nama Pengorder</label>
                                <input type="hidden" name="id_order2" id="id_order2">
                                <input type="text" name="nama_member2" id="nama_member2" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>Jenis Laundry</label>
                                <select name="jenis_laudry2" id="jenis_laudry2" class="form-control">
                                    <?php 
                                        $sqlJenis = mysqli_query($konek,"SELECT * FROM tbl_jenis");
                                        while($rowJenis=mysqli_fetch_assoc($sqlJenis)) {
                                    ?>
                                            <option value="<?= $rowJenis['id_jenis_laundry'] ?>"><?= $rowJenis['jenis_laundryan'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="my-3">
                                <label>Harga</label>
                                <input type="number" id="harga2" name="harga2" value="3000" class="form-control" readonly>
                            </div>
                            <div class="my-3">
                                <label>Jumlah</label>
                                <input type="number" id="jumlah2" name="jumlah2" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>Ongkir</label>
                                <input type="number" id="ongkir2" name="ongkir2" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>Alamat</label>
                                <input type="text" id="alamat2" name="alamat2" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>Status</label>
                                <select name="statuss2" id="statuss2" class="form-control">
                                    <option value="0">Belum Lunas</option>
                                    <option value="1">Lunas</option>
                                </select>
                            </div>
                            <div class="my-3">
                                <label>Kode Promo</label>
                                <input type="text" id="kode_promo2" name="kode_promo2" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>No.Whatsapp</label>
                                <input type="text" id="no_wa2" name="no_wa2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="tombolEdit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
<script>
    const edit = (nama_member,jenis_laudry,harga,jumlah,ongkir,alamat,kode_promo,no_wa,id_order) => {
                var myModal = new bootstrap.Modal(document.getElementById('edit'), {
                keyboard: false
                })
                myModal.show()
                $('#nama_member2').val(nama_member);
                $('#jumlah2').val(jumlah);
                $('#jumlah2').val(jumlah);
                $('#ongkir2').val(ongkir);
                $('#alamat2').val(alamat);
                $('#kode_promo2').val(kode_promo);
                $('#no_wa2').val(no_wa);
                $('#id_order2').val(id_order);
    }
    $('#tombolEdit').on('click', () => {
                const data = $('#formEdit').serialize()
                $.ajax({
                    url: './db/editOrder.php',
                    method: 'post',
                    data,
                    success: () => window.location.reload()
                })
    })
    $('#jenis_laudry2').on('change', function () {
                var id_jenis = $(this).val();
                
                $.ajax({
                    url: 'db/rego.php',
                    method: 'get',
                    data: `id_jenis=${id_jenis}`,
                    success: function (response) {
                        data = JSON.parse(response);
                        $('#harga2').val(data.harga);
                        
                    }
                });
    });
</script>
</html>