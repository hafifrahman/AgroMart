<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cart extends Component
{
    #[Title('Keranjang')]

    public $cartItems;
    public $quantities = [];
    public $selectedItems = []; // Menyimpan ID item yang dipilih
    public $selectAll = false;  // Status pilih semua

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $this->cartItems = ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Inisialisasi quantities dari database
        foreach ($this->cartItems as $item) {
            $this->quantities[$item->id] = $item->quantity;
        }

        // Reset selected items ketika data dimuat ulang
        $this->selectedItems = [];
        $this->selectAll = false;
    }

    public function updatedSelectedItems()
    {
        // Update status selectAll ketika selectedItems berubah
        $this->selectAll = count($this->selectedItems) === count($this->cartItems);
    }

    public function updateQuantity($cartItemId)
    {
        $cartItem = ShoppingCart::find($cartItemId);

        $quantity = $this->quantities[$cartItemId] ?? 1;

        // Validasi minimal quantity
        $quantity = max(1, $quantity);

        $cartItem->update(['quantity' => $quantity]);

        // Reload data
        $this->loadCartItems();

        // Emit event untuk update total harga
        $this->dispatch('cartUpdated');
    }

    public function removeItem($cartItemId)
    {
        ShoppingCart::find($cartItemId)
            ->delete();

        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function clearCart()
    {
        ShoppingCart::where('user_id', Auth::id())
            ->delete();

        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    // Toggle pemilihan item individual
    public function toggleItem($cartItemId)
    {
        if (in_array($cartItemId, $this->selectedItems)) {
            $this->selectedItems = array_diff($this->selectedItems, [$cartItemId]);
        } else {
            $this->selectedItems[] = $cartItemId;
        }

        // Update status selectAll
        $this->selectAll = count($this->selectedItems) === count($this->cartItems);
    }

    // Toggle pilih semua item
    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->cartItems->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function render()
    {
        $totalPrice = 0;
        $selectedCount = count($this->selectedItems);

        if ($this->cartItems) {
            foreach ($this->cartItems as $item) {
                // Hanya hitung item yang dipilih
                if (in_array($item->id, $this->selectedItems)) {
                    $totalPrice += $item->product->price * $item->quantity;
                }
            }
        }

        return view('livewire.cart', [
            'totalPrice' => $totalPrice,
            'selectedCount' => $selectedCount
        ]);
    }
}
