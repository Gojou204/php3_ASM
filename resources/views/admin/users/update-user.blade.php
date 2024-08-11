@extends('admin.layouts.default')

@section('title')
    @parent
     Cập nhật người dùng
@endsection

@push('styles')
    
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form cập nhật người dùng</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <form action="{{ route('admin.users.updatePatchUser', $user->user_id) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Tên người dùng:</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="text" class="form-control" name="password" value="{{ $user->password }}">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                        <button type="reset" class="btn btn-danger">Nhập lại</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    
@endpush