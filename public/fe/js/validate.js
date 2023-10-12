(function () {
    validate.extend(validate.validators.datetime, {
        parse: function (value, options) {
            return +moment.utc(value);
        },
        format: function (value, options) {
            var format = options.dateOnly
                ? "YYYY-MM-DD"
                : "YYYY-MM-DD hh:mm:ss";
            return moment.utc(value).format(format);
        },
    });
    const constraints = {
        city: {
            presence: {
                message: "city is required",
                allowEmpty: false,
            },
            exclusion: {
                // within: ["nickolas", "ellen"],
                message: "'%{value}' is not allowed",
            },
        },
        district: {
            presence: {
                message: "district is required",
                allowEmpty: false,
            },
            exclusion: {
                // within: ["nickolas", "ellen"],
                message: "'%{value}' is not allowed",
            },
        },
        ward: {
            presence: {
                message: "ward is required",
                allowEmpty: false,
            },
            exclusion: {
                // within: ["nickolas", "ellen"],
                message: "'%{value}' is not allowed",
            },
        },
        address: {
            presence: {
                message: "ward is required",
                allowEmpty: false,
            },
            exclusion: {
                // within: ["nickolas", "ellen"],
                message: "'%{value}' is not allowed",
            },
        },
        name: {
            presence: {
                message: "Trường name bắt buộc nhập",
                allowEmpty: false,
            },
            length: {
                minimum: 3,
                maximum: 20,
            },
            exclusion: {
                within: ["nickolas", "ellen"],
                message: "'%{value}' is not allowed",
            },
        },
        price: {
            presence: {
                message: "Trường price bắt buộc nhập",
                allowEmpty: false,
            },
            format: {
                pattern: "[0-9]+",
                message: "Trường giá không phải là số",
            },
        },
        acreage: {
            presence: {
                message: "Trường price bắt buộc nhập",
                allowEmpty: false,
            },
            format: {
                pattern: "[0-9]+",
                message: "Trường giá không phải là số",
            },
        },
        empty_room: {
            presence: {
                message: "Trường price bắt buộc nhập",
                allowEmpty: false,
            },
            format: {
                pattern: "[0-9]+",
                message: "Trường giá không phải là số",
            },
        },
        description: {
            presence: {
                message: "Trường description bắt buộc nhập",
                allowEmpty: false,
            },
            length: {
                minimum: 3,
                maximum: 20,
            },
        },
        category: {
            validSelect: { message: "Vui lòng chọn một thể loại." },
        },
    };

    $("#form").submit((e) => {
        e.preventDefault();
        let errors = validate($("#form"), constraints) || {};
        $("#error-name").html(errors.name);
        $("#error-city").html(errors.city);
        $("#error-district").html(errors.district);
        $("#error-ward").html(errors.ward);
        $("#error-address").html(errors.address);
        $("#error-price").html(errors.price);
        $("#error-acreage").html(errors.acreage);
        $("#error-empty_room").html(errors.empty_room);
        $("#error-description").html(errors.description);
    });

    $("#name").blur(() => {
        let error = validate.single($("#name").val(), constraints.name) || [""];
        console.log(error);
        $("#error-name").html(error[0]);
    });
    $("#city").blur(() => {
        let error = validate.single($("#city").val(), constraints.city) || [""];
        console.log(error);
        $("#error-city").html(error[0]);
    });
    $("#district").blur(() => {
        let error = validate.single(
            $("#district").val(),
            constraints.district
        ) || [""];
        console.log(error);
        $("#error-district").html(error[0]);
    });
    $("#ward").blur(() => {
        let error = validate.single($("#ward").val(), constraints.ward) || [""];
        console.log(error);
        $("#error-ward").html(error[0]);
    });
    $("#address").blur(() => {
        let error = validate.single(
            $("#address").val(),
            constraints.address
        ) || [""];
        console.log(error);
        $("#error-address").html(error[0]);
    });
    $("#price").blur(() => {
        let error = validate.single($("#price").val(), constraints.price) || [
            "",
        ];
        console.log(error);
        $("#error-price").html(error[0]);
    });
    $("#acreage").blur(() => {
        let error = validate.single(
            $("#acreage").val(),
            constraints.acreage
        ) || [""];
        console.log(error);
        $("#error-acreage").html(error[0]);
    });
    $("#empty_room").blur(() => {
        let error = validate.single(
            $("#empty_room").val(),
            constraints.empty_room
        ) || [""];
        console.log(error);
        $("#error-empty_room").html(error[0]);
    });
    $("#description").blur(() => {
        let error = validate.single(
            $("#description").val(),
            constraints.description
        ) || [""];
        console.log(error);
        $("#error-description").html(error[0]);
    });

    // $("#size").blur(() => {
    //     let error = validate.single($("#size").val(), constraints.size) || [""];
    //     console.log(error);
    //     $("#error-size").html(error[0]);
    // });
    // $("#password").blur(() => {
    //     let error = validate.single(
    //         $("#password").val(),
    //         constraints.password
    //     ) || [""];
    //     $("#error-password").html(error[0]);
    // });
    // $("#confirm-password").blur(() => {
    //     let constraintsConfirm = {
    //         confirmPassword: {
    //             presence: true,
    //             equality: {
    //                 attribute: "password",
    //                 message: "^The passwords does not match",
    //             },
    //         },
    //     };
    //     let confirmPassword = $("#confirm-password").val();
    //     let password = $("#password").val();
    //     let error =
    //         validate({ confirmPassword, password }, constraintsConfirm) || {};
    //     console.log(error);
    //     $("#error-confirm-password").html(error.confirmPassword);
    // });

    // $("#phone").blur(() => {
    //     let error = validate.single($("#phone").val(), constraints.phone) || [
    //         "",
    //     ];
    //     $("#error-phone").html(error[0]);
    // });

    // $("#birthday").change(() => {
    //     let error = validate.single(
    //         $("#birthday").val(),
    //         constraints.birthday
    //     ) || [""];
    //     $("#error-birthday").html(error[0]);
    // });
})();
