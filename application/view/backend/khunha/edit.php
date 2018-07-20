<div class="modal-dialog">
    <div class="modal-content">
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h4 class='modal-title'>Chỉnh sửa thông tin</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <form method="POST" action="index.php?c=khunha&a=save&id=<?php echo $khuNha['id'] ?>" accept-charset="UTF-8" id="Post">
                    <input name="_token" type="hidden" value="OevXx559CuCb66T2XiTa8j6eDn8nV0L7YiVgXGn7">

                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="TenKhuNha">Tên khu nhà:</label>
                            <input class="form-control" name="TenKhuNha" type="text" id="TenKhuNha" value="<?php echo $khuNha['TenKhuNha']; ?>">
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