@extends('admin.layouts.master')
@section('content')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Cập nhật</h4>
                            </div>

                            <form action="{{ route('facilities.update', $data->id) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="" class="form-label">Tên tiện ích <span
                                            class="text-danger">*</span></label>
                                    <input name="name" type="text" value="{{ $data->name }}" class="form-control"
                                        placeholder="Wifi">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="icon" value="{{ $data->icon }}" class="form-control"
                                        placeholder="fas fa-wifi">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Mô tả <span
                                            class="text-danger">*</span></label>
                                    <textarea value="{{ $data->description }}" name="description" class="form-control" cols="30" rows="5"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Cập nhật </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
