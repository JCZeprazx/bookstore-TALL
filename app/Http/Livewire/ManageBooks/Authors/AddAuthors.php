<?php

namespace App\Http\Livewire\ManageBooks\Authors;

use App\Models\Author;
use Livewire\Component;

class AddAuthors extends Component
{
    public $author_firstname;
    public $author_lastname;

    public $modalFormVisible = false;

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

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function modelData()
    {
        return [
            'author_firstname' => $this->author_firstname,
            'author_lastname' => $this->author_lastname
        ];
    }

    public function resetVars()
    {
        $this->author_firstname = null;
        $this->author_lastname = null;
    }

    public function create()
    {
        $this->validate();
        Author::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
        $this->emit('authorCreated');
    }

    public function render()
    {
        return view('livewire.manage-books.authors.add-authors');
    }
}
