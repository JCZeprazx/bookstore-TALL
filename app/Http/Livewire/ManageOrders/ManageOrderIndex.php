<?php

namespace App\Http\Livewire\ManageOrders;

use Livewire\Component;

class ManageOrderIndex extends Component
{
    public function render()
    {
        return view('livewire.manage-orders.manage-order-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
