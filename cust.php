<?php 

    include "db/konek.php";
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
    <title>Adela Laundry</title>
</head>
<body class="bg-dark">
    <h1 class="text-light my-5 mx-auto col-3">ADELA LAUNDRY</h1>
    <div class="card p-0 col-8 my-5 mx-auto">
        <div class="card-body">
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
                        <div class="col-12 col-md-4 my-1">
                            <label>Status</label>
                            <select name="statuss" id="statuss" class="form-control" readonly>
                                <option value="0" selected>Belum Lunas</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 my-2">
                            <label>Kode Promo</label>
                            <input type="text" name="kode_promo" id="kode_promo" class="form-control">
                        </div>
                        <div class="col-12 col-md-4 my-2">
                            <label>No Whatsapp</label>
                            <input type="text" name="no_wa" id="no_wa" class="form-control">
                        </div>
                        <div class="col-12 my-1">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" required></textarea>
                        </div>
                        
                        <div class="col-12 my-3">
                            <input type="submit" value="Simpan" name="simpanOrder" class="btn btn-dark float-end w-25">
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
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
    </script>
</body>
</html>
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
            $onkgir = 0;
            $hargaTotal = $_POST['harga'] * $_POST['jumlah'] - $diskon;
            $insertOrder = mysqli_query($konek,"INSERT INTO tbl_order (nama_pengorder,jenis_laudry,harga,jumlah,ongkir,alamat,statuss,kode_promo,no_wa) VALUES('$_POST[nama_pengorder]','$_POST[jenis_laudry]','$_POST[harga]','$_POST[jumlah]','$ongkir','$_POST[alamat]','$_POST[statuss]','$_POST[kode_promo]','$_POST[no_wa]')");
             // Pengahsilan
             $selectIdOrder = mysqli_query($konek,"SELECT id_order FROM tbl_order ORDER BY id_order DESC LIMIT 1");
             $rowIdOrder = mysqli_fetch_assoc($selectIdOrder);$id_order = $rowIdOrder['id_order'];
             $tanggal = date("Y-m-d");
 
             $insertPenghasilan = mysqli_query($konek,"INSERT INTO tbl_penghasilan (id_order,tanggal,jumlah) VALUES('$id_order','$tanggal','$hargaTotal')");
            if($insertOrder) {
    ?>
                <script>window.location.href= 'customer.php?id=<?=$id_order?>';</script>;
    <?php
            }
        }

    ?>