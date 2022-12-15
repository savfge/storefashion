<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function transr()
    {
        return $this->hasMany(Transaction::class);
    }
}
