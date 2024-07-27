<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function listBook(){
        $listBook = Book::paginate(10);
        return view('admin.books.list-book')->with([
            'listBook' => $listBook
        ]);
    }
}
