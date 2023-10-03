@extends('admin.layouts.master')
@section('title')
    Thêm bài viết
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="my-2">Thêm bài viết</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tên tiêu đề</label>
                                        <input type="text" name="title" id="simpleinput" class="form-control"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="">
                                            <label for="example-textarea" class="form-label">Ảnh</label>
                                            <input id="image" type="file" class="form-control" name="image"
                                                accept="image/*"><br>
                                        </div>
                                        <div class="">
                                            <img id="image_preview" src="{{ asset('no_image.jpg') }}" alt=""
                                                width="100px" height="100px">
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Mô tả ngắn</label>
                                        <textarea class="form-control" name="metaDescription" id="metaDescription" rows="5">{{ old('metaDescription') }}</textarea>
                                        @error('metaDescription')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Content</label>
                                        <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">ID Admin</label>
                                        <input type="text" name="id_admin" id="simpleinput" class="form-control"
                                            value="{{ old('id_admin') }}">
                                        @error('id_admin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <input type="text" class="selectize-close-btn form-control" name="tags">
                                        @error('tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary waves-effect waves-light">Thêm</button>
                                    <a href="{{ route('post.index') }}" class="btn btn-warning waves-effect text-light">Trở
                                        về</a>
                                </form>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container -->
@endsection
@push('scripts')
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endpush
