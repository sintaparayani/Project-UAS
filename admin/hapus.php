<?php
require 'setting.php';
$id=$_GET['id'];
$query="DELETE FROM sewa WHERE id_penyewaan=$id";
$sql=mysqli_query($koneksi,$query);
if ($sql) {
    echo "data berhasil dihapus";
    header('location:index.php');
}else{
    echo "data gagal terhapus";
}