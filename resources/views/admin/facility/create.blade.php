@extends('admin.layouts.master')
@section('content')

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Thêm mới</h4>
                        </div>

                        <form action="{{ route('facilities.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="" class="form-label">Tên tiện ích</label>
                                <input class="form-control" name="name" type="text" >
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="" class="form-label">Icon</label>
                                    <input type="file" name="icon" id="image" accept="image/*"
                                    class="form-control" class="@error('image') is-invalid @enderror">   
                                    {{-- @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror                              --}}
                                </div>
                                <div class="col-4">
                                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT7TiLhYLLSXgfz-TPjFR50a7J_PzqFjXNm41zbdPbYUREBFKj3" alt="" style="width: 70px; height: 70px" id="image_preview">
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3 text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Thêm mới </button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

               
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>

@endsection