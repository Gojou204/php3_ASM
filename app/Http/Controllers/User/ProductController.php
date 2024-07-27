<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(){
        $home = Book::paginate(10);
        return view('user.books.home')->with([
            'home' => $home
        ]);
    }
}
