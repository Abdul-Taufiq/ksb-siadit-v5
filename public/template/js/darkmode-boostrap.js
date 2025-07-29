document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    const html = document.documentElement; // Mengakses elemen <html>
    const themeSwitcher = document.querySelector(
        ".theme-switcher.gray-circle-btn"
    );

    // Fungsi untuk memperbarui atribut data-bs-theme pada <html>
    function updateTheme() {
        if (body.classList.contains("darkmode")) {
            html.setAttribute("data-bs-theme", "dark");
            localStorage.setItem("theme", "dark"); // Simpan preferensi tema di LocalStorage
        } else {
            html.removeAttribute("data-bs-theme");
            localStorage.setItem("theme", "light"); // Simpan preferensi tema di LocalStorage
        }
    }

    // Mengecek LocalStorage untuk tema yang tersimpan
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        body.classList.add("darkmode");
    } else {
        body.classList.remove("darkmode");
    }

    // Panggil fungsi untuk memperbarui atribut berdasarkan tema yang tersimpan
    updateTheme();

    // Tambahkan event listener ke tombol theme-switcher
    if (themeSwitcher) {
        themeSwitcher.addEventListener("click", function () {
            body.classList.toggle("darkmode"); // Toggle class darkmode pada body
            updateTheme(); // Perbarui atribut <html> dan simpan di LocalStorage
        });
    }
});
