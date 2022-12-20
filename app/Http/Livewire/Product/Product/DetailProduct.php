<?php

namespace App\Http\Livewire\Product\Product;

use App\Models\Book;
use App\Models\Book_Order;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DetailProduct extends Component
{

    public function getBook()
    {
        return Book::where('book_name', '=', $this->getBookName())->get();
    }

    public function getBookName()
    {
        $book = Str::remove('/product/', parse_url(url()->current(), PHP_URL_PATH));
        return Str::headline($book);
    }

    public function render()
    {
        return view('livewire.product.product.detail-product', [
            'book_name' => $this->getBookName(),
            'books' => $this->getBook(),
        ])
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
