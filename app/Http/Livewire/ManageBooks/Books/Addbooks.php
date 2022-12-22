<?php

namespace App\Http\Livewire\ManageBooks\Books;

use App\Models\Book;
use Livewire\Component;
use App\Models\Language;
use App\Models\Publisher;
use Livewire\WithFileUploads;

class Addbooks extends Component
{

    use WithFileUploads;

    public $book_name;
    public $isbn;
    public $total_page;
    public $release_date;
    public $book_description;
    public $language_id;
    public $publisher_id;
    public $book_cost;
    public $total_stock;
    public $total_sold;
    public $book_cover;

    public $modalFormVisible = false;

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function rules()
    {
        return [
            'book_name' => 'required',
            'isbn' => 'required',
            'total_page' => 'required',
            'release_date' => 'required',
            'book_description' => 'required',
            'language_id' => 'required',
            'publisher_id' => 'required',
            'book_cost' => 'required',
            'total_stock' => 'required',
            'book_cover' => 'image'
        ];
    }

    public function updated($book)
    {
        $this->validateOnly($book, [
            'book_name' => 'required',
            'isbn' => 'required',
            'total_page' => 'required',
            'release_date' => 'required',
            'book_description' => 'required',
            'language_id' => 'required',
            'publisher_id' => 'required',
            'book_cost' => 'required',
            'total_stock' => 'required',
            'book_cover' => 'image'
        ]);
    }

    public function modelData()
    {
        return [
            'book_name' => $this->book_name,
            'isbn' => $this->isbn,
            'total_page' => $this->total_page,
            'release_date' => $this->release_date,
            'book_description' => $this->book_description,
            'language_id' => $this->language_id,
            'publisher_id' => $this->publisher_id,
            'book_cost' => $this->book_cost,
            'total_stock' => $this->total_stock,
            'book_cover' => $this->book_cover->getClientOriginalName(),
            $this->book_cover->storeAs('book', $this->book_cover->getClientOriginalName())
        ];
    }

    public function resetVars()
    {
        $this->book_name = null;
        $this->isbn = null;
        $this->total_page = null;
        $this->release_date = null;
        $this->book_description = null;
        $this->language_id = null;
        $this->publisher_id = null;
        $this->book_cost = null;
        $this->total_stock = null;
        $this->book_cover = null;
    }

    public function create()
    {
        $this->validate();
        Book::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
        $this->emit('bookCreated');
    }

    public function render()
    {
        return view('livewire.manage-books.books.addbooks', [
            'languages' => Language::all(),
            'publishers' => Publisher::all()
        ]);
    }
}
