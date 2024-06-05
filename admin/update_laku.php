<?php 
include 'config.php'; 

$id = mysqli_real_escape_string($connection, $_POST['id']);
$tgl = mysqli_real_escape_string($connection, $_POST['tgl']);
$nama = mysqli_real_escape_string($connection, $_POST['nama']);
$harga = mysqli_real_escape_string($connection, $_POST['harga']);
$jumlah = mysqli_real_escape_string($connection, $_POST['jumlah']);
$total_harga = $harga * $jumlah;

$query = "UPDATE barang_laku SET tanggal='$tgl', nama='$nama', harga='$harga', jumlah='$jumlah', total_harga='$total_harga' WHERE id='$id'";

if (mysqli_query($connection, $query)) {
    header("location:barang_laku.php?message=success");
} else {
    header("location:barang_laku.php?message=error");
}

mysqli_close($connection);
?>
