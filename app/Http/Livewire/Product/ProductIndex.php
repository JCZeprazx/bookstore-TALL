<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class ProductIndex extends Component
{
    public function render()
    {
        return view('livewire.product.product-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
