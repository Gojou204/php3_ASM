<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function listUser(){
        $listUser = User::get();
        return view('admin.users.list-user')->with([
            'listUser' => $listUser
        ]);
    }
    public function addUser(){
        return view('admin.users.add-user');
    }
    public function addPostUser(Request $req){
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'phone' => $req->phone,
            'address' => $req->address
        ];
        User::create($data);
        return redirect()->route('admin.users.listUser')->with([
            'message' => 'Thêm mới người dùng thành công'
        ]);
    }
    public function deleteUser($user_id)
    {
        $user = User::find($user_id);

        if ($user) {
            $user->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy người dùng']);
        }
    }
    public function updateUser($user_id){
        $user = User::where('user_id', $user_id)->first();
        return view('admin.users.update-user')->with([
            'user' => $user
        ]);
    }

    public function updatePatchUser($user_id, UpdateUserRequest $req){
        $user =  User::where('user_id', $user_id)->first();

        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'phone' => $req->phone,
            'address' => $req->address
        ];
        User::where('user_id', $user_id)->update($data);
        return redirect()->route('admin.users.listUser')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}
