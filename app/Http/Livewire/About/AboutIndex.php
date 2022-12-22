<?php

namespace App\Http\Livewire\About;

use Livewire\Component;

class AboutIndex extends Component
{
    public function render()
    {
        return view('livewire.about.about-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
