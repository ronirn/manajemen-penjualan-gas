<?php 
include 'config.php';
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$suplier = $_POST['suplier'];
$modal = $_POST['modal'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$sisa = $_POST['jumlah']; 

mysqli_query($connection, "INSERT INTO barang VALUES ('', '$nama', '$jenis', '$suplier', '$modal', '$harga', '$jumlah', '$sisa')");
header("location:barang.php");
?>
