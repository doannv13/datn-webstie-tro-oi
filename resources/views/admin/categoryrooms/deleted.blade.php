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
                                                <a href="{{ route('categoryrooms.restore',$item->id) }}" class="btn btn-primary">
                                                    <i class="fa-solid fa-trash-arrow-up mx-2 fs-4"></i></i>
                                                </a>
                                                <form action="{{ route('categoryrooms.permanently-delete',$item->id) }}"
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

    <script src="{{asset('be/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/feather-icons/feather.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('be/assets/js/app.min.js')}}"></script>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <script type="text/javascript"
            src="{{asset('be/https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js')}}"></script>

    <script>
        new DataTable('#tech-companies-1');
        @if (Session::has('message'))
        let type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>
@endpush
