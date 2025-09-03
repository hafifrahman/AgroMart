document.addEventListener('livewire:navigated', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');
    const overlay = document.getElementById('sidebar-overlay');

    toggleBtn?.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    });

    overlay?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });

    // Mobile menu
    const hamburgerButton = document.getElementById('hamburger-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    // 2. Fungsi untuk membuka dan menutup menu
    const toggleMenu = () => {
        // Mengubah status 'aria-expanded' untuk aksesibilitas
        const isExpanded = hamburgerButton.getAttribute('aria-expanded') === 'true';
        hamburgerButton.setAttribute('aria-expanded', !isExpanded);

        // Menampilkan atau menyembunyikan panel menu dan ikon
        mobileMenu.classList.toggle('hidden');
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    };

    // 3. Menambahkan event listener pada tombol hamburger
    hamburgerButton.addEventListener('click', toggleMenu);

    // 4. (Opsional) Menutup menu saat diklik di luar area menu
    document.addEventListener('click', function (event) {
        // Cek apakah menu sedang terbuka dan klik terjadi di luar menu dan tombolnya
        const isMenuOpen = !mobileMenu.classList.contains('hidden');
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickOnButton = hamburgerButton.contains(event.target);

        if (isMenuOpen && !isClickInsideMenu && !isClickOnButton) {
            toggleMenu(); // Panggil fungsi yang sama untuk menutup
        }
    });
});
