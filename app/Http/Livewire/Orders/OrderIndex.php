<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;

class OrderIndex extends Component
{
    public function render()
    {
        return view('livewire.orders.order-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
