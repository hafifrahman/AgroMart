<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product as ModelsProduct;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    #[Title('Produk')]

    public $search = '';
    public $category_filter = 'Semua';

    public function filterCategory($category)
    {
        $this->category_filter = $category;
    }

    public function addToCart($productId)
    {
        if (!Auth::check()) {
            $this->dispatch('error', type: 'warning', message: 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.');
            return;
        }

        ShoppingCart::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        $query = ModelsProduct::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category_filter != 'Semua') {
            $query->whereHas('category', function ($q) {
                $q->where('name', $this->category_filter);
            });
        }

        return view('livewire.product', [
            'products' => $query->with('category')->paginate(8),
            'categories' => Category::all(),
        ]);
    }
}
