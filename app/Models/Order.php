<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function itemsToStore()
    {
        return $this->hasMany(OrderToStore::class, 'order_id');
    }

    public function itemsFromStoreToStore()
    {
        return $this->hasMany(ItemFromStoreToStore::class, 'order_id');
    }

    public function itemsFromStoreToCustomer()
    {
        return $this->hasMany(OrderFromStoreToCustomer::class, 'order_id');
    }
}
