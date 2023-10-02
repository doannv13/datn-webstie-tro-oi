@extends('client.layouts.partials.l-sidebar')
@section('main')
    <div class="container pt-2">
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb"><a href="index.html">Home <span> / </span></a></li>
                <li class="breadcrumb-item active">Blog Left Sidebar</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <!-- Contact form start -->
            <div class="contact-form">
                <form action="{{ route('room-post.update', $postroom->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $postroom->id }}" class="d-none">

                    <div class="sidebar row p-3">
                        <h4>Khu vực</h4>
                        <hr class="dashed-line">
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="form-group">
                                <label class="input-group">Tỉnh / thành phố:<span class="text-danger">*</span> </label>
                                <select class="form-select mb-3" id="city" name="city_id">

                                    {{-- <option value="">Chọn tỉnh / thành phố</option> --}}
                                    {{-- @foreach ($cities as $city) --}}
                                    <option value="{{ $cities->name }}">{{ $cities->name }}</option>
                                    {{-- @endforeach --}}
                                </select>
                                @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Quận / Huyện:<span class="text-danger">*</span></label>
                                <select class="form-select  mb-3" id="district" name="district_id">
                                    <option value="{{ $districts->name }}">
                                        {{ $districts->name }}</option>
                                </select>
                                @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Phường / Xã:<span class="text-danger">*</span>
                                </label>
                                <select class="form-select mb-3" name="ward_id" id="ward">

                                    <option value="{{ $wards->name }}"> {{ $wards->name }}</option>
                                </select>
                                @error('ward_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label class="input-group">Địa chỉ chính xác:<span class="text-danger">*</span></label>
                            <div class="form-group ">
                                <input class="form-control" type="text" name="address" id="address"
                                    placeholder="Nhập số nhà , tên đường phố " aria-label="Nhập số nhà , tên đường phố"
                                    value="{{ $postroom->address }}">
                            </div>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 mt-3">
                            <label class="input-group">Địa chỉ của bạn sẽ hiển thị như sau:<span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input class="form-control" type="text" id="full_address" name="address_full"
                                    placeholder="Nhập số nhà , tên đường phố " aria-label="Nhập số nhà , tên đường phố"
                                    readonly value="{{ $postroom->address_full }}">
                            </div>
                            @error('empty_room')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sidebar row p-3">
                        <h4 class="mb-3">Thông tin mô tả</h4>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <label class="input-group">Tiêu đề:<span class="text-danger">*</span></label>
                            <div class="form-group ">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Nhập tiêu đề của bài viết" aria-label="Nhập tiêu đề của bài viết"
                                    value="{{ $postroom->name }}">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Chuyên mục cho thuê:<span class="text-danger">*</span></label>
                                <select class="form-select mb-3" name="category_room_id">
                                    <option value="">Chọn chuyên mục</option>
                                    @foreach ($categoryRooms as $categoryRoom)
                                        <option value="{{ $categoryRoom->id }}"
                                            {{ $postroom->category_room_id == $categoryRoom->id || old('category_room_id') == $categoryRoom->id ? 'selected' : false }}>
                                            {{ $categoryRoom->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_room_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Giá cho thuê: <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" name="price" placeholder="VD: 3 triệu 500 nghìn thì nhập 3.5"
                                        class="form-control" value="{{ $postroom->price }}">
                                    <span class="input-group-text">/Tháng</span>
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Diện tích:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" placeholder="Diện tích" name="acreage" class="form-control"
                                        value="{{ $postroom->acreage }}">
                                    <span class="input-group-text">m²</span>
                                </div>
                                @error('acreage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Số lượng phòng trống:<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Số lượng phòng trống" name="empty_room"
                                    class="form-control" value="{{ $postroom->empty_room }}">
                            </div>
                            @error('empty_room')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <div class="form-group ">
                                <label class="input-group">Trọ tự quản<span class="text-danger">*</span></label>
                                <select class="form-select mb-3" name="managing">
                                    <option value="0" {{ $postroom->managing == '0' ? 'selected' : false }}>Trọ tự
                                        quản
                                    </option>
                                    <option value="yes" {{ $postroom->managing == 'yes' ? 'selected' : false }}>Có
                                    </option>
                                    <option value="no" {{ $postroom->managing == 'no' ? 'selected' : false }}>Không
                                    </option>
                                </select>
                            </div>
                            @error('managing')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-lg-12 col-md-12 mb-3">
                            <label class="input-group">Mô tả chi tiết:<span class="text-danger">*</span></label>
                            <div class="form-group message">
                                <textarea class="form-control " style="height: 110px" name="description" placeholder="Write message"
                                    aria-label="Write message">{{ $postroom->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <label class="input-group">Khu vực xung quanh:<span class="text-danger">*</span></label>
                            <div class="row p-3 ">
                                @foreach ($surrounding as $surround)
                                    <div class="form-check col-md-3 col-4 mb-2">
                                        <input class="form-check-input" name="surrounding[]" type="checkbox"
                                            value="{{ $surround->id }}"
                                            {{ in_array($surround->id, $surroundingArray) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $surround->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('surrounding')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-lg-12 col-md-12 mb-3">
                            <label class="input-group">Tiện ích:<span class="text-danger">*</span></label>
                            <div class="row p-3 ">
                                @foreach ($facilities as $facility)
                                    <div class="form-check col-md-3 col-4 mb-2">
                                        <input class="form-check-input" name="facility[]" type="checkbox"
                                            value="{{ $facility->id }}"
                                            {{ in_array($facility->id, $facilityArray) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $facility->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('facility')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Upload file -->
                        <!-- Ảnh nổi bật -->
                        <div class="col-lg-12 col-md-12 mb-3">
                            <h4 class="header-title">Tải lên ảnh nổi bật</h4>
                            <p class="sub-header">
                                Kéo hoặc chọn file
                            </p>
                            <input type="file" data-plugins="dropify" data-height="300" name="imageroom" />
                            <div class="col-4">
                                <img src="{{ $postroom->imageroom ? asset($postroom->imageroom) : 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT7TiLhYLLSXgfz-TPjFR50a7J_PzqFjXNm41zbdPbYUREBFKj3' }}"
                                    alt="" style="width: 70px; height: 70px" id="image_preview">
                            </div>
                        </div>
                        <!-- Nhiều ảnh -->
                        <div class="col-lg-12 col-md-12 mb-3">
                            <h4 class="header-title">Ảnh chi tiết phòng</h4>
                            <p class="sub-header">
                                Kéo hoặc chọn file
                            </p>
                            <input type="file" class="form-control" name="images[]" placeholder="Enter title"
                                multiple>
                      
                            <div class="dropzone-previews mt-3" id="file-previews">
                            </div>
                    
                            <div class="d-none" id="uploadPreviewTemplate">
                                <div class="card mt-1 mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                                    alt="">
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                <p class="mb-0" data-dz-size></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                    <i class="dripicons-cross"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="sidebar row p-3">
                        <h4>Liên hệ</h4>
                        <hr class="dashed-line">

                        <div class="row">
                            <div class="col-lg-6 col-md-4 mb-3">
                                <div class="form-group ">
                                    <label class="input-group">Họ và tên: <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="fullname" placeholder="Nhập họ tên của bạn"
                                            value="{{ $postroom->fullname }}" class="form-control">
                                    </div>
                                    @error('fullname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 mb-3">
                                <div class="form-group ">
                                    <label class="input-group">Số điện thoại:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" value="{{ $postroom->phone }}"
                                            placeholder="Nhập số điện thoại của bạn" name="phone" class="form-control">
                                    </div>
                                </div>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-4 mb-3">
                                <div class="form-group ">
                                    <label class="input-group">Email: <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" value="{{ $postroom->email }}" name="email"
                                            placeholder="Nhập email của bạn" class="form-control">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 mb-3">
                                <div class="form-group ">
                                    <label class="input-group">Zalo:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" value="{{ $postroom->zalo }}"
                                            placeholder="Nhập số Zalo của bạn" name="zalo" class="form-control">
                                    </div>
                                    @error('zalo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- End upload file -->

                    <div class="sidebar row p-3">
                        <div class="col-lg-12 col-md-12 clearfix">
                            <div class=" text-center pull-left">
                                <a href="{{ route('room-post.index') }}" class="btn-md btn-theme btn-4 btn-7">Quay lại
                                    danh sách</a>

                            </div>
                            <div class="send-btn text-center d-flex gap-2 pull-right">
                                <button type="submit" class="btn-md  btn-danger btn-7">Hủy
                                </button>
                                <button type="submit" class="btn-md btn-theme btn-4 btn-7">Sửa
                                    tin đăng mới
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Contact form end -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var full_address = document.getElementById("full_address");
        var address = document.getElementById("address");
        var thanhpho1 = document.getElementById("thanhpho1");
        // console.log(phuongxa1.value);
        var thanhpho;
        var quanhuyen;
        var xaphuong;
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        // console.log(phuongxa1.value);
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);

        });

        function renderCity(data) {
            for (const x of data) {
                var opt = document.createElement('option');
                opt.value = x.Name;
                opt.text = x.Name;
                var asd = x.Id;
                opt.setAttribute('data-id', x.Id);
                citis.options.add(opt);
            }

            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                    for (const k of result[0].Districts) {
                        var opt = document.createElement('option');
                        opt.value = k.Name;
                        opt.text = k.Name;
                        opt.setAttribute('data-id', k.Id);
                        district.options.add(opt);
                    }
                    var selectedThanhPho = citis.options[citis.selectedIndex];
                    console.log(selectedThanhPho.textContent);
                    thanhpho = selectedThanhPho.textContent;
                }
            };

            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this
                            .selectedIndex]
                        .dataset.id)[0].Wards;

                    for (const w of dataWards) {
                        var opt = document.createElement('option');
                        opt.value = w.Name;
                        opt.text = w.Name;
                        opt.setAttribute('data-id', w.Id);
                        wards.options.add(opt);

                    }
                    // district.value + '-' +
                    var selectedQuanHuyen = district.options[district.selectedIndex];
                    quanhuyen = selectedQuanHuyen.textContent
                }
            };

            wards.addEventListener("change", function() {
                var selectedXaPhuong = wards.options[wards.selectedIndex];
                xaphuong = selectedXaPhuong.textContent;
                full_address.value = xaphuong + " - " + quanhuyen + " - " + thanhpho;
            });


            address.addEventListener("input", function() {
                var addressValue = address.value;
                full_address.value = addressValue + " - " + xaphuong + " - " + quanhuyen + " - " + thanhpho;
            });
        }
    </script>
@endpush
