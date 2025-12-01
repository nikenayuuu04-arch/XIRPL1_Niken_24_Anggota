<?php
    include 'koneksi.php';
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM anggota WHERE ID_Anggota='$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
?>