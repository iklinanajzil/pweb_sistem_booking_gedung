let daftarBooking = JSON.parse(localStorage.getItem('dataBooking')) || [];
let editIndex = -1;

const generateBookingCode = () => {
    const nextNumber = daftarBooking.length + 1;
    const formattedNumber = String(nextNumber).padStart(3, '0');
    return `UNJ-2026-${formattedNumber}`;
};

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
            status: "Menunggu",
            // isAC: document.getElementById('namaGedung').value.includes("Auditorium") || document.getElementById('namaGedung').value.includes("Lab Terpadu") || document.getElementById('namaGedung').value.includes("Gedung Soetardjo") || document.getElementById('namaGedung').value.includes("Mas Soerachman") || document.getElementById('namaGedung').value.includes("Aula Fasilkom") || document.getElementById('namaGedung').value.includes("CDAST Utara lantai 4") || document.getElementById('namaGedung').value.includes("Aula FEB") || document.getElementById('namaGedung').value.includes("Aula FKM") || document.getElementById('namaGedung').value.includes("CDAST selatan lantai 8") || document.getElementById('namaGedung').value.includes("Gedung Kewirausahaan") || document.getElementById('namaGedung').value.includes("Aula Lantai 3") || document.getElementById('namaGedung').value.includes("Student Center"),
            // isOutdoor: document.getElementById('namaGedung').value.includes("Double Way") || document.getElementById('namaGedung').value.includes("PKM") || document.getElementById('namaGedung').value.includes("Aula KAUJE")
        };
        if (dataInput.organisasi.length < 5) {
            alert("Nama organisasi minimal 5 karakter!");
            return;
        }

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

const renderRecentBookings = () => {
    const tableBody = document.getElementById('bodyRiwayatBeranda');
    if (!tableBody) return;
    const dataTerbaru = daftarBooking.slice(-3).reverse();

    if (dataTerbaru.length === 0) {
        tableBody.innerHTML = "<tr><td colspan='5' style='text-align:center;'>Belum ada riwayat.</td></tr>";
        return;
    }

    tableBody.innerHTML = dataTerbaru.map((item, index) => `
        <tr>
            <td>${index + 1}</td>
            <td><b>${item.id}</b></td>
            <td>${item.gedung}</td>
            <td>${item.organisasi}</td>
            <td><span class="status orange">${item.status}</span></td>
        </tr>
    `).join('');
};


const renderTable = (dataToRender = daftarBooking) => {
    // Ubah baris ini agar menggunakan ID yang baru kita buat
    const tableBody = document.getElementById('bodyRiwayatPenuh');

    if (!tableBody) return;

    tableBody.innerHTML = dataToRender.map((item, index) => `
        <tr>
            <td>${index + 1}</td>
            <td><b>${item.id}</b></td>
            <td>${item.gedung}</td>
            <td>${item.organisasi}</td>
            <td>${item.tglMulai ? item.tglMulai.replace('T', ' ') : '-'}</td>
            <td><span class="status orange">${item.status}</span></td>
            <td>
                <a href="status.html?id=${item.id}" style="color: #1A374D; font-weight: bold; text-decoration: none;">
                    🔍 Cek Progres
                </a>
            </td>
            <td>
                <button onclick="prepareEdit(${index})" style="background:#FBC02D; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Edit</button>
                <button onclick="deleteBooking(${index})" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Hapus</button>
            </td>
        </tr>
    `).join('');
    updateStats();
};


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

const categoryFilter = document.getElementById('filterGedung');
if (categoryFilter) {
    categoryFilter.addEventListener('change', (e) => {
        const selected = e.target.value;
        const filtered = selected === "Semua" ? daftarBooking : daftarBooking.filter(item => item.gedung === selected);
        renderTable(filtered);
    });
}

window.prepareEdit = (index) => {
    localStorage.setItem('editModeIndex', index);
    window.location.href = "index.html#formulir";
};

window.deleteBooking = (index) => {
    if (confirm("Hapus data ini?")) {
        daftarBooking.splice(index, 1);
        saveData();
        renderTable();
    }
};

const updateStats = () => {
    const totalLabel = document.getElementById('statTotal');
    const setujuLabel = document.getElementById('statSetuju');
    const pendingLabel = document.getElementById('statPending');

    if (totalLabel) totalLabel.innerText = daftarBooking.length;

    if (setujuLabel) {
        const jmlSetuju = daftarBooking.filter(item => item.status === "Disetujui").length;
        setujuLabel.innerText = jmlSetuju;
    }
    if (pendingLabel) {
        const jmlPending = daftarBooking.filter(item => item.status === "Menunggu").length;
        pendingLabel.innerText = jmlPending;
    }
};


window.addEventListener('load', () => {
    const bookingCodeInput = document.getElementById('bookingCode');
    const tempIndex = localStorage.getItem('editModeIndex');
    if (bookingCodeInput) {
        if (tempIndex !== null) {
            const data = daftarBooking[parseInt(tempIndex)];
            bookingCodeInput.value = data.id;
            document.getElementById('namaGedung').value = data.gedung;
            document.getElementById('organisasi').value = data.organisasi;
            document.getElementById('tglMulai').value = data.tglMulai;

            editIndex = parseInt(tempIndex);
            localStorage.removeItem('editModeIndex');
        } else {
            bookingCodeInput.value = generateBookingCode();
            bookingCodeInput.readOnly = true;
        }
    }

    if (document.getElementById('bodyRiwayatBeranda')) {
        renderRecentBookings();
    }

    if (window.location.pathname.includes('riwayat.html')) {
        renderTable();
    }

    updateStats();
});

const inputCari = document.getElementById('searchGedung');
const tombolCari = document.getElementById('btnSearch');

const laksanakanPencarian = () => {
    const keyword = inputCari.value.trim();
    if (keyword !== "") {
        window.location.href = `gedung.html?search=${encodeURIComponent(keyword)}`;
    }
};

if (tombolCari) {
    tombolCari.addEventListener('click', laksanakanPencarian);
}

if (inputCari) {
    inputCari.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') laksanakanPencarian();
    });
}

window.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('gedung.html')) {
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');

        if (searchQuery) {
            const keyword = searchQuery.toLowerCase();
            const listGedung = document.querySelectorAll('.info-card');
            if (inputCari) inputCari.value = searchQuery;

            listGedung.forEach(card => {
                const namaGedung = card.querySelector('h4').innerText.toLowerCase();
                if (namaGedung.includes(keyword)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    }
});

if (inputCari && window.location.pathname.includes('gedung.html')) {
    inputCari.addEventListener('input', function() {
        const keyword = this.value.toLowerCase();
        const listGedung = document.querySelectorAll('.info-card');

        listGedung.forEach(card => {
            const namaGedung = card.querySelector('h4').innerText.toLowerCase();
            card.style.display = namaGedung.includes(keyword) ? "block" : "none";
        });
    });
}



// --- LOGIKA CHECKBOX FILTER ---

// 1. Fungsi untuk menangani Redirect dari index ke gedung
const setupCheckboxRedirect = () => {
    const redirectChecks = document.querySelectorAll('.filter-redirect');

    redirectChecks.forEach(check => {
        check.addEventListener('change', function() {
            if (this.checked) {
                const filterValue = this.value; // 'ac' atau 'outdoor'
                // Pindah ke halaman gedung dengan membawa parameter filter di URL
                window.location.href = `gedung.html?filter=${filterValue}`;
            }
        });
    });
};

// 2. Fungsi untuk menyaring tampilan di halaman gedung.html
const applyUrlFilter = () => {
    if (window.location.pathname.includes('gedung.html')) {
        const urlParams = new URLSearchParams(window.location.search);
        const filterParam = urlParams.get('filter');

        if (filterParam) {
            const cards = document.querySelectorAll('.info-card');

            cards.forEach(card => {
                const fiturGedung = card.getAttribute('data-fitur');

                // Jika fitur gedung sama dengan parameter di URL, tampilkan. Jika tidak, sembunyikan.
                if (fiturGedung === filterParam) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    }
};

window.addEventListener('DOMContentLoaded', () => {
    // Jalankan fungsi redirect jika sedang di index
    setupCheckboxRedirect();

    // Jalankan fungsi filter jika baru sampai di gedung.html
    applyUrlFilter();
});










// ----------------------------------------------------------------------------------------

const laksanakanPencarian = () => {
    const keyword = document.getElementById('searchInput').value;
    const filter = document.getElementById('filterDropdown').value; // Mengambil nilai ac/outdoor

    // Redirect ke halaman gedung dengan membawa dua parameter
    window.location.href = `gedung?search=${keyword}&filter=${filter}`;
};
