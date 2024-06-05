<?php 
include 'config.php';
$id = $_GET['id'];
$jumlah = $_GET['jumlah'];
$nama = $_GET['nama'];

$a = mysqli_query($connection, "SELECT jumlah FROM barang WHERE nama='$nama'");
$b = mysqli_fetch_array($a);
$kembalikan = $b['jumlah'] + $jumlah;
$c = mysqli_query($connection, "UPDATE barang SET jumlah='$kembalikan' WHERE nama='$nama'");
mysqli_query($connection, "DELETE FROM barang_laku WHERE id='$id'");
header("location:barang_laku.php");
?>
