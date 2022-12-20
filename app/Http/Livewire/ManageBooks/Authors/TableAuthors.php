<?php

namespace App\Http\Livewire\ManageBooks\Authors;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class TableAuthors extends Component
{
    use WithPagination;

    public $modelId;
    public $search = '';

    public $author_firstname;
    public $author_lastname;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    protected $listeners = [
        'authorCreated' => '$refresh'
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function modelData()
    {
        return [
            'author_firstname' => $this->author_firstname,
            'author_lastname' => $this->author_lastname
        ];
    }

    public function rules()
    {
        return [
            'author_firstname' => 'required'
        ];
    }

    public function updated($author_firstname)
    {
        $this->validateOnly($author_firstname, [
            'author_firstname' => 'required'
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
        $data = Author::find($this->modelId);
        $this->author_firstname = $data->author_firstname;
        $this->author_lastname = $data->author_lastname;
    }

    public function read()
    {
        return Author::where('author_firstname', 'like', '%' . $this->search . '%')->paginate(5);
    }

    public function update()
    {
        $this->validate();
        Author::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        Author::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.manage-books.authors.table-authors', [
            'datas' => $this->read()
        ]);
    }
}
