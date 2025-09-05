<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    #[Layout('components.layouts.admin.app')]
    #[Title('Produk')]

    // Properti untuk mengontrol modal
    public bool $showAddProductModal = false;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|max:5120|mimes:jpg,jpeg,png,webp')]
    public $image;

    #[Validate('required|exists:categories,id')]
    public int $category_id = 0;

    #[Validate('required|numeric|min:0')]
    public float $price = 0;

    #[Validate('required|integer|min:1')]
    public int $stock = 1;

    #[Validate('nullable|string|max:255')]
    public string $description = '';

    // Method untuk membuka modal
    public function openAddProductModal()
    {
        $this->showAddProductModal = true;
    }

    // Method untuk menutup modal dan mereset form
    public function closeAddProductModal()
    {
        $this->showAddProductModal = false;
        $this->reset();
    }

    public function store()
    {
        $validatedData = $this->validate();

        // PERBAIKAN 2: Tambahkan logika untuk menyimpan file.
        if ($this->image) {
            // Simpan file ke storage/app/public/img/product
            // dan dapatkan nama filenya.
            $imageName = $this->image->store('img/product', 'public');

            // Hapus 'img/product/' dari nama file agar sesuai dengan struktur URL Anda.
            $validatedData['image'] = basename($imageName);
        }

        $validatedData['slug'] = Str::slug($this->name);

        ModelsProduct::create($validatedData);

        $this->reset();
        $this->closeAddProductModal();
        $this->dispatch('productCreated');
    }

    public function deleteProduct($productId)
    {
        ModelsProduct::destroy($productId);

        $this->dispatch('productUpdated');
    }

    public function render()
    {
        $products = ModelsProduct::with('category', 'user')
            ->latest()
            ->paginate(10);

        $categories = Category::all();

        return view('livewire.admin.product.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
