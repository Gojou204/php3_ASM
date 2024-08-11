<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRegisterRequest;

class AuthenController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $req){
        

        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember = $req->has('remember');

        if(Auth::attempt($dataUserLogin, $remember)){
            // Logout hết các tài khoản khác
            Session::where('user_id', Auth::id())->delete();
            // Tạo phiên đăng nhập mới
            session()->put('user_id', Auth::id());

            // Đăng nhập thành công
            if(Auth::user()->role == '1'){
                return redirect()->route('admin.books.listBook')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }
            else{
                // Đăng nhập vào User
                return redirect()->route('users.dashboard')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }
        }else{
            // Đăng nhập thất bại
            Log::info('Đăng nhập thất bại', ['email' => $req->email, 'password' => $req->password]);
            return redirect()->back()->with([
                'message' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }

    public function register(){
        return view('register');
    }

    public function postRegister(UserRegisterRequest $req){

        $check = User::where('email', $req->email)->exists();
        if($check){
            return redirect()->back()->with([
                'message' => 'Tài khoản email đã tồn tại'
            ]);
        }else{
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'password_confirmation' => $req->password_confirmation,
            ];
            $newUser = User::create($data);

            // Auth::login($newUser); // Tự động đăng nhập cho user này
            // return Trang chủ

            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công, vui lòng đăng nhập'
            ]);
        }
    }
}
