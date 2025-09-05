document.addEventListener('livewire:navigated', function () {
    // Fungsi untuk menyinkronkan semua ikon berdasarkan tema saat ini
    const syncIcons = (theme) => {
        const allDarkIcons = document.querySelectorAll('.theme-toggle-dark-icon');
        const allLightIcons = document.querySelectorAll('.theme-toggle-light-icon');
        const themeTooltips = document.querySelectorAll('.theme-tooltip');

        if (theme === 'dark') {
            allLightIcons.forEach((icon) => icon.classList.remove('hidden'));
            allDarkIcons.forEach((icon) => icon.classList.add('hidden'));
            themeTooltips.forEach((tooltip) => (tooltip.innerText = 'Light Mode'));
        } else {
            allDarkIcons.forEach((icon) => icon.classList.remove('hidden'));
            allLightIcons.forEach((icon) => icon.classList.add('hidden'));
            themeTooltips.forEach((tooltip) => (tooltip.innerText = 'Dark Mode'));
        }
    };

    // Fungsi untuk mengatur tema awal saat halaman dimuat
    const setInitialTheme = () => {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('color-theme');

        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            document.documentElement.classList.add('dark');
            syncIcons('dark');
        } else {
            document.documentElement.classList.remove('dark');
            syncIcons('light');
        }
    };

    // Panggil fungsi untuk mengatur tema awal
    setInitialTheme();

    // Dapatkan SEMUA tombol dengan class .theme-toggle
    const themeToggleBtns = document.querySelectorAll('.theme-toggle');

    // Tambahkan event listener ke SETIAP tombol
    themeToggleBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            // Cek apakah mode gelap sedang aktif
            const isDark = document.documentElement.classList.toggle('dark');

            // Simpan preferensi tema ke localStorage
            if (isDark) {
                localStorage.setItem('color-theme', 'dark');
                syncIcons('dark');
            } else {
                localStorage.setItem('color-theme', 'light');
                syncIcons('light');
            }
        });
    });
});
