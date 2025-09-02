<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Product extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Produk')]

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|image|max:1024')]
    public string $image = '';

    #[Validate('required|exists:categories,id')]
    public int $category_id = 0;

    #[Validate('required|numeric|min:0')]
    public float $price = 0;

    #[Validate('required|integer|min:1')]
    public int $stock = 1;

    public function store()
    {
        $validatedData = $this->validate();

        ModelsProduct::create($validatedData);

        $this->dispatch('productCreated');
    }

    public function deleteProduct($productId)
    {
        ModelsProduct::destroy($productId);

        $this->dispatch('productUpdated');
    }

    public function render()
    {
        $products = ModelsProduct::with('category')->paginate(10);
        $categories = Category::all();

        return view('livewire.admin.product', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
