<?php 
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE id ='$id'");
header("location:pengeluaran.php");
?>
