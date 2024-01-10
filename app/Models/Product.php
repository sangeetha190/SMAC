<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'product_category_id',
        'product_type_id',
        'product_name',
        'short_info',
        'description',
        'price',
        'offer',
        'stock',
        'image',
        'status',
        'view_count',
        'created_by',
    ];

    public function productTags()
    {
        return $this->belongsToMany(ProductTag::class, ProductProducttag::class);
    }
    public function productAlignments()
    {
        return $this->belongsToMany(Alignment::class, ProductAlignment::class);
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function tags()
    {
        return $this->hasMany(ProductProducttag::class);
    }
    public function Alignments()
    {
        return $this->hasMany(ProductAlignment::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
