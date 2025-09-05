<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Dashboard')]

    public $orders;
    public $orderCount = 0;
    public $customers;

    public function mount()
    {
        $this->orders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $this->orderCount = Order::where('status', 'pending')
            ->orWhere('status', 'processing')
            ->orWhere('status', 'shipped')
            ->count();

        $this->customers = User::where('role', 'customer')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
