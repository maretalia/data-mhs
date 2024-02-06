<?php
include 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("delete from mahasiswa where idmahasiswa='$id'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='index.php';</script>";
