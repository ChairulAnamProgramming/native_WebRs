<?php
require_once('../function/dokter_function.php');
if (!isset($_POST['check'])) {
	echo "<script>alert('Belum ada yang di checklis!');window.location='index.php';</script>";
}
$check = $_POST['check'];

if (deleteDr($check) > 0) {
	echo "<script>alert('Data anda berhasil di hapus');window.location='index.php';</script>";
} else {
	echo "<script>alert('Data anda gagal di hapus');window.location='index.php';</script>";
}
