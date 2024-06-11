<?php
include '../header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Barang Terjual</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-footer .btn {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="mt-4">Data Barang Terjual</h3>
        <button style="margin-bottom:20px; background-color: blue; border-color: blue;" data-toggle="modal" data-target="#myModal" class="btn btn-custom col-md-2"><span class="glyphicon glyphicon-pencil"></span> Entry</button>
        <form action="" method="get">
            <div class="input-group col-md-5 col-md-offset-7 mb-3">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                <select name="tanggal" class="form-control" onchange="this.form.submit()">
                    <option>Pilih tanggal ..</option>
                    <?php
                    $pil = mysqli_query($connection, "SELECT DISTINCT tanggal FROM barang_laku ORDER BY tanggal DESC");
                    while ($p = mysqli_fetch_array($pil)) {
                    ?>
                        <option><?php echo $p['tanggal'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </form>
        <br />
        <?php
        if (isset($_GET['tanggal'])) {
            echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> " . $_GET['tanggal'] . "</a></h4>";
        }
        ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark" style="background-color: blue; color: white;">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Harga Terjual /pc</th>
                    <th>Total Harga</th>
                    <th>Jumlah</th>
                    <th>Laba</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['tanggal'])) {
                    $tanggal = mysqli_real_escape_string($connection, $_GET['tanggal']);
                    $brg = mysqli_query($connection, "SELECT * FROM barang_laku WHERE tanggal LIKE '$tanggal' ORDER BY tanggal DESC");
                } else {
                    $brg = mysqli_query($connection, "SELECT * FROM barang_laku ORDER BY tanggal DESC");
                }
                $no = 1;
                while ($b = mysqli_fetch_array($brg)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $b['tanggal'] ?></td>
                        <td><?php echo $b['nama'] ?></td>
                        <td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
                        <td>Rp.<?php echo number_format($b['total_harga']) ?>,-</td>
                        <td><?php echo $b['jumlah'] ?></td>
                        <td><?php echo "Rp." . number_format($b['laba']) . ",-" ?></td>
                        <td>
                            <a href="edit_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_laku.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama']; ?>' }" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="7">Total Pemasukan</td>
                    <?php
                    if (isset($_GET['tanggal'])) {
                        $tanggal = mysqli_real_escape_string($connection, $_GET['tanggal']);
                        $x = mysqli_query($connection, "SELECT SUM(total_harga) AS total FROM barang_laku WHERE tanggal='$tanggal'");
                        $xx = mysqli_fetch_array($x);
                        echo "<td><b> Rp." . number_format($xx['total']) . ",-
                    </b></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="7">Total Laba</td>
                    <?php
                    if (isset($_GET['tanggal'])) {
                        $tanggal = mysqli_real_escape_string($connection, $_GET['tanggal']);
                        $x = mysqli_query($connection, "SELECT SUM(laba) AS total FROM barang_laku WHERE tanggal='$tanggal'");
                        $xx = mysqli_fetch_array($x);
                        echo "<td><b> Rp." . number_format($xx['total']) . ",-</b></td>";
                    }
                    ?>
                </tr>
            </tbody>
        </table>

        <!-- modal input -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: blue; color: white;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Tambah Penjualan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="barang_laku_act.php" method="post">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control" name="nama">
                                    <?php
                                    $brg = mysqli_query($connection, "SELECT * FROM barang");
                                    while ($b = mysqli_fetch_array($brg)) {
                                    ?>
                                        <option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual / unit</label>
                                <input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: white; color: black;">Batal</button>
                        <input type="reset" class="btn btn-danger" style="background-color: red; color: white;" value="Reset">
                        <input type="submit" class="btn btn-success" style="background-color: blue; color: white;" value="Simpan">
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#tgl").datepicker({
                    dateFormat: 'yy/mm/dd'
                });
            });
        </script>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>