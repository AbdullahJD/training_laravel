<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['Address','Telephone_number','commercial _register','is_active'];
    public $timestamps = true;

    public function items()
    {
        return $this->belongsToMany(Item::class,'store_item')->withPivot('quantity');
    }
}
