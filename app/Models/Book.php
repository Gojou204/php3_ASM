<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    public $primaryKey = 'book_id';
    public $fillable = [
        'name',
        'publication_date',
        'price',
        'description',
        'quantity',
        'image'
    ];
}
