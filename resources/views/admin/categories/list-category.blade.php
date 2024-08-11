@extends('admin.layouts.default')

@section('title')
    @parent
     Danh sách sản phẩm
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
                        <h4 class="card-title">Danh sách thể loại</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('admin.categories.addCategory') }}" class="btn btn-primary">Thêm thể loại</a>
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
                                    <th style="width: 5%;">STT</th>
                                    <th style="width: 25%;">Tên thể loại</th>
                                    <th style="width: 25%;">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listCategory as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>                                     
                                        <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('admin.categories.updateCategory', $value->category_id) }}"><i class="ri-pencil-line"></i></a>
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá" href="javascript:void(0);" onclick="deleteCategory({{ $value->category_id }})"><i class="ri-delete-bin-line"></i></a>
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
        function deleteCategory(category_id) {
            if (confirm('Bạn có chắc chắn muốn xóa thể loại này không?')) {
                fetch(`/admin/categories/${category_id}`, {
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