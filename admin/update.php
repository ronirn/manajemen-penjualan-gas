<?php 
include 'config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$suplier = $_POST['suplier'];
$modal = $_POST['modal'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

mysqli_query($connection, "UPDATE barang SET nama='$nama', jenis='$jenis', suplier='$suplier', modal='$modal', harga='$harga', jumlah='$jumlah' WHERE id='$id'");
header("location:barang.php");
?>
