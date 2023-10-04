@extends('admin.layouts.master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Types</h4>
                        @if ($errors->any())
                            <p class="alert alert-danger">
                                Dữ liệu không hợp lệ vui lòng kiểm tra lại
                            </p>
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{ route('categorypost.update', $model->id) }}" method="POST">
                                    @csrf
                                    @method('put')

                                    <input type="hidden" name="id" value="{{ $model->id }}" class="d-none">

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Name</label>
                                        <input type="text" name="name" id="simpleinput"
                                            class="form-control" placeholder="Name" value="{{ $model->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="5">{{ $model->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

{{--                                    <div class="mb-3">--}}
{{--                                        <label for="simpleinput" class="form-label">Trạng thái</label>--}}

{{--                                        <select name="status" id="simpleinput" class="form-control">--}}
{{--                                            <option class="form-label" value="{{ $model->status == 'active' ? 'active' : 'inactive' }}" >{{ $model->status == 'active' ? 'Bật' : 'Tắt' }}</option>--}}
{{--                                            <option class="form-label" value=" {{ $model->status == 'active' ? 'inactive' : 'active' }}">{{ $model->status == 'active' ? 'Tắt' : 'Bật' }}</option>--}}
{{--                                        </select>--}}

{{--                                        @error('status')--}}
{{--                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <button class="btn btn-primary waves-effect waves-light">Thêm</button>
                                    {{-- <button class="btn btn-waring waves-effect waves-light">Thêm</button> --}}


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
