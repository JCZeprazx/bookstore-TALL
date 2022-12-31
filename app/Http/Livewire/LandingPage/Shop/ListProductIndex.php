<?php

namespace App\Http\Livewire\LandingPage\Shop;

use App\Models\Book;
use Livewire\Component;

class ListProductIndex extends Component
{
    public function render()
    {
        return view('livewire.landing-page.shop.list-product-index', [
            'books' => Book::all()
        ]);
    }
}
