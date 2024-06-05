<?php
include '../header.php';
?>

<div class="container">
	<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Barang</h3>
	<?php
	include 'config.php';

	$id_brg = mysqli_real_escape_string($connection, $_GET['id']);

	$det = mysqli_query($connection, "SELECT * FROM barang_laku WHERE id='$id_brg'") or die(mysqli_error($connection));
	while ($d = mysqli_fetch_array($det)) {
	?>
		<form action="update_laku.php" method="post">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td></td>
						<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" value="<?php echo $d['tanggal'] ?>"></td>
					</tr>
					<tr>
						<th>Nama</th>
						<td>
							<select class="form-control" name="nama">
								<?php
								$brg = mysqli_query($connection, "SELECT * FROM barang");
								while ($b = mysqli_fetch_array($brg)) {
								?>
									<option <?php if ($d['nama'] == $b['nama']) {
												echo "selected";
											} ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
					</tr>
					<tr>
						<td colspan="2" class="text-left">
							<a href="barang_laku.php" class="btn btn-outline-dark" style="background-color: #ffffff; border: 1px solid #dee2e6; color: black; font-weight: bold;">Kembali</a>
							<input type="submit" class="btn btn-blue" value="Simpan">
						</td>
					</tr>
				</table>
			</div>
		</form>
	<?php
	}
	?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tgl').datepicker({
			dateFormat: 'yy/mm/dd'
		});
	});
</script>

<?php
include 'footer.php';
?>

<style>
	.btn-blue {
		background-color: blue;
		color: white;
	}
</style>