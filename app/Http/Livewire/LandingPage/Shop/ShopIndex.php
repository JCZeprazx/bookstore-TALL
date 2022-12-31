<?php

namespace App\Http\Livewire\LandingPage\Shop;

use Livewire\Component;

class ShopIndex extends Component
{
    public function render()
    {
        return view('livewire.landing-page.shop.shop-index')
            ->extends('layouts.guest')
            ->section('content')
            ->section('footer');
    }
}
