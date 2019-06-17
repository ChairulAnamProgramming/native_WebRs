<?php
require_once('../function/obat_function.php');
session_start();
if (!isset($_SESSION['id'])) {
    header("location:../auth/index.php");
}
$id = $_SESSION['id'];

$session = select("SELECT * FROM tbl_user WHERE id_user = '$id'")[0];
?>
<?php require_once('../config/database.php'); ?>
<?php require_once('../config/autoload.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>dist/css/adminlte.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url("style.css") ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/datatables/dataTables.bootstrap4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">