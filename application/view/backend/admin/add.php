<div class="modal-dialog">
    <div class="modal-content">
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h3 class='modal-title'>Thêm user</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <form method="POST" action="index.php?c=user&a=save" accept-charset="UTF-8" id="form-user"
                     enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="TenPhong">Username:</label>
                            <input class="form-control" name="username" type="text" id="username" value="" placeholder="Username">
                        </div>
                         <div class="col-sm-6">
                            <label for="TenPhong">Fullname:</label>
                            <input class="form-control" name="fullname" type="text" id="fullname" value="" placeholder="Username">
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
<script src="js/validate-form.js"></script>