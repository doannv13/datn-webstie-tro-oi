@extends('client.layouts.master')
@section('content')
<div
>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Login section start -->
            <div class="login-section">
                <div class="container-fluid">
                    <div class="modal-header">
                    </div>
                    <div class="row login-box">
                        <div class="form-section">
                            <div class="form-inner">
                                <h3>Cập nhật mật khẩu</h3>
                                <form method="POST" name="register" action="{{ route('changepassword.update',auth()->user()->id) }}" onsubmit="return ValidateRegister()" enctype="multipart/form-data" ">
                                    @csrf
                                    @method('put')
                                    <div class="form-group clearfix">
                                        <input id="password" type="password" placeholder="Mật khẩu hiện tại" class="form-control @error('password') is-invalid @enderror" name="old_password"  autocomplete="new-password">
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input id="password" type="password" placeholder="Mật khẩu mới" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input id="password_confirmation" type="password" placeholder="Xác nhận mật khẩu" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                    <div class="form-group clearfix">
                                        <button type="submit" onclick="ValidateRegister()" class="btn-md btn-theme w-100">
                                            Cập nhật
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login section end -->
        </div>
    </div>
</div>
<script>
    function ValidateRegister(){
        let flag= true;
        let dataPhone =document.querySelector('#phone).value
        if(dataPhone.trim()===''){
            flag=false;
            document.querySelector('#error_phone').innerHTML='KH BỎ TRỐNG'
        }
        return flag;
    }
</script>
@endsection
