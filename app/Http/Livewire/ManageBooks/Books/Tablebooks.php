<?php

namespace App\Http\Livewire\ManageBooks\Books;

use App\Models\Book;
use App\Models\Author;
use Livewire\Component;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Tablebooks extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modelId;
    public $search = '';

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
    public $author_id;
    public $category_id;
    public $book_cover;


    public $modalImageVisible = false;
    public $modalCategoryVisible = false;
    public $modalAuthorVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modalFormVisible = false;

    protected $listeners = [
        'bookCreated' => '$refresh'
    ];

    public function mount()
    {
        $this->resetPage();
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
            $this->book_cover->storeAs('book' , $this->book_cover->getClientOriginalName())
        ];
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
        $data = Book::find($this->modelId);
        $this->book_name = $data->book_name;
        $this->isbn = $data->isbn;
        $this->total_page = $data->total_page;
        $this->release_date = $data->release_date;
        $this->book_description = $data->book_description;
        $this->language_id = $data->language_id;
        $this->publisher_id = $data->publisher_id;
        $this->book_cost = $data->book_cost;
        $this->total_stock = $data->total_stock;
        $this->book_cover = $data->book_cover;
    }

    public function read()
    {
        return Book::where('book_name', 'like', '%' . $this->search . '%')->paginate(5);
    }

    public function updateAuthor($id)
    {
        $this->modelId = $id;
        $this->modalAuthorVisible = true;
    }

    public function updateDataAuthor()
    {
        Book::find($this->modelId)->authors()->attach($this->author_id);
    }

    public function deleteAuthor($id)
    {
        Book::find($this->modelId)->authors()->detach($id);
    }

    public function updateCategory($id)
    {
        $this->modelId = $id;
        $this->modalCategoryVisible = true;
    }

    public function updateDataCategory()
    {
        Book::find($this->modelId)->categories()->attach($this->category_id);
    }

    public function deleteCategory($id)
    {
        Book::find($this->modelId)->categories()->detach($id);
    }

    public function update()
    {
        $this->validate();
        Book::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        Book::find($this->modelId)->authors()->detach($this->modelId);
        Book::find($this->modelId)->categories()->detach($this->modelId);
        Book::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.manage-books.books.tablebooks', [
            'datas' => $this->read(),
            'authors' => Author::all(),
            'books' => Book::all(),
            'categories' => Category::all(),
            'languages' => Language::all(),
            'publishers' => Publisher::all()
        ]);
    }
}
