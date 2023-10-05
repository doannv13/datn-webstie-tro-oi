@extends('admin.layouts.master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sửa danh mục</h4>
                        @if ($errors->any())
                            <p class=" alert alert-danger col-lg-8">
                                Dữ liệu không hợp lệ vui lòng kiểm tra lại
                            </p>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('category-rooms.update',$data->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tên</label>
                                        <input type="hidden" name="id" value="{{ $data->id }}" class="d-none">
                                        <input type="text" name="name" id="simpleinput"
                                               class="form-control"placeholder="Name"  value="{{$data->name }}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label class="form-label">Slug:</label>
                                        <input type="text" name="type" class="form-control" placeholder="Type"
                                               value="{{$data->slug }}" disabled>
                                        @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description" id="example-textarea" rows="5">{{$data->description }}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary waves-effect waves-light">Thêm</button>
                                    {{-- <button class="btn btn-waring waves-effect waves-light">Thêm</button> --}}
                                    <a href="{{ route('category-rooms.index') }}"
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
