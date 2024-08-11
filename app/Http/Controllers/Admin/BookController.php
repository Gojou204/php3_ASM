<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function listBook(){
        $listBook = Book::with('category', 'author')->get();
        return view('admin.books.list-book')->with([
            'listBook' => $listBook
        ]);
    }
    public function addBook(){
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.add-book', compact('categories', 'authors'));
    }
    public function addPostBook(AddBookRequest $req){
        $linkImage = '';
        if($req->hasFile('imageSP')){
            $image = $req->file('imageSP');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'imageBooks/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'author_id' => $req->author_id,
            'publication_date' => $req->publication_date,
            'price' => $req->price,
            'description' => $req->description,
            'quantity' => $req->quantity,
            'image' => $linkImage
        ];
        Book::create($data);
        return redirect()->route('admin.books.listBook')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function deleteBook($book_id)
    {
        $book = Book::find($book_id);

        if ($book) {
            $book->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sách']);
        }
    }
    public function updateBook($book_id){
        $categories = Category::all();
        $authors = Author::all();
        $book = Book::where('book_id', $book_id)->first();
        return view('admin.books.update-book', compact('categories', 'authors'))->with([
            'book' => $book
        ]);
    }

    public function updatePatchBook($book_id, Request $req){
        $book =  Book::where('book_id', $book_id)->first();
        $linkImage = $book->image;
        if($req->hasFile('imageSP')){
            File::delete(public_path($book->image)); // Xóa file cũ
            $image = $req->file('imageSP');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $linkStorage = 'imageBooks/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'author_id' => $req->author_id,
            'publication_date' => $req->publication_date,
            'price' => $req->price,
            'description' => $req->description,
            'quantity' => $req->quantity,
            'image' => $linkImage
        ];
        Book::where('book_id', $book_id)->update($data);
        return redirect()->route('admin.books.listBook')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}
