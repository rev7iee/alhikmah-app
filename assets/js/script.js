// File script.js utama untuk interaktivitas website Darul Amtsilati
document.addEventListener("DOMContentLoaded", function () {
    console.log("Website Al Hikmah Berhasil Dimuat!");

    // Kamu bisa menambahkan logika interaktif seperti animasi scroll,
    // validasi form pendaftaran, atau event handling lainnya di sini.
});

// Logika Pengatur Halaman Detail Berita
document.addEventListener("DOMContentLoaded", function () {
    // Jalankan kode hanya jika kita berada di halaman detail-berita.html
    if (window.location.pathname.includes("detail-berita.html")) {
        // 1. Ambil Parameter ID dari URL (?id=X)
        const urlParams = new URLSearchParams(window.location.search);
        let articleId = urlParams.get("id");

        // Default ke ID 1 jika ID tidak ditemukan atau tidak valid di database
        if (!articleId || !articlesDatabase[articleId]) {
            articleId = "1";
        }

        const data = articlesDatabase[articleId];

        // 2. Suntikkan Data ke dalam Elemen HTML DOM
        document.getElementById("detail-category").innerText = data.category;
        document.getElementById("detail-date").innerText = data.date;
        document.getElementById("detail-title").innerText = data.title;
        document.getElementById("detail-main-img").src = data.image;
        document.getElementById("detail-content").innerHTML = data.content;

        // 3. Render Tags Berita
        const tagsContainer = document.getElementById("detail-tags");
        tagsContainer.innerHTML = ""; // Bersihkan
        data.tags.forEach((tag) => {
            const span = document.createElement("span");
            span.className =
                "badge bg-light text-secondary me-2 p-2 fw-normal border";
            span.style.fontSize = "0.8rem";
            span.innerText = tag;
            tagsContainer.appendChild(span);
        });
    }
});

// Logika Tambahan untuk Efek Klik Transisi yang Smooth
document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua tautan yang mengarah ke halaman internal (.html)
    const localLinks = document.querySelectorAll(
        "a[href$='.html'], a[href*='.html?']",
    );

    localLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            // Abaikan jika target link dibuka di tab baru
            if (this.getAttribute("target") === "_blank") return;

            e.preventDefault();
            const targetUrl = this.getAttribute("href");

            // Beri efek bodi mulai memudar sebelum berpindah
            document.body.style.opacity = "0";
            document.body.style.transform = "translateY(-8px)";
            document.body.style.transition = "all 0.2s ease-in-out";

            // Eksekusi perpindahan halaman setelah jeda animasi singkat
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 180);
        });
    });
});
