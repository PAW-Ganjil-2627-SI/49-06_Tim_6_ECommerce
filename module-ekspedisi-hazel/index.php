<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_kurir = $_POST['nama_kurir'];
    $layanan    = $_POST['layanan'];
    $zonasi     = $_POST['zonasi'];
    $status     = 'Aktif';

    $queryInsert = "INSERT INTO ekspedisi (nama_kurir, layanan, zonasi, status) 
                    VALUES ('$nama_kurir', '$layanan', '$zonasi', '$status')";
    
    $simpan = mysqli_query($koneksi, $queryInsert);

    if ($simpan) {
        echo "<script>
                alert('Data ekspedisi berhasil disimpan!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Ekspedisi Kirim</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Ekspedisi Kirim</h1>    
    </header>

    <div class="container">
        <div class="kartu">
            <h2>Tambah Ekspedisi</h2>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="nama-kurir">Nama Ekspedisi</label>
                    <input type="text" id="nama-kurir" name="nama_kurir" placeholder="Contoh: JNE, SiCepat" required>
                </div>

                <div class="form-group">
                    <label for="layanan">Jenis Layanan</label>
                    <select id="layanan" name="layanan" required>  
                        <option value="Reguler">Reguler</option>
                        <option value="Express">Express</option>
                    </select>
                </div>

                <div class="form-group">    
                    <label for="zonasi">Zonasi (Wilayah Kirim)</label>
                    <select id="zonasi" name="zonasi" required>
                        <option value="Pulau Jawa">Pulau Jawa</option>
                        <option value="Luar Jawa">Luar Jawa</option>
                    </select>
                </div>
                
                <button type="submit" name="submit" style="padding: 10px 15px; background: #007b7f; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data</button>
            </form>
        </div>

        <div class="kartu">
            <h2>Daftar Ekspedisi</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kurir</th>
                        <th>Jenis Layanan</th>
                        <th>Zonasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryTampil = "SELECT * FROM ekspedisi ORDER BY id DESC"; // Tampilkan data terbaru di atas
                    $tampil = mysqli_query($koneksi, $queryTampil);
                    $no = 1;

                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_kurir']; ?></td>
                        <td><?= $data['layanan']; ?></td>
                        <td><?= $data['zonasi']; ?></td>
                        <td><span class="badge aktif"><?= $data['status']; ?></span></td>
                        <td>
                            <!-- Link ini akan membawa ID unik data ke halaman selanjutnya -->
                            <a href="detail.php?id=<?= $data['id']; ?>" style="color: blue; text-decoration: none;">Detail</a> |
                            <a href="edit.php?id=<?= $data['id']; ?>" style="color: orange; text-decoration: none;">Edit</a> |
                            <a href="hapus.php?id=<?= $data['id']; ?>" style="color: red; text-decoration: none;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>Modul C / Modul Ekspedisi Kirim</p>
        <p>Hazel Arya Syawalinov - 102022500324 - SI4906 - Kelompok 6</p>
    </footer>
</body>
</html>