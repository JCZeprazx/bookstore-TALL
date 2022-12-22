<?php

namespace App\Http\Livewire\ManageBooks\Publishers;

use Livewire\Component;
use App\Models\Publisher;
use Livewire\WithPagination;

class TablePublishers extends Component
{
    use WithPagination;

    public $modelId;
    public $search = '';

    public $publisher_name;

    public $modalConfirmDeleteVisible = false;
    public $modalFormVisible = false;

    protected $listeners = [
        'dataCreated' => '$refresh'
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function modelData()
    {
        return [
            'publisher_name' => $this->publisher_name
        ];
    }

    public function rules()
    {
        return [
            'publisher_name' => 'required'
        ];
    }

    public function updated($publisher_name)
    {
        $this->validateOnly($publisher_name, [
            'publisher_name' => 'required'
        ]);
    }

    public function updateShowModal($id)
    {
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function loadModel()
    {
        $data = Publisher::find($this->modelId);
        $this->publisher_name = $data->publisher_name;
    }

    public function read()
    {
        return Publisher::where('publisher_name', 'like', '%' . $this->search . '%')->paginate(5);
    }

    public function update()
    {
        $this->validate();
        Publisher::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        Publisher::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.manage-books.publishers.table-publishers', [
            'datas' => $this->read()
        ]);
    }
}
