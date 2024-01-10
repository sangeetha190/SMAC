<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAlignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'Alignment_id',
    ];

    public function Alignment()
    {
        return $this->belongsTo(Alignment::class);
    }
}
