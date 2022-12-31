<?php

namespace App\Http\Livewire\LandingPage;

use App\Models\Book;
use Livewire\Component;

class LandingPageIndex extends Component
{
    public function render()
    {
        return view('livewire.landing-page.landing-page-index', [
            'list_product' => Book::limit(3)->get()
        ])
            ->extends('layouts.guest')
            ->section('content')
            ->section('footer');
    }
}
