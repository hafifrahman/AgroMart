<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.admin.app')]
    #[Title('Dashboard')]

    public function render()
    {
        $customerCount = User::where('role', 'customer')->count();

        return view('livewire.admin.dashboard', [
            'customerCount' => $customerCount,
        ]);
    }
}
