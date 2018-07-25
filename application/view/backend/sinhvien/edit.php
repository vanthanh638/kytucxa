<div class="modal-dialog">
    <div class="modal-content">
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h3 class='modal-title'>Thêm sinh viên</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <form method="POST" action="index.php?c=sinhvien&a=save&id=<?php echo $sinhVien['MaSV'] ?>"
                      accept-charset="UTF-8" enctype="multipart/form-data" id="form-sinhvien">
                    <input name="_token" type="hidden" value="OevXx559CuCb66T2XiTa8j6eDn8nV0L7YiVgXGn7">

                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="MaSV">Mã sinh viên:</label>
                            <input class="form-control" name="MaSV" type="text" id="MaSV" disabled
                                   value="<?php echo $sinhVien['MaSV'] ?>" placeholder="Mã sinh viên">
                        </div>
                        <div class="col-sm-6">
                            <label for="lop">Lớp:</label>
                            <input class="form-control" name="lop" type="text" id="lop"
                                   value="<?php echo $sinhVien['Lop'] ?>" placeholder="Lớp">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default btn-sm" id="change-password">
                                <span class="glyphicon glyphicon-pencil"></span> Đổi mật khẩu
                            </button>
                        </div>
                    </div>
                    <div class="form-group" id="ip-pass" style="display: none;">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="password">Mật khẩu:</label>
                            <input class="form-control" name="password" type="password" id="password"
                                   value="" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <label for="re_password">Nhập lại mật khẩu:</label>
                            <input class="form-control" name="re_password" type="password" id="re_password"
                                   value="" placeholder="Password">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="TenSV">Tên sinh viên:</label>
                            <input class="form-control" name="TenSV" type="text" id="TenSv"
                                   value="<?php echo $sinhVien['TenSV'] ?>" placeholder="Tên sinh viên">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email" type="email" id="email"
                                   value="<?php echo $sinhVien['Email'] ?>" placeholder="Email">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="gioiTinh">Giới tính:</label> <br>
                            <input type="radio" class="radio-inline" name="GioiTinh" value="Nam"
                                   <?php if ($sinhVien['GioiTinh'] == 'Nam') {?>checked <?php } ?>> Nam
                            <input type="radio" class="radio-inline" name="GioiTinh" value="Nữ"
                                   <?php if ($sinhVien['GioiTinh'] == 'Nữ') {?>checked <?php } ?>> Nữ
                        </div>
                        <div class="col-sm-6">
                            <label for="soDT">Điện thoại:</label>
                            <input class="form-control" name="SDT" type="text" id="soDT"
                                   value="<?php echo $sinhVien['SDT'] ?>" placeholder="Điện thoại">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="queQuan">Quê quán: </label>
                            <input class="form-control" name="QueQuan" type="text" id="queQuan"
                                   value="<?php echo $sinhVien['QueQuan'] ?>" placeholder="Quê quán">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="avatar">Avatar: </label>
                            <input class="form-control" name="avatar" type="file" onchange="viewImg(this)">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <?php if ($sinhVien['avatar'] != '') { ?>
                            <img src="../images/avatar/<?php echo $sinhVien['avatar'] ?>" height="150px" id="avartar-img-show">
                            <?php } else { ?>
                            <img src="../images/avatar/human.png" height="150px" id="avartar-img-show">
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Submit Field -->
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" name="submit" value="Save">
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#change-password").click(function() {
            $("#ip-pass").toggle();
        });
    });
</script>
<script src="js/validate-form.js"></script>