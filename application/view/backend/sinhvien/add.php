<div class="modal-dialog">
    <div class="modal-content">
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h3 class='modal-title'>Thêm sinh viên</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <form method="POST" action="index.php?c=sinhvien&a=save" accept-charset="UTF-8" id="form-sinhvien"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="MaSV">Mã sinh viên:</label>
                            <input class="form-control" name="MaSV" type="text" id="MaSV" value="" placeholder="Mã sinh viên">
                        </div>
                        <div class="col-sm-6">
                            <label for="lop">Lớp:</label>
                            <input class="form-control" name="lop" type="text" id="lop" value="" placeholder="Lớp">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="password">Mật khẩu:</label>
                            <input class="form-control" name="password" type="password" id="password" value="" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <label for="re_password">Nhập lại mật khẩu:</label>
                            <input class="form-control" name="re_password" type="password" id="re_password" value="" placeholder="Password">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="TenSV">Tên sinh viên:</label>
                            <input class="form-control" name="TenSV" type="text" id="TenSv" value="" placeholder="Tên sinh viên">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email" type="text" id="email" value="" placeholder="Email">
                            <span style="color:red" id="email_err"></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="gioiTinh">Giới tính:</label> <br>
                            <input type="radio" class="radio-inline" name="GioiTinh" value="Nam" checked> Nam
                            <input type="radio" class="radio-inline" name="GioiTinh" value="Nữ"> Nữ
                        </div>
                        <div class="col-sm-6">
                            <label for="soDT">Điện thoại:</label>
                            <input class="form-control" name="SDT" type="text" id="soDT" value="" placeholder="Điện thoại">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="queQuan">Quê quán: </label>
                            <input class="form-control" name="QueQuan" type="text" id="queQuan" value="" placeholder="Quê quán">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="avatar">Avatar: </label>
                            <input class="form-control" name="avatar" type="file" id="avatar" onchange="viewImg(this)">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <img src="../images/avatar/human.png" height="150px" id="avartar-img-show">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Submit Field -->
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" name="submit" value="Save" id="submit">
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/validate-form.js"></script>