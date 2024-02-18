<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingSession extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    public function shoppingSession()
    {
        return [
            $this->belongsToMany(CartItem::class),
            $this->belongsTo(Order::class),
            $this->hasOne(User::class)
        ];
    }
}