<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\Book;
use Livewire\Component;

class DashboardUserIndex extends Component
{
    public function render()
    {
        return view('livewire.dashboard.user.dashboard-user-index', [
            'list_product' => Book::limit(3)->get()
        ])
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
