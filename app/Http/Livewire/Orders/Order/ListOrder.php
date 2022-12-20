<?php

namespace App\Http\Livewire\Orders\Order;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\Book_Order;
use Illuminate\Support\Facades\Auth;

class ListOrder extends Component
{
    public $book_id;
    public $payment_id;
    public $shipping_id;

    public $address;
    public $city;
    public $region;
    public $country;

    public $modalConfirmDeleteVisible = false;

    public function deleteShowModal($id)
    {
        $this->book_id = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function listOrder()
    {
        $book = Book_Order::where('order_id', '=', $this->getOrder()->id)->first();
        if ( $book == null) {
            return null;
        } else {
            return Book::find($book->book_id)
            ->join('book_order', 'book_order.book_id', '=', 'books.id')
            ->get(['books.*', 'book_order.quantity']);
        }
    }

    public function getTotalCost()
    {
        if (Book_Order::where('order_id', '=', $this->getOrder()->id)->exists()) {
            $cost = Book_Order::where('order_id', '=', $this->getOrder()->id)
                ->first();
            $cost_book = Book::where('id', '=', $cost->book_id)
                ->get();
            return $this->getQuantity() * $cost_book[0]->book_cost + $this->shippingCost($this->getOrder()->id)->cost_shipping;
        } else {
            return 0;
        }
    }

    public function getQuantity()
    {
        return Book_Order::where('order_id', '=', $this->getOrder()->id)
                ->sum('quantity');
    }

    public function getOrder()
    {
        if (Order::where('user_id', Auth::id())->first() == null) {
            return Order::create([
                'user_id' => Auth::id()
            ])->first();
        } else {
            return Order::where('user_id', '=', Auth::id())->first();
        }
    }

    public function getListOrder()
    {
        $order_id = $this->getOrder()->id;
        return Book_Order::where('order_id', '=', $order_id)->get();
    }

    public function save()
    {
        User::find(Auth::id())->update([
            'address' => $this->address,
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
        ]);

        Order::find($this->getOrder()->id)->update([
            'payment_id' => $this->payment_id,
            'shipping_id' => $this->shipping_id
        ]);
    }

    public function shippingCost($id)
    {
        return Order::find($id)
                    ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
                    ->first();
    }

    public function delete()
    {
        Book::find($this->book_id)->orders()->detach();
        $this->modalConfirmDeleteVisible = false;
    }

    public function render()
    {
        return view('livewire.orders.order.list-order', [
            'user_order' => $this->getOrder(),
            'cost_total' => $this->getTotalCost(),
            'orders' => $this->listOrder(),
            'quantity' => $this->getQuantity(),
            'payments' => Payment::all(),
            'shippings' => Shipping::all()
        ]);
    }
}
