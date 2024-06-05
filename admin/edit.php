<?php
include '../header.php';
?>
<div class="container">
    <h3>Edit Barang</h3>
    <?php

    $connection = mysqli_connect("localhost", "root", "", "apk_gas");

    if (!$connection) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $id_brg = mysqli_real_escape_string($connection, $_GET['id']);
    $det = mysqli_query($connection, "SELECT * FROM barang WHERE id='$id_brg'") or die(mysqli_error($connection));

    while ($d = mysqli_fetch_array($det)) {
    ?>
        <form action="update.php" method="post">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td><input type="text" class="form-control" name="jenis" value="<?php echo $d['jenis'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Suplier</th>
                        <td><input type="text" class="form-control" name="suplier" value="<?php echo $d['suplier'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Modal</th>
                        <td><input type="text" class="form-control" name="modal" value="<?php echo $d['modal'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="text-left">
                                <a class="btn btn-light btn-bordered" href="barang.php">Kembali</a>
                                <input type="submit" class="btn btn-olive" value="Simpan">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    <?php
    }
    mysqli_close($connection);
    ?>
</div>
<?php include 'footer.php'; ?>

<style>
    .btn-olive {
        background-color: blue;
        color: white;
    }

    .btn-bordered {
        border: 1px solid gray;
        color: black;
    }
</style>