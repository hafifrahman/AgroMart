<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductDetail extends Component
{
    #[Title('Detail Produk')]

    public $product;

    public $quantity = 1;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
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
            'quantity' => $this->quantity,
        ]);

        $this->dispatch('cartUpdated');
    }

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
