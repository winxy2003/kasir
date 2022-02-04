<?php
include 'koneksi.php';

//mengambil nis yang ada di url
$id_transaksi =  $_GET['id_transaksi'];

//query menghapus data
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");

//alihkan halaman ke barang.php
header("location:transaksi.php");
