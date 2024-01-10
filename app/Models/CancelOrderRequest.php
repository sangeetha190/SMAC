<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelOrderRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'reason',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
