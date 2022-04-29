<?php
session_start();
date_default_timezone_set('PRC');

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$gambar = $_POST['gambar'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$jumlah = 1;

	$_SESSION['pesanan'][] = [
		'id' => $id,
		'gambar' => $gambar,
		'nama' => $nama,
		'harga' => $harga,
		'jumlah' => $jumlah,
		'total_harga' =>  $harga * $jumlah
	];
}

$total_harga = 0;
$total_bayar = 0;
$tgl_transaksi = date('Y-m-d H:i:s');
$waktu_pesan = date('H:i:s');

if(!isset($_SESSION['pembeli'])){
	$_SESSION['pembeli'] = "";
}

if (isset($_POST['lanjut'])) {
	$_SESSION['pembeli'] = $_POST['nama_pembeli'];
	$_SESSION['waktu_ambil'] = $_POST['waktu_ambil'];
}

if (isset($_POST['hitung'])) {
	$index = $_POST['index'];
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];

	$_SESSION['pesanan'][$index]['total_harga'] = $jumlah * $harga;
	$_SESSION['pesanan'][$index]['jumlah'] = $jumlah;
}

if (isset($_POST['hapus'])) {
	$index = $_POST['index'];
	unset($_SESSION['pesanan'][$index]);
}

if (isset($_POST['konfirmasi'])) {
	require_once 'Menu/transaksi.php';
	$transaksi = new Transaksi();
	$transaksi->simpanTransaksi(
		$_SESSION['pesanan'], 
		$_SESSION['pembeli'],
		$tgl_transaksi,
		$waktu_pesan,
		$_SESSION['waktu_ambil']	
	);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Checkout | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div>
		<!--/breadcrums-->

		<div class="checkout-options">
		<h3>Pembeli Baru</h3>
		</div>
		<!--/checkout-options-->

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-3">
					<div class="shopper-info">
						<form action="" method="POST">
							<input type="text" name="nama_pembeli" placeholder="Display Name">
							<h4>  Waktu Ambil</h4>
							<input type="time" name="waktu_ambil" placeholder="Waktu Ambil">

							<button type="submit" name="lanjut">Lanjut</button>
						</form>
					</div>
				</div>
			</div>

			<?php if(isset($_SESSION['waktu_ambil'])): ?>
				<p style="margin-top: 35px; display: inline-block;">Waktu Ambil :</p>
				<h3 style="display: inline-block;"><?= $_SESSION['waktu_ambil'] ?></h3>
			<?php endif; ?>

			<div class="review-payment">
				<h2>Detail Pembelian</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Gambar</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total Harga</td>
							<td>Options</td>
						</tr>
					</thead>
					<tbody>

						<!-- cek apakah ada session pesanan -->
						<?php if (isset($_SESSION['pesanan'])) : ?>
							<?php foreach ($_SESSION['pesanan'] as $i => $psn) : ?>

								<tr>
									<td class="cart_product">
										<a href=""><img width="200" src="images/<?= $psn['gambar'] ?>" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href=""><?= $psn['nama'] ?></a></h4>
										<p><?= $psn['id'] ?></p>
									</td>
									<td class="cart_price">
										<p><?= $psn['harga'] ?></p>
									</td>
									<form action="" method="post">
										<input type="hidden" name="index" value="<?= $i ?>">
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<input class="cart_quantity_input" type="text" name="jumlah" value="<?= $psn['jumlah'] ?>" autocomplete="off" size="2">
												<input type="hidden" name="harga" value="<?= $psn['harga'] ?>">
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price"><?= $psn['total_harga'] ?></p>
											<?php $total_bayar += $psn['total_harga'] ?>
										</td>
										<td class="cart_delete">
											<button type="submit" name="hitung" class="cart_quantity_delete">&check;</a>
												<button type="submit" name="hapus" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
										</td>
									</form>
								</tr>

							<?php endforeach; ?>
						<?php endif; ?>

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Total</td>
										<td><span><?php echo $total_bayar ?></span></td>
									</tr>
									<tr>
										<td>Pembeli</td>
										<td><span><?php echo $_SESSION['pembeli'] ?></span></td>
									</tr>
									<tr>
										<td>
											<form action="" method="post">
												<button type="submit" name="konfirmasi" class="btn btn-block" onclick="return confirm('Proses Pesanan ?')">Konfirmasi</button>
											</form>
										</td>
									</tr>
								</table>

							</td>
						</tr>
					</tbody>
				</table>
			</div>
</section>
<!--/#cart_items-->



<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div style="padding: 10px 0;" class="col">
						<p style="text-align: center;" class="footer">2021 © Depot 7 Surabaya</p>
					</div>
				</div>
			</div>
		</div>
	</footer>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>

</html>