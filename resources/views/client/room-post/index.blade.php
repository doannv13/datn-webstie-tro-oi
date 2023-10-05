@extends('client.layouts.partials.l-sidebar')
@section('main')
    <div class="container pt-2">
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb"><a href="index.html">Home <span> / </span></a></li>
                <li class="breadcrumb-item active">Danh sách bài viết</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <!-- Contact form start -->
            <div class="table-responsive">
                <table class="table ">
                    <thead class="table-light">
                        <th>STT</th>
                        <th>Liên hệ</th>
                        <th>Ảnh chính</th>
                        <th>Thông tin mô tả</th>
                        <th>Ngày đăng</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="align-items-center p-4">
                        @foreach ($data as $key => $value)
                            <tr class="">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="">
                                    <div>
                                        <h5>{{ $value->fullname }}</h5>
                                        <p>SĐT : {{ $value->phone }} </p>
                                        <p>Zalo : {{ $value->zalo }}</p>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset($value->image) }}" style="width: 100px;height: 100px;">
                                </td>
                                <td>
                                    <div>
                                        <h5>{{ $value->name }}</h5>
                                        <p>Khu vực: {{ $value->address_full }} </p>
                                        <p>Chuyên mục: {{ $value->categoryroom->name }}</p>
                                        <p> Giá cho thuê: <span style="color: red">{{ $value->price }}VND </span>/ tháng
                                        </p>
                                        <p>Diện tích <span class="fw-bold">{{ $value->acreage }}m²</span></p>
                                    </div>
                                </td>
                                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                <td class="">
                                    <div class="d-flex m-2">
                                        <form action="{{ route('room-post.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger my-1" style="width: 45px;"
                                                onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fa-solid fa-trash fs-4"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('room-post.edit', $value->id) }}">
                                            <button type="submit" class="btn btn-primary text-center my-1 m-2"
                                                style="width: 45px;"> <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fa-solid fa-pen-to-square fs-4"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <button class="btn btn-primary px-4"><a href="{{route('services-room-post.index')}}" >Mua gói dịch vụ</a></button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <!-- Contact form end -->
            </div>
        </div>
    </div>
@endsection
