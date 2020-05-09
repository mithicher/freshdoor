<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Order;

class History extends Component
{
    protected $updatesQueryString = ['search', 'status'];

    public $search;
    public $status;

    public function mount()
    {
        $this->search = request('search', '');
        $this->status = request('status', 'all');
    }

    public function render()
    {
        return view('livewire.orders.history', [
            'orders' => Order::ofUser()
                ->orderStatus($this->status)
                ->whereLike(['orderno'], $this->search)
                ->latest()
                ->get()
        ]);
    }
}
