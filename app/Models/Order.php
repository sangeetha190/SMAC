<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'total_amount',
        'status',
        'order_no',
        'payment_type',

        'firstname',
        'lastname',
        'email',
        'phone',

        'address_line1',
        'address_line2',
        'country',
        'city',
        'state',
        'postal_code',
        'landmark',
        'note',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cancelOrderRequest()
    {
        return $this->hasOne(CancelOrderRequest::class);
    }
}
