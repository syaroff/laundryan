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
    <title>Pelanggan - Adela Laundry</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include "components/sidebar.php"; ?>
            <div class="col px-0 w-100">
                <?php include "components/navbar.php"; ?>
                <div class="col-12 px-3 py-4">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h5>Tambah Pelanggan</h5>
                        </div>
                        <div class="card-body py-4 px-4">
                            <form method="post">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-4 my-3">
                                            <label><span class="bi-person-fill"></span> Nama Pelanggan</label>
                                            <input type="text" name="nama_pelanggan" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-4 my-3">
                                            <label><span class="bi-ticket-fill"></span> Kode Promo</label>
                                            <input type="text" name="promo" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-4 my-3">
                                            <label><span class="bi-tag-fill"></span> Jumlah Potongan Harga</label>
                                            <input type="number" name="diskon" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Simpan" class="btn btn-dark float-end w-25" name="simpan_pelanggan">
                        </div>
                            </form>
                    </div>
                </div>
                <div class="col-12 px-3 py-4">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h5>Data Pelanggan</h5>
                        </div>
                        <div class="card-body py-4 px-4">
                            <div class="table-responsive">
                                <table class="table table-hovered table-bordered text-center">
                                    <thead class="table-dark">
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
                <h5 class="modal-title">Edit Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEdit" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="my-3">
                                <label>Nama Pelanggan</label>
                                <input type="hidden" name="id_member" id="id_member">
                                <input type="text" name="nama_member" id="nama_member" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>Kode Promo</label>
                                <input type="text" name="kode_promo" id="kode_promo" class="form-control" required>
                            </div>
                            <div class="my-3">
                                <label>Jumlah Potongan Harga</label>
                                <input type="number" name="diskon" id="diskon" class="form-control" required>
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
        const edit = (nama_member,kode_promo,diskon,id_member) => {
                var myModal = new bootstrap.Modal(document.getElementById('edit'), {
                keyboard: false
                })
                myModal.show()
                $('#nama_member').val(nama_member);
                $('#kode_promo').val(kode_promo);
                $('#diskon').val(diskon);
                $('#id_member').val(id_member);
        }
        $('#tombolEdit').on('click', () => {
            const data = $('#formEdit').serialize()
            $.ajax({
                url: './db/editMember.php',
                method: 'post',
                data,
                success: () => window.location.reload()
            })
        })
    </script>
</body>
    <?php
        if(isset($_POST['simpan_pelanggan'])) {
            $sqlInsert = mysqli_query($konek,"INSERT INTO tbl_member (nama_member,kode_promo,diskon) VALUES('$_POST[nama_pelanggan]','$_POST[promo]','$_POST[diskon]')");
            if($sqlInsert) {
                echo "<script>window.location.href = 'member.php'</script>";
            }
        }
    ?>
</html>
