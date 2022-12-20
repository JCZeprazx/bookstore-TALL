<?php

namespace App\Http\Livewire\ManageOrders\Table;

use App\Models\Book;
use App\Models\Order;
use Livewire\Component;
use App\Models\Book_Order;

class UserOrder extends Component
{
    public $status_id;
    public $image;
    public $modal;

    public function updateShowModal()
    {

    }


    public function getOrder()
    {
        return Order::with('user', 'books')->join('statuses', 'orders.status_id', '=', 'statuses.id')->get();
    }

    public function getTotalCost()
    {
        $quantity = Book_Order::where('order_id', '=', $this->getOrder()->id)
        ->sum('quantity');
        $cost = Book_Order::where('order_id', '=', $this->getOrder()->id)
                ->first();
        $cost_book = Book::where('id', '=', $cost->book_id)
                ->first();
        return $quantity * $cost_book->book_cost;
    }

    public function render()
    {
        return view('livewire.manage-orders.table.user-order', [
            'datas' => $this->getOrder()
        ]);
    }
}
