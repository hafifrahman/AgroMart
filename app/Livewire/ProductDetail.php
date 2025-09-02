<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductDetail extends Component
{
    #[Title('Detail Produk')]

    public $product;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
