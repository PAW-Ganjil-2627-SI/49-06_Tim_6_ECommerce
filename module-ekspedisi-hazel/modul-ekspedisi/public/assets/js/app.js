let dataEkspedisi = JSON.parse(localStorage.getItem('dataEkspedisi'));

if (!dataEkspedisi) {
    dataEkspedisi = [
        { id: 1, nama: "JNE", layanan: "Express", zonasi: "Pulau Jawa", status: "Aktif" },
        { id: 2, nama: "SiCepat", layanan: "Express", zonasi: "Pulau Jawa", status: "Aktif" },
        { id: 3, nama: "SPX", layanan: "Express", zonasi: "Pulau Jawa", status: "Aktif" }
    ];
    localStorage.setItem('dataEkspedisi', JSON.stringify(dataEkspedisi));
}

function tampilkanData() {
    const tbody = document.getElementById('tabel-ekspedisi');
    tbody.innerHTML = '';

    dataEkspedisi.forEach((item, index) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.layanan}</td>
            <td>${item.zonasi}</td>
            <td><span class="badge aktif">${item.status}</span></td>
            <td>
                <a href="detail.html?id=${item.id}" style="color: blue; text-decoration: none; margin-right: 10px;">Detail</a>
                <a href="#" onclick="hapusData(${item.id})" style="color: red; text-decoration: none;">Hapus</a>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

document.getElementById('form-tambah').addEventListener('submit', function(e) {
    e.preventDefault();

    const nama = document.getElementById('nama-kurir').value;
    const layanan = document.getElementById('layanan').value;
    const zonasi = document.getElementById('zonasi').value;
    const dataBaru = {
        id: Date.now(),
        nama: nama,
        layanan: layanan,
        zonasi: zonasi,
        status: "Aktif"
    };

    dataEkspedisi.push(dataBaru);
    localStorage.setItem('dataEkspedisi', JSON.stringify(dataEkspedisi));

    tampilkanData();
    document.getElementById('form-tambah').reset();
    alert("Data Ekspedisi berhasil ditambahkan!");
});

function hapusData(id) {
    if(confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        dataEkspedisi = dataEkspedisi.filter(item => item.id !== id);
        
        localStorage.setItem('dataEkspedisi', JSON.stringify(dataEkspedisi));
        tampilkanData();
    }
}

document.addEventListener('DOMContentLoaded', tampilkanData);