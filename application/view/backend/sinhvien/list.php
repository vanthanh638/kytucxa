<?php if ($listSV == null) echo 'Danh sách trống';
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
<?php } ?>