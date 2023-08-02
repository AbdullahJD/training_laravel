<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFromStoreToStore extends Model
{
    use HasFactory;

    protected $table = 'order_from_store_to_store';

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
