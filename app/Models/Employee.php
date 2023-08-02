<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['full_name','Phone_number','Personal_id','Gender','Job_title','Additional_info','is_active','store_id'];

    public $timestamps = true;

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
