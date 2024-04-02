<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    public function parameter()
    {
        return [
            $this->belongsToMany(ParameterProduct::class),
        ];
    }
}
