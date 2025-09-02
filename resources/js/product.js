document.addEventListener('livewire:navigated', () => {
    const addProductModal = document.getElementById('add-product-modal');
    const addProductBtn = document.getElementById('add-product-btn');
    const closeModalBtns = document.querySelectorAll('.close-modal-btn');
    const editProductBtns = document.querySelectorAll('.edit-product-btn');

    const openProductModal = () => {
        addProductModal?.classList.remove('hidden');
        addProductModal?.classList.add('flex');
    };

    const closeProductModal = () => {
        addProductModal?.classList.remove('flex');
        addProductModal?.classList.add('hidden');
    };

    addProductBtn?.addEventListener('click', () => {
        openProductModal();
    });

    closeModalBtns?.forEach((btn) => {
        btn?.addEventListener('click', () => {
            closeProductModal();
        });
    });

    editProductBtns?.forEach((btn) => {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const modal = document.getElementById(`edit-product-modal-${id}`);
            const closeBtns = modal?.querySelectorAll('.close-modal-btn');

            modal?.classList.remove('hidden');
            modal?.classList.add('flex');

            closeBtns?.forEach((btn) => {
                btn?.addEventListener('click', () => {
                    modal?.classList.remove('flex');
                    modal?.classList.add('hidden');
                });
            });
        });
    });
});
