@extends('admin.layouts.default')

@section('title')
    @parent
     Cập nhật sản phẩm
@endsection

@push('styles')
    <style>
        .img-product {
            height: 150px;
            object-fit: scale-down;
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form cập nhật sách</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <form action="{{ route('admin.books.updatePatchBook', $book->book_id) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Tên sách:</label>
                            <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                        </div>
                        <div class="form-group">
                            <label>Thể loại sách:</label>
                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                @foreach($categories as $category)
                                    <option
                                        @if($book->category_id === $category->category_id)
                                            selected
                                        @endif
                                        value="{{ $category->category_id }}">
                                            {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tác giả sách:</label>
                            <select class="form-control" name="author_id" id="exampleFormControlSelect2">
                                <option value="" selected disabled>Tác giả sách</option>
                                @foreach($authors as $author)
                                    <option
                                        @if($book->author_id === $author->author_id)
                                            selected
                                        @endif
                                        value="{{ $author->author_id }}">
                                            {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày xuất bản:</label>
                            <input type="date" class="form-control" name="publication_date" value="{{ $book->publication_date }}">
                        </div>
                        <div class="form-group">
                            <label>Giá sách:</label>
                            <input type="text" class="form-control" name="price" value="{{ $book->price }}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả:</label>
                            <textarea class="form-control" rows="4" name="description">{{ $book->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Số lượng sách:</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $book->quantity }}">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh:</label><br>
                            <img src="{{ asset($book->image) }}" alt="" class="img-product"> 
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imageSP" accept="image/png, image/jpeg">
                                <label class="custom-file-label">Chọn ảnh</label>
                            </div>
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