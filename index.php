<?php
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">Halaman Laundry</div>
    <div class="container">
        <h2>Data Anggota</h2>
        <a href="anggota_tambah.php" class="tambah-btn">+ Tambah Anggota</a>
        
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Profil</th>
            <th>Status Keanggotaan</th>
            <th>Opsi</th>
        </tr>

        <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM anggota");
            while ($row = mysqli_fetch_assoc($data)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['profil']; ?></td>
            <td><?= $row['status_keanggotaan']; ?></td>
            <td>
                <a href="anggota_edit.php?id=<?= $row['id_anggota']; ?>" class="btn btn-edit">Edit</a>
                <a href="anggota_hapus.php?id=<?= $row['id_anggota']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>