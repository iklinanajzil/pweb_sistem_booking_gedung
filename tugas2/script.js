// // 1. Inisialisasi Data dari LocalStorage
// let daftarBooking = JSON.parse(localStorage.getItem('dataBooking')) || [];

// // 2. Fungsi Simpan Data (Poin 8)
// const saveData = () => {
//     localStorage.setItem('dataBooking', JSON.stringify(daftarBooking));
// };

// // 3. Logika Form Tambah Booking (Poin 1 & 3)
// const form = document.getElementById('bookingForm');
// if (form) {
//     form.addEventListener('submit', (e) => {
//         e.preventDefault();

//         // Ambil Nilai (DOM Manipulation)
//         const newBooking = {
//             id: document.getElementById('bookingCode').value,
//             gedung: document.getElementById('namaGedung').value,
//             organisasi: document.getElementById('organisasi').value,
//             tgl: document.getElementById('tglMulai').value,
//             status: "Menunggu"
//         };

//         // Validasi Custom (Poin 1)
//         if (newBooking.organisasi.length < 3) {
//             alert("Nama organisasi minimal 3 karakter!");
//             return;
//         }

//         daftarBooking.push(newBooking);
//         saveData();
//         alert("Pengajuan berhasil disimpan!");
//         window.location.href = "riwayat.html"; // Pindah halaman otomatis
//     });
// }

// // 4. Render Tabel di Riwayat (Poin 2)
// const renderTable = () => {
//     const tableBody = document.querySelector('.zebra-table tbody');
//     if (!tableBody) return;

//     tableBody.innerHTML = daftarBooking.map((item, index) => `
//         <tr>
//             <td>${index + 1}</td>
//             <td><b>${item.id}</b></td>
//             <td>${item.gedung}</td>
//             <td>Kegiatan ${item.organisasi}</td>
//             <td>${item.tgl}</td>
//             <td><span class="status orange">${item.status}</span></td>
//             <td>
//                 <button onclick="deleteBooking(${index})" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Hapus</button>
//             </td>
//         </tr>
//     `).join('');
    
//     updateStats(); // Jalankan statistik
// };

// // 5. Fitur Hapus (Poin 4)
// window.deleteBooking = (index) => {
//     if (confirm("Batalkan pengajuan ini?")) {
//         daftarBooking.splice(index, 1);
//         saveData();
//         renderTable();
//     }
// };

// // 6. Statistik (Poin 7)
// const updateStats = () => {
//     const statTersedia = document.querySelector('.stat-box.blue strong');
//     const statDisetujui = document.querySelector('.stat-box.green strong');
    
//     if(statTersedia) statTersedia.innerText = 28 - daftarBooking.length;
//     if(statDisetujui) statDisetujui.innerText = daftarBooking.filter(i => i.status === "Disetujui").length;
// };

// // Jalankan render saat halaman dimuat
// document.addEventListener('DOMContentLoaded', renderTable);




// /**
//  * PROYEK: SIPEGEDUNG (Sistem Booking Ruangan)
//  * FITUR: CRUD, LocalStorage, Search, Filter, & Statistik
//  */

// // 1. Inisialisasi Data dari LocalStorage (Poin 8)
// let daftarBooking = JSON.parse(localStorage.getItem('dataBooking')) || [];
// let editIndex = -1; // -1 berarti mode TAMBAH, jika >= 0 berarti mode EDIT

// // 2. Fungsi Simpan ke LocalStorage
// const saveData = () => {
//     localStorage.setItem('dataBooking', JSON.stringify(daftarBooking));
// };

// // 3. Logika Form (Tambah & Edit) - (Poin 1 & 3)
// const form = document.getElementById('bookingForm');
// if (form) {
//     form.addEventListener('submit', (e) => {
//         e.preventDefault();

//         // Ambil Nilai dari DOM
//         const bookingID = document.getElementById('bookingCode').value;
//         const namaGedung = document.getElementById('namaGedung').value;
//         const organisasi = document.getElementById('organisasi').value;
//         const tglMulai = document.getElementById('tglMulai').value;

//         // Validasi Custom (Poin 1)
//         if (!bookingID || !namaGedung || !tglMulai) {
//             alert("Semua field wajib diisi!");
//             return;
//         }
//         if (organisasi.length < 3) {
//             alert("Nama organisasi/kegiatan minimal 3 karakter!");
//             return;
//         }

//         const dataBaru = {
//             id: bookingID,
//             gedung: namaGedung,
//             organisasi: organisasi,
//             tgl: tglMulai,
//             status: "Menunggu"
//         };

//         if (editIndex === -1) {
//             // Mode Tambah
//             daftarBooking.push(dataBaru);
//             alert("Pengajuan berhasil disimpan!");
//         } else {
//             // Mode Edit (Poin 3)
//             daftarBooking[editIndex] = dataBaru;
//             editIndex = -1;
//             document.querySelector('.btn-submit').innerText = "Kirim Pengajuan";
//             alert("Data berhasil diperbarui!");
//         }

//         saveData();
//         form.reset();
//         window.location.href = "riwayat.html"; // Redirect ke tabel
//     });
// }

// // 4. Render Tabel di Halaman Riwayat (Poin 2)
// const renderTable = (dataToRender = daftarBooking) => {
//     const tableBody = document.querySelector('.zebra-table tbody');
//     if (!tableBody) return;

//     if (dataToRender.length === 0) {
//         tableBody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Tidak ada data ditemukan</td></tr>';
//     } else {
//         tableBody.innerHTML = dataToRender.map((item, index) => `
//             <tr>
//                 <td>${index + 1}</td>
//                 <td><b>${item.id}</b></td>
//                 <td>${item.gedung}</td>
//                 <td>${item.organisasi}</td>
//                 <td>${item.tgl}</td>
//                 <td><span class="status-pill pill-warning">${item.status}</span></td>
//                 <td>
//                     <button onclick="prepareEdit(${index})" style="background:#FBC02D; border:none; padding:5px 10px; border-radius:4px; cursor:pointer; font-weight:bold;">Edit</button>
//                     <button onclick="deleteBooking(${index})" style="background:#ef4444; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer; font-weight:bold;">Hapus</button>
//                 </td>
//             </tr>
//         `).join('');
//     }
    
//     updateStats(); // Jalankan statistik
// };

// // 5. Fitur Edit - Klik Edit isi Form (Poin 3)
// window.prepareEdit = (index) => {
//     const item = daftarBooking[index];
//     // Karena form ada di index.html, kita simpan index edit ke session/localStorage sementara
//     localStorage.setItem('editIndexTemp', index);
//     window.location.href = "index.html#formulir";
// };

// // Cek apakah ada permintaan Edit saat index.html dimuat
// if (window.location.pathname.includes('index.html')) {
//     const tempIndex = localStorage.getItem('editIndexTemp');
//     if (tempIndex !== null) {
//         editIndex = parseInt(tempIndex);
//         const item = daftarBooking[editIndex];
        
//         // Isi form dengan data lama
//         document.getElementById('bookingCode').value = item.id;
//         document.getElementById('namaGedung').value = item.gedung;
//         document.getElementById('organisasi').value = item.organisasi;
//         document.getElementById('tglMulai').value = item.tgl;
        
//         // Ubah teks tombol
//         document.querySelector('.btn-submit').innerText = "Simpan Perubahan";
        
//         // Hapus temp agar tidak terus dalam mode edit
//         localStorage.removeItem('editIndexTemp');
//     }
// }

// // 6. Fitur Hapus dengan Konfirmasi (Poin 4)
// window.deleteBooking = (index) => {
//     if (confirm("Apakah Anda yakin ingin menghapus/membatalkan pengajuan ini?")) {
//         daftarBooking.splice(index, 1);
//         saveData();
//         renderTable();
//     }
// };

// // 7. Pencarian Real-time (Poin 5)
// const searchInput = document.getElementById('searchBooking'); // Pastikan ID ini ada di riwayat.html
// if (searchInput) {
//     searchInput.addEventListener('input', (e) => {
//         const keyword = e.target.value.toLowerCase();
//         const filtered = daftarBooking.filter(item => 
//             item.id.toLowerCase().includes(keyword) || 
//             item.gedung.toLowerCase().includes(keyword) ||
//             item.organisasi.toLowerCase().includes(keyword)
//         );
//         renderTable(filtered);
//     });
// }

// // 8. Filter berdasarkan Kategori Gedung (Poin 6)
// const filterGedung = document.getElementById('filterGedung'); // Pastikan ID ini ada di riwayat.html
// if (filterGedung) {
//     filterGedung.addEventListener('change', (e) => {
//         const kategori = e.target.value;
//         if (kategori === "Semua") {
//             renderTable(daftarBooking);
//         } else {
//             const filtered = daftarBooking.filter(item => item.gedung === kategori);
//             renderTable(filtered);
//         }
//     });
// }

// // 9. Statistik (Poin 7)
// const updateStats = () => {
//     const totalItem = document.getElementById('statTotal');
//     const totalDisetujui = document.getElementById('statSetuju');
    
//     if (totalItem) totalItem.innerText = daftarBooking.length;
//     if (totalDisetujui) {
//         const jmlSetuju = daftarBooking.filter(item => item.status === "Disetujui").length;
//         totalDisetujui.innerText = jmlSetuju;
//     }
// };

// // Jalankan render saat halaman riwayat dibuka
// if (window.location.pathname.includes('riwayat.html')) {
//     renderTable();
// }




// // =======================BENER======================
// // 1. Inisialisasi Data
// let daftarBooking = JSON.parse(localStorage.getItem('dataBooking')) || [];
// let editIndex = -1;

// const saveData = () => {
//     localStorage.setItem('dataBooking', JSON.stringify(daftarBooking));
// };

// // 2. Handler Form Submit (Halaman index.html)
// const bookingForm = document.getElementById('bookingForm');
// if (bookingForm) {
//     bookingForm.addEventListener('submit', (e) => {
//         e.preventDefault();

//         // PENTING: Cara ambil nilai dari radio button (Kategori Kegiatan)
//         const kategoriRadio = document.querySelector('input[name="kat"]:checked');
//         const kategoriNilai = kategoriRadio ? kategoriRadio.value : "";

//         // Mengambil semua field sesuai form baru kamu
//         const dataBaru = {
//             id: document.getElementById('bookingCode').value,
//             gedung: document.getElementById('namaGedung').value,
//             organisasi: document.getElementById('organisasi').value,
//             tglPengajuan: document.getElementById('tglPengajuan').value,
//             kategori: kategoriNilai, // Dari radio button
//             tglMulai: document.getElementById('tglMulai').value,
//             tglSelesai: document.getElementById('tglSelesai').value,
//             keterangan: document.getElementById('keterangan').value,
//             status: "Menunggu"
//         };

//         // Validasi Custom (Poin 1 Tugas)
//         if (dataBaru.organisasi.length < 5) {
//             alert("Nama organisasi minimal 5 karakter!");
//             return;
//         }

//         if (editIndex === -1) {
//             // Mode Tambah
//             daftarBooking.push(dataBaru);
//             alert("Pengajuan Berhasil Dikirim!");
//         } else {
//             // Mode Edit (Poin 3 Tugas)
//             daftarBooking[editIndex] = dataBaru;
//             editIndex = -1; // Reset mode ke tambah
//             document.getElementById('submitBtn').innerText = "Ajukan Peminjaman Sekarang";
//             document.getElementById('formTitle').innerText = "Formulir Pengajuan Peminjaman";
//             alert("Perubahan Berhasil Disimpan!");
//         }

//         saveData();
//         bookingForm.reset();
//         window.location.href = "riwayat.html"; // Otomatis ke halaman tabel
//     });
// }

// // 3. Fungsi Render Tabel (Halaman riwayat.html)
// const renderTable = () => {
//     const tableBody = document.querySelector('.zebra-table tbody');
//     if (!tableBody) return;

//     tableBody.innerHTML = daftarBooking.map((item, index) => `
//         <tr>
//             <td>${index + 1}</td>
//             <td><b>${item.id}</b></td>
//             <td>${item.gedung}</td>
//             <td>${item.organisasi}</td>
//             <td>${item.tglMulai}</td>
//             <td><span class="status orange">${item.status}</span></td>
//             <td>
//                 <button onclick="prepareEdit(${index})" style="background:#FBC02D; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Edit</button>
//                 <button onclick="deleteBooking(${index})" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Hapus</button>
//             </td>
//         </tr>
//     `).join('');
// };

// // 4. Fungsi Menyiapkan Edit (Poin 3 Tugas)
// window.prepareEdit = (index) => {
//     // Simpan index yang mau diedit ke localStorage agar bisa dibaca di index.html
//     localStorage.setItem('editModeIndex', index);
//     window.location.href = "index.html#formulir";
// };

// // 5. Fungsi Mengisi Form Saat Halaman Index Dimuat
// window.onload = () => {
//     const tempIndex = localStorage.getItem('editModeIndex');
    
//     // Jika ada data yang mau diedit dan kita sedang di halaman index.html
//     if (tempIndex !== null && document.getElementById('bookingForm')) {
//         const idx = parseInt(tempIndex);
//         const data = daftarBooking[idx];
        
//         // Isi kembali input text, select, date, datetime-local, dan textarea
//         document.getElementById('bookingCode').value = data.id;
//         document.getElementById('namaGedung').value = data.gedung;
//         document.getElementById('organisasi').value = data.organisasi;
//         document.getElementById('tglPengajuan').value = data.tglPengajuan;
//         document.getElementById('tglMulai').value = data.tglMulai;
//         document.getElementById('tglSelesai').value = data.tglSelesai;
//         document.getElementById('keterangan').value = data.keterangan;
        
//         // Pilih kembali radio button yang sesuai
//         const radios = document.getElementsByName('kat');
//         radios.forEach(r => {
//             if (r.value === data.kategori) r.checked = true;
//         });

//         // Ubah UI Form ke mode Edit
//         editIndex = idx;
//         document.getElementById('submitBtn').innerText = "Simpan Perubahan Data";
//         document.getElementById('formTitle').innerText = "Mode Edit: " + data.id;
        
//         // Bersihkan tanda edit agar tidak nyangkut saat refresh
//         localStorage.removeItem('editModeIndex');
//     }
// };

// // 6. Fungsi Hapus (Poin 4 Tugas)
// window.deleteBooking = (index) => {
//     if (confirm("Apakah Anda yakin ingin menghapus data ini secara permanen?")) {
//         daftarBooking.splice(index, 1);
//         saveData();
//         renderTable(); // Re-render tabel setelah hapus
//     }
// };

// // Jalankan render table jika berada di halaman riwayat
// if (document.querySelector('.zebra-table')) {
//     renderTable();
// }





// /**
//  * SISTEM MANAJEMEN PEMINJAMAN GEDUNG (SIPEGEDUNG)
//  * Tugas P1 - Praktik Individu
//  */

// // 1. Inisialisasi Data dari LocalStorage (Poin 8)
// let daftarBooking = JSON.parse(localStorage.getItem('dataBooking')) || [];
// let editIndex = -1; // -1 = Tambah Baru, >=0 = Mode Edit

// // 2. Fungsi Simpan ke LocalStorage
// const saveData = () => {
//     localStorage.setItem('dataBooking', JSON.stringify(daftarBooking));
// };

// // 3. Logika Form (Tambah & Edit) - (Poin 1 & 3)
// const bookingForm = document.getElementById('bookingForm');
// if (bookingForm) {
//     bookingForm.addEventListener('submit', (e) => {
//         e.preventDefault();

//         // Mengambil nilai Radio Button (Kategori Kegiatan)
//         const kategoriRadio = document.querySelector('input[name="kat"]:checked');
//         const kategoriNilai = kategoriRadio ? kategoriRadio.value : "";

//         // Kumpulkan data dalam objek (DOM Manipulation)
//         const dataInput = {
//             id: document.getElementById('bookingCode').value,
//             gedung: document.getElementById('namaGedung').value,
//             organisasi: document.getElementById('organisasi').value,
//             tglPengajuan: document.getElementById('tglPengajuan').value,
//             kategori: kategoriNilai,
//             tglMulai: document.getElementById('tglMulai').value,
//             tglSelesai: document.getElementById('tglSelesai').value,
//             keterangan: document.getElementById('keterangan').value,
//             status: "Menunggu"
//         };

//         // --- VALIDASI CUSTOM (Poin 1) ---
//         if (!dataInput.gedung || !dataInput.tglMulai || !dataInput.tglSelesai) {
//             alert("Harap pilih gedung dan tentukan waktu penggunaan!");
//             return;
//         }
//         if (dataInput.organisasi.length < 5) {
//             alert("Nama organisasi/penyelenggara minimal 5 karakter!");
//             return;
//         }

//         // --- PROSES SIMPAN ATAU UPDATE (Poin 3) ---
//         if (editIndex === -1) {
//             // Mode Tambah Baru
//             daftarBooking.push(dataInput);
//             alert("Pengajuan Berhasil Dikirim!");
//         } else {
//             // Mode Edit (Update Array)
//             daftarBooking[editIndex] = dataInput;
//             editIndex = -1; // Kembalikan ke mode tambah
//             document.getElementById('submitBtn').innerText = "Ajukan Peminjaman Sekarang";
//             document.getElementById('formTitle').innerText = "Formulir Pengajuan Peminjaman";
//             alert("Data Pengajuan Berhasil Diperbarui!");
//         }

//         saveData();
//         bookingForm.reset();
//         window.location.href = "riwayat.html"; // Pindah ke halaman riwayat
//     });
// }

// // 4. Render Tabel di Halaman Riwayat (Poin 2)
// const renderTable = (dataToRender = daftarBooking) => {
//     const tableBody = document.querySelector('.zebra-table tbody');
//     if (!tableBody) return;

//     if (dataToRender.length === 0) {
//         tableBody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Belum ada data pengajuan.</td></tr>';
//     } else {
//         // Menggunakan Array Map untuk render (Array Methods)
//         tableBody.innerHTML = dataToRender.map((item, index) => `
//             <tr>
//                 <td>${index + 1}</td>
//                 <td><b>${item.id}</b></td>
//                 <td>${item.gedung}</td>
//                 <td>${item.organisasi}</td>
//                 <td>${item.tglMulai.replace('T', ' ')}</td>
//                 <td><span class="status orange">${item.status}</span></td>
//                 <td>
//                     <button onclick="prepareEdit(${index})" style="background:#FBC02D; border:none; padding:5px 10px; border-radius:4px; cursor:pointer; font-weight:bold;">Edit</button>
//                     <button onclick="deleteBooking(${index})" style="background:#ef4444; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer; font-weight:bold;">Hapus</button>
//                 </td>
//             </tr>
//         `).join('');
//     }
//     updateStats();
// };

// // 5. Fitur Edit - Menyiapkan Data ke Form (Poin 3)
// window.prepareEdit = (index) => {
//     // Simpan index ke localStorage agar bisa dibaca saat pindah halaman ke index.html
//     localStorage.setItem('editModeIndex', index);
//     window.location.href = "index.html#formulir";
// };

// // Fungsi Otomatis saat Halaman Dimuat
// window.onload = () => {
//     const tempIndex = localStorage.getItem('editModeIndex');
    
//     // Jika ada data yang akan diedit (datang dari klik tombol edit di riwayat)
//     if (tempIndex !== null && document.getElementById('bookingForm')) {
//         const idx = parseInt(tempIndex);
//         const data = daftarBooking[idx];
        
//         // Isi kembali field input
//         document.getElementById('bookingCode').value = data.id;
//         document.getElementById('namaGedung').value = data.gedung;
//         document.getElementById('organisasi').value = data.organisasi;
//         document.getElementById('tglPengajuan').value = data.tglPengajuan;
//         document.getElementById('tglMulai').value = data.tglMulai;
//         document.getElementById('tglSelesai').value = data.tglSelesai;
//         document.getElementById('keterangan').value = data.keterangan;
        
//         // Set Radio Button
//         const radios = document.getElementsByName('kat');
//         radios.forEach(r => {
//             if (r.value === data.kategori) r.checked = true;
//         });

//         // Ubah UI Form
//         editIndex = idx;
//         document.getElementById('submitBtn').innerText = "Simpan Perubahan Data";
//         document.getElementById('formTitle').innerText = "Mode Edit: " + data.id;
        
//         // Hapus penanda edit setelah form terisi
//         localStorage.removeItem('editModeIndex');
//     }
    
//     // Jika di halaman riwayat, tampilkan tabel
//     if (document.querySelector('.zebra-table')) {
//         renderTable();
//     }
// };

// // 6. Fitur Hapus (Poin 4)
// window.deleteBooking = (index) => {
//     if (confirm("Apakah Anda yakin ingin menghapus pengajuan ini?")) {
//         daftarBooking.splice(index, 1); // Hapus dari array
//         saveData(); // Simpan perubahan
//         renderTable(); // Gambar ulang tabel
//     }
// };

// // 7. Statistik (Poin 7)
// const updateStats = () => {
//     const totalLabel = document.getElementById('statTotal');
//     const setujuLabel = document.getElementById('statSetuju');
    
//     if (totalLabel) totalLabel.innerText = daftarBooking.length;
//     if (setujuLabel) {
//         const jmlSetuju = daftarBooking.filter(item => item.status === "Disetujui").length;
//         setujuLabel.innerText = jmlSetuju;
//     }
// };

// // Tambahkan ini di bawah fungsi renderTable atau di bagian akhir script

// // (5) Fitur Pencarian Real-time
// const searchInput = document.getElementById('searchBooking'); // Pastikan ID ini ada di riwayat.html
// if (searchInput) {
//     searchInput.addEventListener('input', (e) => {
//         const keyword = e.target.value.toLowerCase();
//         const filteredData = daftarBooking.filter(item => 
//             item.id.toLowerCase().includes(keyword) || 
//             item.organisasi.toLowerCase().includes(keyword)
//         );
//         renderTable(filteredData); // Render ulang tabel dengan data yang difilter
//     });
// }

// // (6) Fitur Filter Berdasarkan Kategori
// const categoryFilter = document.getElementById('filterGedung'); // Pastikan ID ini ada di riwayat.html
// if (categoryFilter) {
//     categoryFilter.addEventListener('change', (e) => {
//         const selectedCategory = e.target.value;
//         if (selectedCategory === "Semua") {
//             renderTable(daftarBooking);
//         } else {
//             const filteredData = daftarBooking.filter(item => item.gedung === selectedCategory);
//             renderTable(filteredData);
//         }
//     });
// }





let daftarBooking = JSON.parse(localStorage.getItem('dataBooking')) || [];
let editIndex = -1;

const saveData = () => {
    localStorage.setItem('dataBooking', JSON.stringify(daftarBooking));
};

// Logika Form (Tambah & Edit)
const bookingForm = document.getElementById('bookingForm');
if (bookingForm) {
    bookingForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const kategoriRadio = document.querySelector('input[name="kat"]:checked');
        
        const dataInput = {
            id: document.getElementById('bookingCode').value,
            gedung: document.getElementById('namaGedung').value,
            organisasi: document.getElementById('organisasi').value,
            tglPengajuan: document.getElementById('tglPengajuan').value,
            kategori: kategoriRadio ? kategoriRadio.value : "",
            tglMulai: document.getElementById('tglMulai').value,
            tglSelesai: document.getElementById('tglSelesai').value,
            keterangan: document.getElementById('keterangan').value,
            status: "Menunggu"
        };

        // (Poin 1) Validasi Custom
        if (dataInput.organisasi.length < 5) {
            alert("Nama organisasi minimal 5 karakter!");
            return;
        }

        // (Poin 3) Simpan atau Update
        if (editIndex === -1) {
            daftarBooking.push(dataInput);
            alert("Data Berhasil Disimpan!");
        } else {
            daftarBooking[editIndex] = dataInput;
            editIndex = -1;
            alert("Data Berhasil Diperbarui!");
        }

        saveData();
        window.location.href = "riwayat.html";
    });
}

// (Poin 2) Render Tabel
const renderTable = (dataToRender = daftarBooking) => {
    const tableBody = document.querySelector('.zebra-table tbody');
    if (!tableBody) return;

    tableBody.innerHTML = dataToRender.map((item, index) => `
        <tr>
            <td>${index + 1}</td>
            <td><b>${item.id}</b></td>
            <td>${item.gedung}</td>
            <td>${item.organisasi}</td>
            <td>${item.tglMulai.replace('T', ' ')}</td>
            <td><span class="status orange">${item.status}</span></td>
            <td>
                <button onclick="prepareEdit(${index})" style="background:#FBC02D; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Edit</button>
                <button onclick="deleteBooking(${index})" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Hapus</button>
            </td>
        </tr>
    `).join('');
    updateStats();
};

// (Poin 5) Pencarian Real-time
const searchInput = document.getElementById('searchBooking');
if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        const keyword = e.target.value.toLowerCase();
        const filtered = daftarBooking.filter(item => 
            item.id.toLowerCase().includes(keyword) || 
            item.organisasi.toLowerCase().includes(keyword)
        );
        renderTable(filtered);
    });
}

// (Poin 6) Filter Kategori
const categoryFilter = document.getElementById('filterGedung');
if (categoryFilter) {
    categoryFilter.addEventListener('change', (e) => {
        const selected = e.target.value;
        const filtered = selected === "Semua" ? daftarBooking : daftarBooking.filter(item => item.gedung === selected);
        renderTable(filtered);
    });
}

// (Poin 3) Fungsi Edit
window.prepareEdit = (index) => {
    localStorage.setItem('editModeIndex', index);
    window.location.href = "index.html#formulir";
};

// (Poin 4) Fungsi Hapus
window.deleteBooking = (index) => {
    if (confirm("Hapus data ini?")) {
        daftarBooking.splice(index, 1);
        saveData();
        renderTable();
    }
};

// (Poin 7) Statistik
const updateStats = () => {
    const totalLabel = document.getElementById('statTotal');
    const setujuLabel = document.getElementById('statSetuju');
    if (totalLabel) totalLabel.innerText = daftarBooking.length;
    if (setujuLabel) setujuLabel.innerText = daftarBooking.filter(i => i.status === "Disetujui").length;
};

// Load data saat halaman dibuka
window.onload = () => {
    const tempIndex = localStorage.getItem('editModeIndex');
    if (tempIndex !== null && document.getElementById('bookingForm')) {
        const data = daftarBooking[parseInt(tempIndex)];
        // ... kode untuk mengisi form (seperti yang saya berikan sebelumnya) ...
        editIndex = parseInt(tempIndex);
        localStorage.removeItem('editModeIndex');
    }
    if (document.querySelector('.zebra-table')) renderTable();
};