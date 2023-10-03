@extends('admin.layouts.master')
@section('title')
    Cập nhật bài viết
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="my-2">Cập nhật bài viết</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('post.update', $model->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tiêu đề ngắn</label>
                                        <input type="text" name="metaTitle" id="simpleinput" class="form-control"
                                            value="{{ old('metaTitle', $model->metaTitle ?? '') }}">
                                        @error('metaTitle')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tiêu đề</label>
                                        <input type="text" name="title" id="simpleinput" class="form-control"
                                               value="{{ old('title', $model->title ?? '') }}">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-11">
                                            <label for="example-textarea" class="form-label">Ảnh</label>
                                            <input id="image" type="file" class="form-control" name="image"
                                                accept="image/*">
                                        </div>
                                        <div class="col-1">
                                            @if ($model->image && asset($model->image))
                                                <img id="image_preview" src="{{ asset($model->image) }}" alt=""
                                                    width="100px" height="100px">
                                            @else
                                                <img id="image_preview" src="{{ asset('no_image.jpg') }}" alt=""
                                                    width="100px" height="100px">
                                            @endif
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Mô tả ngắn</label>
                                        <textarea class="form-control" name="metaDescription" id="metaDescription" rows="5">{{ old('metaDescription', $model->metaDescription ?? '') }}</textarea>
                                        @error('metaDescription')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Content</label>
                                        <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $model->description ?? '') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">ID Admin</label>
                                        <input type="text" name="id_admin" id="simpleinput1" class="form-control"
                                            value="{{ old('id_admin', $model->id_admin ?? '') }}">
                                        @error('id_admin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <input type="text" class="selectize-close-btn form-control" name="tags"
                                            value="{{ old('tags', $tags ?? '') }}">
                                        @error('tags')
                                            <span class="text-danger">{{ $message }}</span>                  
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">View</label>
                                        <input type="text" name="view" id="simpleinput1" class="form-control"
                                               value="{{ old('view', $model->view ?? '') }}">
                                        @error('view')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
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
