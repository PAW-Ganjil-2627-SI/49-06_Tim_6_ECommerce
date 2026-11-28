<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Ekspedisi - Modul Ekspedisi Kirim</title>
    <!-- Path CSS diubah menyesuaikan folder baru -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Ekspedisi Kirim</h1>    
    </header>

    <div class="container">
        <div class="kartu">
            <h2 id="detail-judul">Detail Informasi Ekspedisi</h2>
            
            <table class="detail-table">
                <tr>
                    <th>Nama Ekspedisi</th>
                    <td id="detail-nama">-</td>
                </tr>
                <tr>
                    <th>Jenis Layanan</th>
                    <td id="detail-layanan">-</td>
                </tr>
                <tr>
                    <th>Zonasi Pengiriman</th>
                    <td id="detail-zonasi">-</td>
                </tr>
                <tr>
                    <th>Estimasi Waktu</th>
                    <td id="detail-estimasi">-</td>
                </tr>
                <tr>
                    <th>Tarif Dasar</th>
                    <td id="detail-tarif">-</td>
                </tr>
                <tr>
                    <th>Status Operasional</th>
                    <td><span class="badge aktif" id="detail-status">Aktif</span></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td id="detail-keterangan">-</td>
                </tr>
            </table>

            <div style="margin-top: 20px;">
                <a href="index.html" class="btn-kembali">&larr; Kembali ke Daftar Ekspedisi</a>
            </div>
        </div>
    </div>

    <footer>
        <p>Modul C / Modul Ekspedisi Kirim</p>
        <p>Hazel Arya Syawalinov - 102022500324 - SI4906 - Kelompok 6</p>
    </footer>

    <script src="assets/js/detail.js"></script>
</body>
</html>