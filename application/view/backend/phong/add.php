<div class="modal-dialog">
    <div class="modal-content">
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h3 class='modal-title'>Thêm phòng</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <form method="POST" action="index.php?c=phong&a=save" accept-charset="UTF-8" id="Post">
                    <input name="_token" type="hidden" value="OevXx559CuCb66T2XiTa8j6eDn8nV0L7YiVgXGn7">

                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="TenPhong">Tên phòng:</label>
                            <input class="form-control" name="TenPhong" type="text" id="TenPhong" value="" placeholder="Tên phòng">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="IdKhuNha">Khu nhà</label>
                            <select class="form-control" name="IdKhuNha">
                                <?php foreach ($listKhuNha as $khuNha): ?>
                                <option value="<?php echo $khuNha['id'] ?>"><?php echo $khuNha['TenKhuNha'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="SoSV">Số sinh viên tối đa:</label>
                            <input class="form-control" name="SoSV" type="number" id="SoSV" value="" placeholder="Số sinh viên tối đa">
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