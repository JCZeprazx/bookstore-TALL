<?php

namespace App\Http\Livewire\ManageBooks;

use Livewire\Component;

class ManageBooksIndex extends Component
{
    public function render()
    {
        return view('livewire.manage-books.manage-books-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
