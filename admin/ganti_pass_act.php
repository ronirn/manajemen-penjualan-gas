<?php 
include 'config.php';

$user = $_POST['user'];
$lama = md5($_POST['lama']);
$baru = $_POST['baru'];
$ulang = $_POST['ulang'];

$cek = mysqli_query($connection, "SELECT * FROM admin WHERE pass='$lama' AND uname='$user'");
if(mysqli_num_rows($cek) == 1){
    if($baru == $ulang){
        $b = md5($baru);
        mysqli_query($connection, "UPDATE admin SET pass='$b' WHERE uname='$user'");
        header("location:ganti_pass.php?pesan=oke");
    } else {
        header("location:ganti_pass.php?pesan=tdksama");
    }
} else {
    header("location:ganti_pass.php?pesan=gagal");
}
?>
