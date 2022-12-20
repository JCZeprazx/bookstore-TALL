<?php

namespace App\Http\Livewire\Product\Components;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Book_Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookOrder extends Component
{
    public $book_id;
    public $quantity;
    public $modalFormVisible = false;

    public function previewBook()
    {
        return Book::where('id', "=", $this->book_id)->first();
    }

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function modelDataBook()
    {
        $user_order = Order::where('user_id', '=', Auth::id())->exists()
                    ? Order::where('user_id', Auth::id())->first()->id
                    : Order::create(Auth::id())->id ;
        return [
            'book_id' => $this->book_id,
            'order_id' => $user_order,
            'quantity' => $this->quantity,
        ];
    }

    public function createOrder()
    {
        $order_id = Order::where('user_id', '=', Auth::id())->first();
        if(Book_Order::where('book_id', '=', $this->book_id)
            ->where('order_id', '=', $order_id->id)
            ->exists())
            {
                Book::find($this->book_id)->orders()
                    ->updateExistingPivot($order_id->id, [
                        'quantity' => $this->quantity
                ]);
        } else {
            Book_Order::create($this->modelDataBook());
        }
        $this->modalFormVisible = false;
    }

    public function render()
    {
        return view('livewire.product.components.book-order', [
            'preview' => $this->previewBook()
        ]);
    }
}
