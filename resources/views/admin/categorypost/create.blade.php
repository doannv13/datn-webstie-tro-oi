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
                            <p class=" alert alert-danger">
                                Dữ liệu không hợp lệ vui lòng kiểm tra lại
                            </p>
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{ route('categorypost.store') }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tên</label>
                                        <input type="text" name="name" id="simpleinput"
                                            class="form-control" placeholder="Tên" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="example-textarea" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Trạng thái</label>

                                        <select name="status" id="simpleinput" class="form-control">
                                            <option class="form-label" value="active">Bật</option>
                                            <option class="form-label" value="inactive">Tắt</option>
                                        </select>

                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



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
