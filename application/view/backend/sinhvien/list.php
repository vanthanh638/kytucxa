<?php if ($listSV == null) echo 'Không tìm thấy kết quả';
else { ?>
    <table class="table table-bordered">
        <tr>
            <th width="100px">Mã SV</th>
            <th>Họ tên</th>
            <th>Lớp</th>
            <th>Giới tính</th>
            <th>Số ĐT</th>
            <th class="text-center" width="200px">Chức năng</th>
        </tr>
        <?php foreach ($listSV as $sv): ?>
            <tr>
                <td><?php echo $sv['MaSV']; ?></td>
                <td><?php echo $sv['TenSV']; ?></td>
                <td><?php echo $sv['Lop']; ?></td>
                <td><?php echo $sv['GioiTinh']; ?></td>
                <td><?php echo $sv['SDT']; ?></td>
                <td class="text-center">
                    <div class="btn-group">
                        <a onclick="edit(<?php echo $sv['MaSV'] ?>)" href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="index.php?c=sinhvien&a=delete&id=<?php echo $sv['MaSV']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php if ($cPage > 1) { ?>
        <div>
            <ul class="pagination pull-left">
                <?php if ($page != 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php } ?>
                <?php for ($i = 1; $i <= $cPage; $i++) { ?>
                    <li class="page-item <?php if ($i == $page) echo 'active' ?>"><a id="page-<?php echo $i ?>" class="page-link" onclick="searchPage(<?php echo $i ?>)" href="#"><?php echo $i ?></a></li>
                <?php } ?>
                <!--                                <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                <!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <?php if ($page != $cPage) { ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
<?php } ?>
<script>
    function searchPage(page) {
        var masv = $('#smasv').val();
        var tensv = $('#stensv').val();
        var lop = $('#slop').val();
        if (masv != '') {
            masv = parseInt(masv);
        }
        $.ajax({
            url: 'index.php?c=sinhvien&a=search',
            type: 'POST',
            data: {
                masv: masv,
                tensv: tensv,
                lop: lop,
                p: page
            },
            success:function(result) {
                $("#list").html(result);
            }
        });
    }
</script>
