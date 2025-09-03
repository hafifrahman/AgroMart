<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCount extends Component
{
    public $cartCount;

    #[On('cartUpdated')]
    public function mount()
    {
        if (Auth::check()) {
            $this->cartCount = Auth::user()->shoppingCarts->count();
        }

        if ($this->cartCount > 99) {
            $this->cartCount = '99+';
        }
    }

    public function render()
    {
        return view('livewire.components.cart-count');
    }
}
