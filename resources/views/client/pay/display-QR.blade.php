@extends('client.layouts.master')
@section('content')
    <div class="container mx-auto p-5" style="max-width: 700px;">
        <div class="modal-header bg-secondary-subtle btn">
            <h1 class="modal-title fs-5 p-3 ">Thanh toán online</h1>
        </div>
        <!-- content -->
        <div class="d-flex justify-content-between p-3">
            <div class="text-center">
                <p class="fw-bolder">Quét QR để thanh toán hóa đơn.</p>
                <img src="{{asset('fe/img/pay/image_10.png')}}" style="max-width: 200px; max-height: 200px;">
                <p class="fw-medium">Ngân hàng: MB</p>
                <p class="fw-medium">STK:0345673127</p>

                <p class="fw-medium px-5">Thời gian quét mã QR để thanh toán còn <span class="fw-bolder "
                        style="color: #E24343;">4.15 s</span>.</p>
            </div>
            <div class="">
                <p class="fw-medium">Khách hàng: <span class="">Nguyễn Quốc V</span></p>
                <p class="fw-medium">Mã đơn hàng: <span class="fw-bolder">034567</span></p>
                <p class="fw-medium">Tổng tiền: <span class="fw-bolder" style="color: #E24343;">55.000 VND</span></p>
                <p class="fw-medium">Nội dung:
                <p class="fw-medium">TTHD_MÃ ĐƠN HÀNG_TÊN KHÁCH HÀNG</p>
                </p>
            </div>
        </div>
        <!-- text -->
        <div class="text-center px-5">
            <p class="fw-medium ">Sau khi thanh toán thành công vui lòng chờ xác nhận đơn hàng.</p>
        </div>
        <button type="button" onclick="goBack();" class="btn text-white mt-4 fw-semibold px-3 py-2 m-2 btn-primary">Quay
            lại</button>
    </div>
    @endsection
    @push('scripts')
    <script>
        function goBack() {
            location.replace("checkout-pay.html");
        }
    </script>
    @endpush
