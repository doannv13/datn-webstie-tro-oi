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

                                    <div class="row mb-3 ">
                                        <div class="col-11">
                                            <label for="" class="form-label">Ảnh</label>
                                            <input type="file" name="image" id="image" accept="image/*"
                                                   class="form-control" class="@error('image') is-invalid @enderror">
                                        </div>
                                        <div class="col-1">
                                            <img src="{{ asset('no_image.jpg') }}" alt="" style="width: 100px; height: 100px" id="image_preview">
                                        </div>
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
                                        <label for="example-textarea" class="form-label">Slug</label>
                                        <textarea class="form-control" name="slug" id="slug" rows="5">{{ old('slug') }}</textarea>
                                        @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">ID Admin</label>
                                        <textarea class="form-control" name="id_admin" id="id_admin" rows="5">{{ old('id_admin') }}</textarea>
                                        @error('id_admin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary waves-effect waves-light">Thêm</button>
                                    <a href="{{ route('post.index') }}"
                                        class="btn btn-warning waves-effect text-light">Trở về</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
