<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h3>Tambah Anggota</h3>
    <form method="POST" action="">
      <label>Nama</label>
      <input type="text" name="nama" required>

      <label>Alamat</label>
      <input type="text" name="alamat" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Profil</label>
      <input type="text" name="profil">

      <label>Status Keanggotaan</label>
      <select name="status_keanggotaan" required>
        <option value="">- Pilih Status -</option>
        <option value="Aktif">Aktif</option>
        <option value="Non Aktif">Non Aktif</option>
      </select>


      <button type="submit" name="simpan">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
  </div>

<?php
if(isset($_POST['simpan'])){
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $profil = $_POST['profil'];
  $status = $_POST['status_keanggotaan'];

  $query = mysqli_query($koneksi, "INSERT INTO anggota (nama, alamat, email, profil, status_keanggotaan) 
                                   VALUES ('$nama','$alamat','$email','$profil','$status')");
  if($query){
    echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data');</script>";
  }
}
?>
</body>
</html>