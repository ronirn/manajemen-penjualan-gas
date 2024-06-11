<!DOCTYPE html>
<html>

<head>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'cek.php';
    include 'config.php';
    ?>
    <title>GAS ELPIJI</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-default {
            background-color: #007bff;
            border-color: #007bff;
        }

        .navbar-default .navbar-brand,
        .navbar-default .navbar-nav>li>a {
            color: #ffffff;
        }

        .navbar-default .navbar-nav>li>a:hover {
            color: #ffffff;
            background-color: #0056b3;
        }

        .navbar-default .navbar-nav>li>a>.glyphicon {
            color: #ffffff;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #ffffff;
        }

        .nav-pills {
            background-color: #007bff;
            padding: 10px;
            border-radius: 5px;
        }

        .nav-pills>li>a {
            color: #ffffff;
            font-weight: bold;
        }

        .nav-pills>li>a:hover {
            background-color: #0056b3;
            color: #ffffff;
        }

        .nav-pills .logout {
            margin-top: auto;
        }

        .modal-content {
            border-radius: 0;
        }

        .modal-header {
            background-color: #337ab7;
            color: #fff;
            border-bottom: none;
        }

        .modal-body {
            padding: 20px;
        }

        .alert {
            border-radius: 0;
        }

        .alert-warning {
            background-color: #f0ad4e;
            border-color: #eea236;
            color: #fff;
        }

        .modal-footer {
            border-top: none;
        }
    </style>

</head>

<body>
    <div class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="" class="navbar-brand">GAS ELPIJI</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span></a></li>
                    <li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Haii, <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal Input -->
    <div id="modalpesan" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Pesan Notification</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $periksa = mysqli_query($connection, "SELECT * FROM barang WHERE jumlah <=3");
                    while ($q = mysqli_fetch_array($periksa)) {
                        if ($q['jumlah'] <= 3) {
                            echo "<div class='alert alert-warning' style='padding: 10px; margin-bottom: 10px;'>
                                <span class='glyphicon glyphicon-info-sign'></span>
                                Stok <strong style='color: red;'>" . $q['nama'] . "</strong> yang tersisa sudah kurang dari 3. Silahkan pesan lagi!
                              </div>";
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="row">
            <?php
            $use = $_SESSION['uname'];
            $fo = mysqli_query($connection, "SELECT foto FROM admin WHERE uname='$use'");
            while ($f = mysqli_fetch_array($fo)) {
            ?>
            <?php
            }
            ?>
        </div>

        <div class="row"></div>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
            <li id="data-barang"><a href="barang.php"><span class="glyphicon glyphicon-briefcase"></span> Data Barang</a></li>
            <li><a href="barang_laku.php"><span class="glyphicon glyphicon-briefcase"></span> Entry Penjualan</a></li>
            <li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
            <li class="logout" style="margin-top: 400px;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>

    </div>
    <div class="col-md-10">