<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name','serial_number','status','unit','description','category_id'];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class,'store_item')->withPivot('quantity');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
