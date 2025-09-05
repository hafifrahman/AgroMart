<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Checkout extends Component
{
    #[Title('Checkout')]

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|string')]
    public string $address;

    #[Validate('required|string|max:15')]
    public string $phone;

    #[Validate('required|in:cod,transfer')]
    public string $paymentMethod = 'cod';

    public $checkoutItems;
    public $subtotal = 0;
    public $shippingCost = 15000; // Contoh ongkir tetap
    public $tax = 5000; // Contoh pajak tetap
    public $totalPrice = 0;
    protected $selectedItemIds = [];

    public function mount()
    {
        // Ambil ID item dari session
        $this->selectedItemIds = session('selected_cart_items', []);

        // Jika tidak ada item, kembalikan ke keranjang
        if (empty($this->selectedItemIds)) {
            return $this->redirectRoute('cart', navigate: true);
        }

        // Ambil data item dari database
        $this->checkoutItems = ShoppingCart::with('product')
            ->whereIn('id', $this->selectedItemIds)
            ->where('user_id', Auth::id())
            ->get();

        // Jika karena suatu hal item tidak ditemukan, kembali ke keranjang
        if ($this->checkoutItems->isEmpty()) {
            session()->forget('selected_cart_items');
            return $this->redirectRoute('cart', navigate: true);
        }

        // Hitung total harga
        $this->calculateTotals();

        // Isi data pengguna
        $this->name = Auth::user()->name ?? '';
        $this->address = Auth::user()->address ?? '';
        $this->phone = Auth::user()->phone ?? '';
    }

    public function cancelOrder()
    {
        session()->forget('selected_cart_items');
        return $this->redirectRoute('home', navigate: true);
    }

    public function calculateTotals()
    {
        $this->subtotal = 0;
        foreach ($this->checkoutItems as $item) {
            $this->subtotal += $item->product->price * $item->quantity;
        }
        $this->totalPrice = $this->subtotal + $this->shippingCost + $this->tax;
    }

    public function placeOrder()
    {
        $this->validate();

        $selectedItemIds = session('selected_cart_items', []);

        if (empty($selectedItemIds)) {
            return $this->redirectRoute('cart', navigate: true);
        }

        DB::transaction(function () use ($selectedItemIds) {
            // 1. Buat pesanan (order)
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_code' => 'ORD-' . strtoupper(uniqid()),
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'subtotal' => $this->subtotal,
                'shipping_cost' => $this->shippingCost,
                'tax' => $this->tax,
                'total_price' => $this->totalPrice,
                'payment_method' => $this->paymentMethod,
                'status' => 'pending',
            ]);

            // 2. Buat item pesanan (order items)
            foreach ($this->checkoutItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price, // Simpan harga saat ini
                ]);
            }

            // 3. Hapus item dari keranjang belanja
            ShoppingCart::whereIn('id', $selectedItemIds)->delete();

            // 4. Hapus session
            session()->forget('selected_cart_items');
        });

        // 5. Kirim event untuk update cart count di navbar (opsional)
        $this->dispatch('cartUpdated');

        // 6. Redirect ke halaman sukses atau histori pesanan
        // Di sini kita asumsikan ada halaman /my-orders
        return $this->redirect('/my-orders', navigate: true);
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
