<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'shipping_id',
        'status_id',
        'image',
        'cost_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }

    public function shippings()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_order', 'order_id', 'book_id');
    }

}
