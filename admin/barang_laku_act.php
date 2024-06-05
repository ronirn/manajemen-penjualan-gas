<?php 

include 'config.php';
$tgl = $_POST['tgl'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

$dt = mysqli_query($connection, "SELECT * FROM barang WHERE nama='$nama'");
$data = mysqli_fetch_array($dt);
$sisa = $data['jumlah'] - $jumlah;
mysqli_query($connection, "UPDATE barang SET jumlah='$sisa' WHERE nama='$nama'");

$modal = $data['modal'];
$laba = $harga - $modal;
$labaa = $laba * $jumlah;
$total_harga = $harga * $jumlah;
mysqli_query($connection, "INSERT INTO barang_laku VALUES('', '$tgl', '$nama', '$jumlah', '$harga', '$total_harga', '$labaa')") or die(mysqli_error($connection));
header("location:barang_laku.php");

?>
