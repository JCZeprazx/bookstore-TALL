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
        if ($this->getOrder() !== null) {
            $book = Book_Order::where('order_id', '=', $this->getOrder())->first();
            if($book !== null){
                $list_order = Book::find($book->book_id)
                    ->join('book_order', 'book_order.book_id', '=', 'books.id')
                    ->join('orders', 'orders.id', '=', 'book_order.order_id')
                    ->get(['books.*', 'book_order.quantity', 'orders.status_id']);
                if ($book == null) {
                    return null;
                } else {
                    return $list_order->filter(function ($value, $key) {
                        if ($value['status_id'] == 2) {
                            return $value;
                        }
                    });
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function getTotalCost()
    {
        if ($this->getOrder() !== null) {
            if (Book_Order::where('order_id', '=', $this->getOrder())->exists()) {
                $order = Book_Order::where('order_id', '=', $this->getOrder())
                    ->join('orders', 'orders.id', '=', 'book_order.order_id')
                    ->join('books', 'books.id', '=', 'book_order.book_id')
                    ->get([
                        'book_order.*',
                        'books.book_cost',
                        'orders.shipping_id'
                    ]);
                return $this->getQuantity() * $order->value('book_cost')
                        + Shipping::find($order->first(function($value) {
                            if($value['shipping_id'] == null){
                                return 0;
                            } else {
                                return $value['shipping_id'];
                            }
                        })
                    )->first()->cost_shipping;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getQuantity()
    {
        if ($this->getOrder() !== null) {
            return Book_Order::where('order_id', '=', $this->getOrder())
                ->sum('quantity');
        }
    }

    public function getOrder()
    {
        if (Order::where('user_id', Auth::id())->first() == null) {
            return Order::create([
                'user_id' => Auth::id()
            ])->id;
        } else {
            if (Order::where('status_id', '=', '2')->exists()) {
                return Order::where('status_id', '=', '2')->first()->id;
            } else {
                return null;
            }
        }
    }

    public function getListOrder()
    {
        return Book_Order::where('order_id', '=', $this->getOrder())->get();
    }

    public function shippingCost($id)
    {
        return Order::find($id)
            ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
            ->first();
    }

    public function userAddress()
    {
        return User::find(Auth::id())->get([
            'address',
            'city',
            'region',
            'country'
        ]);
    }

    public function save()
    {
        User::find(Auth::id())->update([
            'address' => $this->address,
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
        ]);

        Order::find($this->getOrder())->update([
            'payment_id' => $this->payment_id,
            'shipping_id' => $this->shipping_id
        ]);
    }

    public function delete()
    {
        Book::find($this->book_id)->orders()->detach();
        $this->modalConfirmDeleteVisible = false;
    }

    public function render()
    {
        return view('livewire.orders.order.list-order', [
            'user_address' => $this->userAddress(),
            'cost_total' => $this->getTotalCost(),
            'orders' => $this->listOrder(),
            'quantity' => $this->getQuantity(),
            'payments' => Payment::all(),
            'shippings' => Shipping::all()
        ]);
    }
}
