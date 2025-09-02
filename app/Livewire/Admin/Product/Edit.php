<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public int $id = 0;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|image|max:1024')]
    public $image = '';

    #[Validate('required|exists:categories,id')]
    public int $category_id = 0;

    #[Validate('required|numeric|min:0')]
    public float $price = 0;

    #[Validate('required|integer|min:1')]
    public int $stock = 1;

    public function mount(Product $product)
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->price = $product->price;
        $this->stock = $product->stock;
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.product.edit', [
            'categories' => $categories,
        ]);
    }
}
