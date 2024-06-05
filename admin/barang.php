<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    include 'cek.php';
    include 'config.php';
    ?>
    <title>GAS ELPIJI</title>
    <style>
        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .pagination>li>a {
            color: #007bff;
        }

        .pagination>li>a:hover {
            background-color: #007bff;
            color: white;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .thead-blue th {
            background-color: blue;
            color: white;
        }
    </style>
</head>

<body>
    <?php include '../header.php'; ?>
    <br>

    <div class="container">
        <h3 class="mt-4">Data Barang</h3>
        <button style="margin-bottom:20px; background-color: blue;" data-toggle="modal" data-target="#myModal" class="btn btn-custom col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Barang</button>

        <br />
        <br />

        <?php
        $periksa = mysqli_query($connection, "SELECT * FROM barang WHERE jumlah <= 3");
        while ($q = mysqli_fetch_array($periksa)) {
            if ($q['jumlah'] <= 3) {
        ?>
                <script>
                    $(document).ready(function() {
                        $('#pesan_sedia').css("color", "red");
                        $('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
                    });
                </script>
        <?php
                echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>" . $q['nama'] . "</a> yang tersisa sudah kurang dari 3. Silahkan pesan lagi !!</div>";
            }
        }
        ?>

        <?php
        $per_hal = 10;
        $jumlah_record = mysqli_query($connection, "SELECT COUNT(*) FROM barang");
        $jum = mysqli_fetch_array($jumlah_record)[0];
        $halaman = ceil($jum / $per_hal);
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $per_hal;
        ?>

        <div class="col-md-12">
            <table class="col-md-2">
                <tr>
                    <td style="color: black;">Jumlah Record</td>
                    <td style="color: black;"><?php echo $jum; ?></td>
                </tr>
                <tr>
                    <td style="color: black;">Jumlah Halaman</td>
                    <td style="color: black;"><?php echo $halaman; ?></td>
                </tr>
            </table>
        </div>

        <form action="cari_act.php" method="get">
            <div class="input-group col-md-5 col-md-offset-7 mb-3">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">
            </div>
        </form>
        <br>

        <table class="table table-bordered table-hover">
            <thead class="thead-blue">
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4">Nama Barang</th>
                    <th class="col-md-3">Harga Jual</th>
                    <th class="col-md-1">Jumlah</th>
                    <th class="col-md-3">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = mysqli_real_escape_string($connection, $_GET['cari']);
                    $brg = mysqli_query($connection, "SELECT * FROM barang WHERE nama LIKE '%$cari%' OR jenis LIKE '%$cari%' LIMIT $start, $per_hal");
                } else {
                    $brg = mysqli_query($connection, "SELECT * FROM barang LIMIT $start, $per_hal");
                }
                $no = 1;
                while ($b = mysqli_fetch_array($brg)) {

                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $b['nama'] ?></td>
                        <td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
                        <td><?php echo $b['jumlah'] ?></td>
                        <td>
                            <a href="det_barang.php?id=<?php echo $b['id']; ?>" class="btn btn-custom" style="background-color: blue; margin-right: 5px;"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="edit.php?id=<?php echo $b['id']; ?>" class="btn btn-warning" style="margin-right: 5px;"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>

                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="4">Total Modal</td>
                    <td>
                        <?php
                        $x = mysqli_query($connection, "SELECT SUM(modal) AS total FROM barang");
                        $xx = mysqli_fetch_array($x);
                        echo "<b> Rp." . number_format($xx['total']) . ",-</b>";
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
            for ($x = 1; $x <= $halaman; $x++) {
            ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
            <?php
            }
            ?>
        </ul>

        <!-- modal input -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: blue;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color: white;">Tambah Barang Baru</h4>
                    </div>
                    <div class="modal-body">
                        <form action="tmb_brg_act.php" method="post">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
                            </div>
                            <div class="form-group">
                                <label>Suplier</label>
                                <input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
                            </div>
                            <div class="form-group">
                                <label>Harga Modal</label>
                                <input name="modal" type="text" class="form-control" placeholder="Modal per unit">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: white; color: olive;">Batal</button>
                        <input type="submit" class="btn btn-success" style="background-color: blue;" value="Simpan">
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>
</body>

</html>