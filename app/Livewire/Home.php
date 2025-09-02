<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Beranda')]

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
        $products = Product::with('category')->get();

        return view('livewire.home', [
            'products' => $products,
        ]);
    }
}
