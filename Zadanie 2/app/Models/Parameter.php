<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    const UPDATED_AT = false;
    const CREATED_AT = false;

    protected $fillable = [
        'parameter',
        'value'
    ];

    public function parameter()
    {
        return [
            $this->belongsToMany(ParameterProduct::class),
        ];
    }
}