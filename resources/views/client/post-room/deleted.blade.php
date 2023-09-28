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
                            <th scope="row">1</th>
                            <td class="">
                                <div>
                                    <h5>Nguyễn Quang Phúc</h5>
                                    <p>SDT : 0936219271 </p>
                                    <p>Zalo :0936219271</p>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset($value->image) }}" style="width: 100px;height: 100px;">
                            </td>
                            <td>
                                <div>
                                    <h5>{{ $value->name }}</h5>
                                    <p>Khu vực: {{ $value->address_full }} </p>
                                    <p>Chuyên mục: {{ $value->category_room_id }}</p>
                                    <p> Giá cho thuê: <span style="color: red">{{ $value->price }}VND </span>/ tháng
                                    </p>
                                    <p>Diện tích <span class="fw-bold">{{ $value->acreage }}m²</span></p>
                                </div>
                            </td>
                            <td>15/09/2023</td>
                            <td class="">

                                <a href="{{ route('room_restore', $value->id) }}">Restore</a>
                                <form action="{{ route('room_permanently_delete', $value->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Bạn có muốn xoá')" class="btn btn-danger">
                                        <i class="fa-solid fa-delete-left text-light"></i>
                                    </button>
                                </form>
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
