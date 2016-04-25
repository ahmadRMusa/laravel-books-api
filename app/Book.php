<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id',
        'title',
        'author',
        'description',
        'reference',
        'publication',
        'price',
        'quantity',
    ];
}
