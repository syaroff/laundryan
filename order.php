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
    <title>Pesanan - Adela Laundry</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include "components/sidebar.php"; ?>
            <div class="col px-0 w-100">
                <?php include "components/navbar.php"; ?>
                <div class="col-12 px-3 py-4">
                    <div class="card p-0">
                        <div class="card-header pt-3">
                            <h5>Tambah Pesanan</h5>
                        </div>
                        <div class="card-body py-4 px-4">
                            <form method="post">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-3 my-1">
                                            <label>Nama Pengorder</label>
                                            <input type="text" name="nama_pengorder" id="nama_pengorder" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-3 my-1">
                                            <label>Jenis Laundry</label>
                                            <select name="jenis_laudry" id="jenis_laudry" class="form-control">
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
                                        <div class="col-12 col-md-3 my-1">
                                            <label>Harga</label>
                                            <input type="number" name="harga" id="harga" class="form-control" value="3000" readonly required>
                                        </div>
                                        <div class="col-12 col-md-3 my-1">
                                            <label>Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-3 my-1">
                                            <label>Ongkir</label>
                                            <input type="number" name="ongkir" id="ongkir" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-3 my-1">
                                            <label>Status</label>
                                            <select name="statuss" id="statuss" class="form-control">
                                                <option value="0">Belum Lunas</option>
                                                <option value="1">Lunas</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 my-2">
                                            <label>Kode Promo</label>
                                            <input type="text" name="kode_promo" id="kode_promo" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-3 my-2">
                                            <label>No.Whatsapp</label>
                                            <input type="text" name="no_wa" id="no_wa" class="form-control">
                                        </div>
                                        <div class="col-12 my-1">
                                            <label>Alamat</label>
                                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" required></textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Simpan" name="simpanOrder" class="btn btn-dark float-end w-25">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-3 py-2">
                    <div class="card p-0">
                        <div class="card-header pt-3">
                            <h5>Data Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-3 my-3 d-flex">
                                <button id="btn-search" class="btn btn-dark"><span class="bi-search"></span></button>
                                <input type="text" id="search" class="form-control" placeholder="Search Here">
                                <a href="order.php?id=all" class="btn btn-dark">All</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark text-center">
                                        <th>NO</th>
                                        <th>Nama Pengorder</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Laundry</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Ongkir</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Kode Promo</th>
                                        <th>No.Whatsapp</th>
                                        <th>Total Harga</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="tbody-data" class="text-center">
                                        <?php include "db/showOrder.php" ?>
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
        $(document).ready(function () {
            
            $('#btn-search').click(function (e) { 
                e.preventDefault();
                let query = $('#search').val();
                window.location.href = "order.php?search=" + query;
            });
            $('#tombolEdit').on('click', () => {
                const data = $('#formEdit').serialize()
                $.ajax({
                    url: './db/editOrder.php',
                    method: 'post',
                    data,
                    success: () => window.location.reload()
                })
            })
            $('#jenis_laudry').on('change', function () {
                var id_jenis = $(this).val();
                
                $.ajax({
                    url: 'db/rego.php',
                    method: 'get',
                    data: `id_jenis=${id_jenis}`,
                    success: function (response) {
                        data = JSON.parse(response);
                        $('#harga').val(data.harga);
                        
                    }
                });
            });
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
        });
    </script>
    <?php 
        
        if(isset($_POST['simpanOrder'])) {
            $hargaTotal = 0;
            if(!empty($_POST['kode_promo'])) {
                $cekPromo = mysqli_query($konek,"SELECT diskon FROM tbl_member WHERE kode_promo='$_POST[kode_promo]'");
                if(mysqli_num_rows($cekPromo)) {
                    $selectPromo = mysqli_fetch_assoc($cekPromo);
                    $diskon = $selectPromo['diskon'];
                }
                else {
                    $diskon = 0;
                }
            }
            else {
                $diskon = 0;
            }
            $hargaTotal = $_POST['harga'] * $_POST['jumlah'] + $_POST['ongkir'] - $diskon;
            $insertOrder = mysqli_query($konek,"INSERT INTO tbl_order (nama_pengorder,jenis_laudry,harga,jumlah,ongkir,alamat,statuss,kode_promo,no_wa) VALUES('$_POST[nama_pengorder]','$_POST[jenis_laudry]','$_POST[harga]','$_POST[jumlah]','$_POST[ongkir]','$_POST[alamat]','$_POST[statuss]','$_POST[kode_promo]','$_POST[no_wa]')");
            
            // Pengahsilan
            $selectIdOrder = mysqli_query($konek,"SELECT id_order FROM tbl_order ORDER BY id_order DESC LIMIT 1");
            $rowIdOrder = mysqli_fetch_assoc($selectIdOrder);$id_order = $rowIdOrder['id_order'];
            $tanggal = date("Y-m-d");

            $insertPenghasilan = mysqli_query($konek,"INSERT INTO tbl_penghasilan (id_order,tanggal,jumlah) VALUES('$id_order','$tanggal','$hargaTotal')");
            if($insertOrder) {
    ?>
                <script>window.location.href='order.php?id=all';</script>
    <?php
               
            }
        }

    ?>
</body>
</html>