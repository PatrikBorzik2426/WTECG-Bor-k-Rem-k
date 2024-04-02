<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    public function product()
    {
        return [
            $this->belongsTo(CartItem::class),
            $this->belongsToMany(ParameterProduct::class)
        ];
    }
}