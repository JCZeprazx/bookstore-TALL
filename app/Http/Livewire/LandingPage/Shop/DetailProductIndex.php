<?php

namespace App\Http\Livewire\LandingPage\Shop;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Support\Str;

class DetailProductIndex extends Component
{
    public function getBook()
    {
        return Book::where('book_name', '=', $this->getBookName())->get();
    }

    public function getBookName()
    {
        $book = Str::remove('/shop/', parse_url(url()->current(), PHP_URL_PATH));
        return Str::headline($book);
    }

    public function render()
    {
        return view('livewire.landing-page.shop.detail-product-index', [
            'book_name' => $this->getBookName(),
            'books' => $this->getBook(),
        ])
            ->extends('layouts.guest')
            ->section('content')
            ->section('footer');
    }
}
