<?php

namespace App\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
        'image',
    ];

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();
        static::deleting(function($data) { // before delete() method call this
            $data->order_products()->delete();
        });
    }
}
