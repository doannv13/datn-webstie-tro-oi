@extends('admin.layouts.master')
@section('title', 'Danh sách bài viết')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Danh sách bài viết</h5>
                <div class="table-responsive">
                    <a class="btn btn-success mb-2" href="{{ route('post.create') }}">Thêm mới</a>
                    <table id="tech-companies-1" class="table table-centered mb-0">
                        <thead>
                        <tr>
                            <th class="col-0.5">#</th>
                            <th class="col-1">Tiêu đề</th>
                            <th class="col-1">Ảnh</th>
                            <th class="col-2">Mổ tả ngắn</th>
                            <th class="col-2">Content</th>
                            <th class="col-1.5">Slug</th>
                            <th class="col-1">ID Admin</th>
                            <th class="col-1">Ngày đăng tải</th>
                            <th class="col-1">Trạng thái</th>
                            <th class="col-1">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($model as $key => $value)
                            <tr id="row_@item.ID">
                                <td class="tabledit-view-mode">{{ $value->id }}</td>
                                <td class="tabledit-view-mode">{!! substr($value->title, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">
                                    @if ($value->image && asset($value->image))
                                        <img src="{{ asset($value->image) }}" alt="" style="width: 80px; height: 80px">
                                    @else
                                        <img src="{{ asset('no_image.jpg') }}" alt="" style="width: 80px; height: 80px">
                                    @endif
                                </td>
                                <td class="tabledit-view-mode">{!! substr($value->metaDescription, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{!! substr($value->description, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{{ $value->slug }}</td>
                                <td class="tabledit-view-mode">{{ $value->id_admin }}</td>
                                <td class="tabledit-view-mode">{{ $value->updated_at }}</td>
                                <td>
                                    <input data-id="{{ $value->id }}" class="toggle-class" type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-onlabel="Bật" data-offlabel="Tắt"
                                        {{ $value->status == 'active' ? 'checked' : '' }}>
                                </td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <a href="{{ route('post.edit', $value->id) }}">
                                        <button type="submit" class="btn btn-primary text-center my-1"
                                                style="width: 45px;"> <!-- Đặt kích thước cố định là 100px -->
                                            <i class="fa-solid fa-pen-to-square fs-4"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('post.destroy', $value->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger my-1" style="width: 45px;"
                                                onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                            <!-- Đặt kích thước cố định là 100px -->
                                            <i class="fa-solid fa-trash fs-4"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- end .table-responsive-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
@endsection


@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
