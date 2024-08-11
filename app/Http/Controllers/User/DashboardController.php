<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $dashboard = Book::get();
        $topBooks = Book::orderBy('price', 'desc')->take(12)->get();
        $topCategories = Category::withCount('books')
            ->orderBy('books_count', 'desc')
            ->take(6)
            ->get();
        return view('user.home.dashboard', compact('topBooks', 'topCategories'))->with([
            'dashboard' => $dashboard
        ]);
    }
    
    
}
