<?php

namespace App\Http\Livewire\Product\Components;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Book_Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BookOrder extends Component
{
    public $book_id;
    public $count = 0;
    public $modalFormVisible = false;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        ($this->count <= 0) ? $this->count = 0 : $this->count--;
    }

    public function totalCost()
    {
        return $this->previewBook()->book_cost * $this->count;
    }

    public function previewBook()
    {
        return Book::where('id', "=", $this->book_id)->first();
    }

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function userOrder()
    {
        if (
            Order::where('user_id', '=', Auth::id())
            ->where('status_id', '=', "2")
            ->exists()
        ) {
            return Order::where('user_id', '=', Auth::id())
                ->where('status_id', '=', '2')
                ->first()->id;
        } else {
            return Order::create([
                'user_id' => Auth::id()
            ])->id;
        }
    }

    public function modelDataBook()
    {
        return [
            'book_id' => $this->book_id,
            'order_id' => $this->userOrder(),
            'quantity' => $this->count,
        ];
    }

    public function createOrder()
    {
        if (Order::where('user_id', '=', Auth::id())
            ->where('status_id', '=', '2')
            ->exists()
        ) {
            if (Book_Order::where('book_id', '=', $this->book_id)
                ->where('order_id', '=', $this->userOrder())
                ->exists()
            ) {
                Book::find($this->book_id)->orders()
                    ->updateExistingPivot($this->userOrder(), [
                        'quantity' => $this->count
                    ]);
                    Alert::success('Success Title', 'Sukses Menambah');
            } else {
                Book_Order::create($this->modelDataBook());
                Alert::success('Success Title', 'Menambah Keranjang');
            }
        } else {
            Book_Order::create([
                'book_id' => $this->book_id,
                'order_id' => Order::create([
                                'user_id' => Auth::id()
                            ])->id,
                'quantity' => $this->count
            ]);
            Alert::success('Success Title', 'Sukses Membuat Order');
        }

        $this->modalFormVisible = false;
    }

    public function render()
    {
        return view('livewire.product.components.book-order', [
            'preview' => $this->previewBook(),
            'total_cost' => $this->totalCost()
        ]);
    }
}
