<?php include '../header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #dee2e6;">
                    <h3>Detail Barang</h3>
                </div>
                <div class="card-body" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <?php
                    include 'config.php';

                    $id_brg = mysqli_real_escape_string($connection, $_GET['id']);

                    $det = mysqli_query($connection, "SELECT * FROM barang WHERE id='$id_brg'") or die(mysqli_error($connection));
                    while ($d = mysqli_fetch_array($det)) {
                    ?>					
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td><?php echo $d['nama'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis</strong></td>
                                <td><?php echo $d['jenis'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Suplier</strong></td>
                                <td><?php echo $d['suplier'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Modal</strong></td>
                                <td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
                            </tr>
                            <tr>
                                <td><strong>Harga</strong></td>
                                <td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
                            </tr>
                            <tr>
                                <td><strong>Jumlah</strong></td>
                                <td><?php echo $d['jumlah'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Sisa</strong></td>
                                <td><?php echo $d['sisa'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text">
                                    <a href="barang.php" class="btn btn-outline-dark" style="background-color: #ffffff; border: 1px solid #dee2e6; color: black;">
                                        Kembali
                                    </a>
                                </td>
                            </tr>
                        </table>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
