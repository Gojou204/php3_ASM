@extends('admin.layouts.default')

@section('title')
    @parent
     Danh sách người dùng
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
                        <h4 class="card-title">Danh sách người dùng</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('admin.users.addUser') }}" class="btn btn-primary">Thêm người dùng</a>
                    </div>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="data-tables table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">STT</th>
                                    <th style="width: 15%;">Tên người dùng</th>
                                    <th style="width: 15%;">Email</th>
                                    <th style="width: 10%;">Mật khẩu</th>
                                    <th style="width: 7%;">SĐT</th>
                                    <th style="width: 7%;">Địa chỉ</th>
                                    <th style="width: 15%;">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listUser as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>***********</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>
                                        <p class="mb-0">{{ $value->address }}</p>
                                        </td>                                     
                                        <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('admin.users.updateUser', $value->user_id) }}"><i class="ri-pencil-line"></i></a>
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá" href="javascript:void(0);" onclick="deleteUser({{ $value->user_id }})"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
 @endsection

@push('scripts')
    <script>
        function deleteUser(user_id) {
            if (confirm('Bạn có chắc chắn muốn xóa người dùng này không?')) {
                fetch(`/admin/users/${user_id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Reload lại trang sau khi xóa thành công
                    } else {
                        alert('Đã có lỗi xảy ra, vui lòng thử lại.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Đã có lỗi xảy ra, vui lòng thử lại.');
                });
            }
        }
    </script>
@endpush