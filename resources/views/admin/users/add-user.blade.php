@extends('admin.layouts.default')

@section('title')
    @parent
     Thêm người dùng
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
                        <h4 class="card-title">Form thêm người dùng</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <form action="{{ route('admin.users.addPostUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên người dùng:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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