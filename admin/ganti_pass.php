<?php
include '../header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Ganti Password</h3>
            <br /><br />
            <?php
            if (isset($_GET['pesan'])) {
                $pesan = htmlspecialchars($_GET['pesan']);
                if ($pesan == "gagal") {
                    echo "<div class='alert alert-danger'>Password gagal di ganti! Periksa kembali password yang anda masukkan!</div>";
                } else if ($pesan == "tdksama") {
                    echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai! Silahkan ulangi!</div>";
                } else if ($pesan == "oke") {
                    echo "<div class='alert alert-success'>Password berhasil diubah!</div>";
                }
            }
            ?>
            <div class="card shadow" style="border-radius: 10px; background-color: #fff; padding: 30px;">
                <form action="ganti_pass_act.php" method="post" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; border: 1px solid rgba(0, 0, 0, 0.1);">
                    <input name="user" type="hidden" value="<?php echo htmlspecialchars($_SESSION['uname']); ?>">

                    <div class="form-group">
                        <label style="font-weight: bold;">Password Lama</label>
                        <div class="input-group" style="border-radius: 5px;">
                            <input name="lama" type="password" class="form-control password-field" placeholder="" style="padding: 20px; font-size: 18px; width: calc(100% - 40px); border-radius: 5px 0 0 5px;">
                            <div class="input-group-append input-group-icon" style="border-radius: 0 5px 5px 0;">
                                <button class="btn btn-outline-secondary toggle-password" type="button" style="border-radius: 0;">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: bold;">Password Baru</label>
                        <div class="input-group" style="border-radius: 5px;">
                            <input name="baru" type="password" class="form-control password-field" placeholder="" style="padding: 20px; font-size: 18px; width: calc(100% - 40px); border-radius: 5px 0 0 5px;">
                            <div class="input-group-append input-group-icon" style="border-radius: 0 5px 5px 0;">
                                <button class="btn btn-outline-secondary toggle-password" type="button" style="border-radius: 0;">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: bold;">Ulangi Password</label>
                        <div class="input-group" style="border-radius: 5px;">
                            <input name="ulang" type="password" class="form-control password-field" placeholder="" style="padding: 20px; font-size: 18px; width: calc(100% - 40px); border-radius: 5px 0 0 5px;">
                            <div class="input-group-append input-group-icon" style="border-radius: 0 5px 5px 0;">
                                <button class="btn btn-outline-secondary toggle-password" type="button" style="border-radius: 0;">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text">
                        <button type="submit" class="btn btn-olive" style="background-color: blue; color: white; border: none; padding: 10px 20px; border-radius: 5px; margin-right: 10px;">Simpan</button>
                        <button type="reset" class="btn btn-outline-dark" style="background-color: white; border: 1px solid #dee2e6; color: black; padding: 10px 20px; border-radius: 5px;">Reset</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.password-field').forEach(input => {
        const icon = input.parentNode.querySelector('.input-group-icon i');
        icon.addEventListener('click', function() {
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>

<?php
include 'footer.php';
?>