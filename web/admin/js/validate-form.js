$(document).ready(function() {
    $('#form-sinhvien').validate({
        rules: {
            "MaSV": {
                required: true,
            },
            "lop": {
                required: true,
            },
            "password": {
                minlength: 6,
                required: true,
            },
            "re_password": {
                equalTo: "#password",
            },
            "TenSV": {
                required: true,
            },
        },
        messages: {
            "MaSV": {
                required: "<span style=\"color:red\" >  Nhập mã sinh viên..! </span>",
            },
            "lop": {
                required: "<span style=\"color:red\" >  Nhập lớp..! </span>",
            },
            "password": {
                minlength: "<span style=\"color:red\" >  Nhập password ít nhất 6 ký tự..! </span>",
                required: "<span style=\"color:red\" >  Nhập password..! </span>",
            },
            "re_password": {
                equalTo: "<span style=\"color:red\" >  Mật khẩu không trùng khớp..! </span>",
            },
            "TenSV": {
                required: "<span style=\"color:red\" >  Nhập tên sinh viên..! </span>",
            },
        }
    });
    $("#submit").click(function() {
        validateEmail();
    });
    $("#email").keyup(function() {
        validateEmail();
    });
    $('#form-user').validate({
        rules: {
            "username": {
                required: true,
            },
            "password": {
                minlength: 6,
                required: true,
            },
            "re_password": {
                equalTo: "#password",
            },
            "fullname": {
                required: true,
            },
        },
        messages: {
            "username": {
                required: "<span style=\"color:red\" >  Nhập username..! </span>",
            },
            "password": {
                minlength: "<span style=\"color:red\" >  Nhập password ít nhất 6 ký tự..! </span>",
                required: "<span style=\"color:red\" > Nhập password..! </span>",
            },
            "re_password": {
                equalTo: "<span style=\"color:red\" >  Mật khẩu không trùng khớp..! </span>",
            },
            "fullname": {
                required: "<span style=\"color:red\" > Nhập fullname..! </span>",
            },
        },
    });
});
function validateEmail() {
    var email = $("#email").val();
    if ($.trim(email).length == 0 ) {
        $("#email_err").text("Email không được để trống..!");
    } else {
        var re = /^[A-Z0-9._%+-]+@[A-Z0-9-]+(\.+.[A-Z]{1,2})*$/igm;
        if (re.test(email)){
            $("#email_err").text("");
            return true;
        }
        else {
            $("#email_err").text("Email phải đúng định dạng..!");
        }
    }
}
function viewImg(img) {
    var fileReader = new FileReader;
    fileReader.onload = function(img) {
        var avartarShow = document.getElementById("avartar-img-show");

        avartarShow.src = img.target.result
    }, fileReader.readAsDataURL(img.files[0])
}