<div class="modal-dialog">
    <div class="modal-content">
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h3 class='modal-title'>Thêm sinh viên</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <form method="POST" action="index.php?c=hopdong&a=save" accept-charset="UTF-8" id="Post">
                    <input name="_token" type="hidden" value="OevXx559CuCb66T2XiTa8j6eDn8nV0L7YiVgXGn7">

                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="MaSV">Sinh viên:</label><br>
                            <select name="MaSV" id="MaSV" class="MySelect2" style="width: 100%;">
                                <option value="0">Sinh viên</option>
                                <?php foreach ($listSV as $sinhVien) : ?>
                                    <option value="<?php echo $sinhVien['MaSV'] ?>"><?php echo $sinhVien['TenSV'].' ('.$sinhVien['MaSV'].')' ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-12">
                            <label for="MaSV">Phong:</label><br>
                            <select name="idPhong" id="idPhong" class="MySelect2" style="width: 100%;">
                                <?php foreach ($listPhong as $phong) : ?>
                                    <option value="<?php echo $phong['id'] ?>"><?php echo $phong['TenPhong'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="email">Ngày bắt đầu:</label>
                            <input class="form-control" name="NgayBatDau" type="date" value="" placeholder="">
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Ngày kết thúc:</label>
                            <input class="form-control" name="NgayKetThuc" type="date" value="" placeholder="">
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
    $('.MySelect2').select2();
</script>