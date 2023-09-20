@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th data-priority="1">Name</th>
                                        <th data-priority="3">Slug</th>
                                        <th data-priority="1">Status</th>
                                        <th data-priority="3">Description</th>
                                        <th data-priority="6" class="d-flex align-items-center">
                                            <a class="btn btn-primary" >Sua</a>
                                            <a class="btn btn-danger" >Xoa</a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>
                                                <div class="switchery-demo">
                                                    <input type="checkbox" checked data-plugin="switchery" data-color="#ff5d48"/>
                                                </div>{{$item->status}}</td>
                                            <td>{{$item->description}}</td>
                                            <th data-priority="6" class="d-flex p-4 gap-2">
                                                <a href="{{ route('restore', $item->id) }}" class="btn btn-primary">
                                                    <i class="fa-solid fa-trash-arrow-up mx-2 fs-4"></i></i>
                                                </a>
                                                <form action="{{ route('categoryrooms.permanently-delete', $item->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                                        <i class="fa-solid fa-trash fs-4 mx-2 text-light"></i>
                                                    </button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive -->

                        </div> <!-- end .table-rep-plugin-->
                    </div> <!-- end .responsive-table-plugin-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>

@endsection

@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
