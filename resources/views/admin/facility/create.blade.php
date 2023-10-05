@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-2">Thêm mới tiện ích</h3>
                    <div class="row">
                        <div class="col-lg-12">

                            <form action="{{ route('facilities.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label for="" class="form-label">Tên tiện ích <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}" placeholder="Wifi">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="fas fa-wifi">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Mô tả <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" id="description-facility" class="form-control" cols="30" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit"> Thêm mới </button>
                                    <button class="btn btn-warning" type="submit"> <a href="{{ route('facilities.index') }}" class="text-white">Trở về</a> </button>
                                </div>
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
        CKEDITOR.replace('description-facility', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endpush