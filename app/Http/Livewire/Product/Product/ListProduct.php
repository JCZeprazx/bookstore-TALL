<?php

namespace App\Http\Livewire\Product\Product;

use App\Models\Book;
use Livewire\Component;

class ListProduct extends Component
{
    public function render()
    {
        return view('livewire.product.product.list-product', [
            'books' => Book::all()
        ]);
    }
}
