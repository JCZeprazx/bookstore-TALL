<?php

namespace App\Http\Livewire\ManageBooks\Publishers;

use Livewire\Component;
use App\Models\Publisher;

class AddPublishers extends Component
{
    public $publisher_name;

    public $modalFormVisible = false;

    public function rules()
    {
        return [
            'publisher_name' => 'required'
        ];
    }

    public function updated($publishers)
    {
        $this->validateOnly($publishers, [
            'publisher_name' => 'required'
        ]);
    }

    public function create()
    {
        $this->validate();
        Publisher::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVar();
        $this->emit('dataCreated');
    }

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function modelData()
    {
        return [
            'publisher_name' => $this->publisher_name
        ];
    }

    public function resetVar()
    {
        $this->publisher_name = null;
    }

    public function render()
    {
        return view('livewire.manage-books.publishers.add-publishers');
    }
}
