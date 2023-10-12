@extends('admin.layouts.master')
@section('title', 'Gán quyền')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="my-2">Gán quyền</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('roles-permissions.update', $role->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="example-palaceholder" class="form-label">Tên vai trò</label>
                                        <input class="form-control" type="text" value="{{ $role->name }}"
                                            name="name" readonly>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultAll">
                                        <label class="form-check-label" for="flexCheckDefaultAll">Tất cả quyền</label>
                                    </div>


                                    <div class="col-12 my-4">
                                        <div class="row">
                                            <?php
                                            $abc = '';
                                            $len = count($permissions);
                                            ?>
                                            @foreach ($permissions as $key => $value)
                                                <?php
                                                if ($key === 0) {
                                                    echo '<div class="col-4">';
                                                }

                                                if ($abc != substr($value->name, 0, strpos($value->name, '-')) && $key === 0) {
                                                    $abc = substr($value->name, 0, strpos($value->name, '-'));

                                                    echo '<label>' . $abc . '</label><div class="block">';
                                                } elseif ($abc != substr($value->name, 0, strpos($value->name, '-')) && $key !== 0) {
                                                    $abc = substr($value->name, 0, strpos($value->name, '-'));
                                                    echo '</div></div><div class="col-md-4">';
                                                    echo '<label>' . $abc . '</label><div class="block">';
                                                }
                                                ?>
                                                <div class="form-check col-4">
                                                    <input class="form-check-input" name="permission[]" type="checkbox"
                                                        value="{{ $value->id }}" id="flexCheckDefault{{ $value->id }}"
                                                        {{ $role->hasPermissionTo($value->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $value->id }}">{{ $value->name }}</label>
                                                </div>
                                                <?php
                                                if ($key === $len - 1) {
                                                    echo '</div></div>';
                                                }
                                                ?>
                                            @endforeach
                                        </div>
                                        @error('permission')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light col-1 me-2">Lưu</button>
                                    <a href="{{ route('roles-permissions.index') }}"
                                        class="btn btn-warning waves-effect text-light col-1">Trở
                                        về</a>
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
@push('scripts')
    <script type="text/javascript">
        $('#flexCheckDefaultAll').click(function() {
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked', true);
            } else {
                $('input[type = checkbox]').prop('checked', false);
            }
        });
    </script>
@endpush
