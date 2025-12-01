<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h3>Edit Anggota</h3>
    <form method="POST" action="">
      <label>Nama</label>
      <input type="text" name="nama" value="<?= $row['nama'] ?>" required>

      <label>Alamat</label>
      <input type="text" name="alamat" value="<?= $row['alamat'] ?>" required>

      <label>Email</label>
      <input type="email" name="email" value="<?= $row['email'] ?>" required>

      <label>Profil</label>
      <input type="text" name="profil" value="<?= $row['profil'] ?>">

      <label>Status Keanggotaan</label>
      <select name="status_keanggotaan" required>
        <option value="Aktif" <?= ($row['status_keanggotaan'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
        <option value="Non Aktif" <?= ($row['status_keanggotaan'] == 'Non Aktif') ? 'selected' : '' ?>>Non Aktif</option>
      </select>


      <button type="submit" name="update">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
  </div>

<?php
if(isset($_POST['update'])){
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $profil = $_POST['profil'];
  $status = $_POST['status_keanggotaan'];

  $query = mysqli_query($koneksi, "UPDATE anggota SET 
                                  nama='$nama', 
                                  alamat='$alamat', 
                                  email='$email',
                                  profil='$profil',
                                  status_keanggotaan='$status'
                                  WHERE id_anggota='$id'");
  if($query){
    echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('Gagal mengupdate data');</script>";
  }
}
?>
</body>
</html>