<?php 
session_start();
include 'admin/config.php';

$uname = $_POST['uname'];
$pass = $_POST['pass'];
$pas = md5($pass);

$query = mysqli_query($connection, "SELECT * FROM admin WHERE uname='$uname' AND pass='$pas'") or die(mysqli_error($connection));

if (mysqli_num_rows($query) == 1) {
    $_SESSION['uname'] = $uname;
    header("location:admin/index.php");
} else {
    header("location:index.php?pesan=gagal") or die(mysqli_error($connection));
}

mysqli_close($connection);
?>
