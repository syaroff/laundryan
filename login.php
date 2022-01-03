<?php 

    session_start();
    include "db/konek.php";
    if(!empty($_SESSION['username'])) {
        header("Location: dashboard.php?id=all");
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
    <title>Sign In - Adela Laundry</title>
</head>
<body class="bg-dark">

    <div class="container contanier-fluid">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="card col-12 col-md-7">  
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row align-items-center" style="min-height: 40vh;">
                            <div class="col-12 col-md-6 text-center">
                                <span class="bi-basket-fill" style="font-size: 5rem;"></span>
                                <h2 class="fw-bold">ADELA LAUNDRY</h2>
                                <p class="pb-2">"Budayakan Malas Mencuci & Rajin Melaundry"</p>
                            </div>
                            <div class="col-12 col-md-6 px-3">
                                <form method="post">
                                    <h3 class="text-center mb-5" style="font-weight: 550;">Sign In</h3>
                                    <div class="mb-3">
                                        <label class="mb-2">Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukkan text disini" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Password</label>
                                        <input type="password" name="pasword" class="form-control" placeholder="Masukkan text disini" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-primary w-100" name="signin" value="Sign In">
                                    </div>
                                </form>
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
    <?php
    
        if(isset($_POST['signin'])) {
            $sql_login=mysqli_query($konek,"SELECT * FROM tbl_user WHERE pasword=MD5('$_POST[pasword]') AND username='$_POST[username]'");
            $row=mysqli_fetch_assoc($sql_login);
            if(mysqli_num_rows($sql_login)) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['level'] = $row['level'];
                header("Location: dashboard.php?id=all");
            }
        }
    
    ?>
</html>