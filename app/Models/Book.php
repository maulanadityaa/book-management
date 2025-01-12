<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'title',
        'year',
        'isbn',
        'cover'
    ];
}
