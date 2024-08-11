@extends('admin.layouts.default')

@section('title')
    @parent
     Cập nhật thể loại
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
                        <h4 class="card-title">Form cập nhật thể loại</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <form action="{{ route('admin.categories.updatePatchCategory', $category->category_id) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Tên thể loại:</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
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