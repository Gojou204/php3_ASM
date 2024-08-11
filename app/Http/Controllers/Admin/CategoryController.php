<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function listCategory(){
        $listCategory = Category::get();
        return view('admin.categories.list-category')->with([
            'listCategory' => $listCategory
        ]);
    }
    public function addCategory(){
        return view('admin.categories.add-category');
    }
    public function addPostCategory(Request $req){
        $data = [
            'name' => $req->name
        ];
        Category::create($data);
        return redirect()->route('admin.categories.listCategory')->with([
            'message' => 'Thêm mới thể loại thành công'
        ]);
    }
    public function deleteCategory($category_id)
    {
        $category = Category::find($category_id);

        if ($category) {
            $category->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy thể loại']);
        }
    }
    public function updateCategory($category_id){
        $category = Category::where('category_id', $category_id)->first();
        return view('admin.categories.update-category')->with([
            'category' => $category
        ]);
    }

    public function updatePatchCategory($category_id, Request $req){
        $category =  Category::where('category_id', $category_id)->first();

        $data = [
            'name' => $req->name
        ];
        Category::where('category_id', $category_id)->update($data);
        return redirect()->route('admin.categories.listCategory')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}
