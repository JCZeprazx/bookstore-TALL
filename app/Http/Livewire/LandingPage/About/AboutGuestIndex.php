<?php

namespace App\Http\Livewire\LandingPage\About;

use Livewire\Component;

class AboutGuestIndex extends Component
{
    public function render()
    {
        return view('livewire.landing-page.about.about-guest-index')
            ->extends('layouts.guest')
            ->section('content')
            ->section('footer');
    }
}
