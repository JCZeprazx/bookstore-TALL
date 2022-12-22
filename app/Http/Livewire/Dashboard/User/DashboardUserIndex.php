<?php

namespace App\Http\Livewire\Dashboard\User;

use Livewire\Component;

class DashboardUserIndex extends Component
{
    public function render()
    {
        return view('livewire.dashboard.user.dashboard-user-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
