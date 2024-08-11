@extends('admin.layouts.default')

@section('title')
    @parent
     Thêm mới sản phẩm
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
                        <h4 class="card-title">Form thêm sách</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <form action="{{ route('admin.books.addPostBook') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sách:</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thể loại sách:</label>
                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                <option value="" selected disabled>Thể loại sách</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tác giả sách:</label>
                            <select class="form-control" name="author_id" id="exampleFormControlSelect2">
                                <option value="" selected disabled>Tác giả sách</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->author_id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày xuất bản:</label>
                            <input type="date" class="form-control" name="publication_date">
                            @error('publication_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá sách:</label>
                            <input type="text" class="form-control" name="price">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả:</label>
                            <textarea class="form-control" rows="4" name="description"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số lượng sách:</label>
                            <input type="number" class="form-control" name="quantity">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imageSP" accept="image/png, image/jpeg">
                                <label class="custom-file-label">Chọn ảnh</label>
                            </div>
                            @error('imageSP')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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