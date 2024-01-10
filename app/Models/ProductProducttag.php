<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProducttag extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_tag_id',
    ];

    public function productTag()
    {
        return $this->belongsTo(ProductTag::class);
    }
}
