<?php

namespace App\Models;

use App\Models\OrderDelivery;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_date',
        'status',
        'is_moved',
        'is_new'
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function delivery(){
        return $this->hasOne(OrderDelivery::class);
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($order) { // before delete() method call this
            $order->orderproduct()->delete();
            $order->delivery()->delete();
        });
    }
}
