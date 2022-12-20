<?php

namespace App\Http\Livewire\Statistic;

use Livewire\Component;

class StatisticIndex extends Component
{
    public function render()
    {
        return view('livewire.statistic.statistic-index')
                ->extends('layouts.app')
                ->section('header')
                ->section('content')
                ->section('footer');
    }
}
