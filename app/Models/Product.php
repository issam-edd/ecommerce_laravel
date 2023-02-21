<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "title", "slug", "description", "price", "old_price", "image", "inStock", "category"
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
