<?php 
$connection = mysqli_connect("localhost", "root", "", "apk_gas");


if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

