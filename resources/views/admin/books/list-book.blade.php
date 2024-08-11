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
                        <h4 class="card-title">Danh sách sách</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('admin.books.addBook') }}" class="btn btn-primary">Thêm sách</a>
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
                                    <th style="width: 12%;">Hình ảnh</th>
                                    <th style="width: 15%;">Tên sách</th>
                                    <th style="width: 15%;">Thể loại sách</th>
                                    <th style="width: 15%;">Tác giả sách</th>
                                    <th style="width: 18%;">Mô tả sách</th>
                                    <th style="width: 7%;">Giá</th>
                                    <th style="width: 7%;">Số lượng</th>
                                    <th style="width: 15%;">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listBook as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($value->image) }}" alt="{{ $value->name }}" style="width: 120px;"></td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->category ? $value->category->name : 'No Category' }}</td>
                                        <td>{{ $value->author ? $value->author->name : 'No Author' }}</td>
                                        <td>
                                        <p class="mb-0">{{ $value->description }}</p>
                                        </td>
                                        <td>{{ $value->price }}đ</td>
                                        <td>{{ $value->quantity }}</td>                                        
                                        <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('admin.books.updateBook', $value->book_id) }}"><i class="ri-pencil-line"></i></a>
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá" href="javascript:void(0);" onclick="deleteBook({{ $value->book_id }})"><i class="ri-delete-bin-line"></i></a>
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
        function deleteBook(book_id) {
            if (confirm('Bạn có chắc chắn muốn xóa sách này không?')) {
                fetch(`/admin/books/${book_id}`, {
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