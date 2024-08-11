<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public $primaryKey = 'category_id';
    public $fillable = [
        'name'
    ];
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id', 'category_id');
    }
}
