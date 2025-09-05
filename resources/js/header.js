document.addEventListener('livewire:navigated', function () {
    const navbar = document.getElementById('main-nav');

    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 0) {
                navbar?.classList.remove('dark:shadow-green-800/20');
                navbar?.classList.add('dark:shadow-gray-900/50');
            } else {
                navbar?.classList.remove('dark:shadow-gray-900/50');
                navbar?.classList.add('dark:shadow-green-800/20');
            }
        });
    }
});
