@extends('admin.layouts.master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Cài đặt</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('setting.update', $data) }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Logo</label>
                                        <input id="image" type="file" class="form-control" name="logo"
                                            accept="image/*"><br>
                                        @if ($data->logo && asset($data->logo))
                                            <img id="image_preview" src="{{ asset($data->logo) }}" alt=""
                                                width="100px" height="100px">
                                        @else
                                            <img id="image_preview" src="{{ asset('no_image.jpg') }}" alt=""
                                                width="100px" height="100px">
                                        @endif
                                        @error('logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Điện thoại hỗ trợ</label>
                                        <input type="text" name="support_phone" class="form-control"
                                            value="{{ old('support_phone', $data->support_phone ?? '') }}">
                                        @error('support_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-palaceholder" class="form-label">Email</label>
                                        <input type="email" name="email" id="example-palaceholder" class="form-control"
                                            value="{{ old('email', $data->email ?? '') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-palaceholder" class="form-label">Địa chỉ</label>
                                        <input type="text" name="address" id="example-palaceholder" class="form-control"
                                            value="{{ old('address', $data->address ?? '') }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-palaceholder" class="form-label">Zalo hỗ trợ</label>
                                        <input type="text" name="zalo" id="example-palaceholder" class="form-control"
                                            value="{{ old('zalo', $data->zalo ?? '') }}">
                                        @error('zalo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập
                                        nhật</button>

                                </form>

                            </div> <!-- end col -->

                        </div>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
        <!-- Start Content-->


    </div> <!-- container -->
    </div> <!-- container -->
@endsection
