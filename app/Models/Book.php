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
        'author_id',
        'category_id',
        'publication_date',
        'price',
        'description',
        'quantity',
        'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }
}
