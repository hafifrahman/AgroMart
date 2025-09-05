document.addEventListener('livewire:navigated', function () {
    // --- Image Gallery Logic ---
    const mainImage = document.getElementById('main-product-image');
    const thumbnailButtons = document.querySelectorAll('.thumbnail-button');

    thumbnailButtons.forEach((button) => {
        button.addEventListener('click', () => {
            // Change main image src
            mainImage.src = button.querySelector('img').src.replace('150x150', '600x600');

            // Update active state for thumbnails
            thumbnailButtons.forEach((btn) => {
                btn.classList.remove('border-green-500', 'ring-2', 'ring-green-500/50');
                btn.classList.add('border-gray-300', 'dark:border-gray-700');
            });
            button.classList.add('border-green-500', 'ring-2', 'ring-green-500/50');
        });
    });
});
