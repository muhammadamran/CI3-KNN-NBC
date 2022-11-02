<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?= $PageTitle; ?> | <?= $this->session->userdata('title'); ?></title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/apps/icon/' . $this->session->userdata('icon')); ?>">
	<!-- Pignose Calender -->
	<link href="<?= base_url('assets/plugins/pg-calendar/css/pignose.calendar.min.css'); ?>" rel="stylesheet">
	<!-- Chartist -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/chartist/css/chartist.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css'); ?>">
	<!-- Custom Stylesheet -->
	<link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
	<!-- Font Poppins -->
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<!-- FONTAWESON 5 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous" />
</head>
<?php
date_default_timezone_set("Asia/Jakarta");
?>
<?php
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array(
		1 =>
		'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);
	$bulan = array(
		1 =>
		'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split    = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
// FORMAT RUPIAH
function Rupiah($angka)
{
	$hasil = "Rp. " . number_format($angka, 2, ',', '.');
	return $hasil;
}
?>

<body>
	<!--*******************Preloader start********************-->
	<!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
	<!--*******************Preloader end********************-->