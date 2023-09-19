@extends('admin.layouts.master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive-table-plugin">
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                               
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th>STT</th>
                                            <th>Tên Gói</th>
                                            <th>Giá</th>
                                            <th>Số Ngày</th>
                                            <th>Mô Tả</th>
                                            <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services_deleted as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->price }}</td>
                                                    <td>{{ $value->date_number }}</td>
                                                    
                                                    <td>{{ $value->description }}</td>
                                                  
                                                    <td class="d-flex"><a onclick="return confirm('Bạn có muốn khôi phục ')" href="{{ route('services.restore', $value->id) }}"
                                                            class="btn btn-primary"><i
                                                                class="fa-solid fa-trash-arrow-up"></i></a>
                                                           
                                                        <form action="{{ route('services.permanently.delete', $value->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button onclick="return confirm('Bạn có muốn xoá')"
                                                                class="btn btn-danger">
                                                                <i class="fa-solid fa-delete-left text-light"></i>
                                                            </button>
                                                        </form>
                                                    </td>
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
        <!-- end row -->

    </div> <!-- container -->
@endsection
@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush