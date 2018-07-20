<?php require_once(PATH_APPLICATION.'/view/backend/layouts/header.php'); ?>

    <header class="main-header">
        <a href="index.php?c=sinhvien" class="logo">
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>Admin</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <?php require_once(PATH_APPLICATION.'/view/backend/layouts/menu.php'); ?>
        </nav>
    </header>
    <aside class="main-sidebar">
        <?php require_once(PATH_APPLICATION.'/view/backend/layouts/leftbar.php'); ?>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="pull-left">
                Quản lý hợp đồng
                <small>Danh sách hợp đồng</small>
            </h1>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" onclick="add()">
                Thêm hợp đồng
            </button>
        </section>
        <section class="content">
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['success'])):
                        ?>
                        <div class="alert alert-success"><p><strong><?php echo $_SESSION['success']; ?></strong></p></div>
                        <?php
                        unset($_SESSION['success']);
                    elseif (isset($_SESSION['danger'])):
                        ?>
                        <div class="alert alert-danger"><p><strong><?php echo $_SESSION['danger']; ?></strong></p></div>
                        <?php
                        unset($_SESSION['danger']);
                    endif
                    ?>
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Phòng</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th class="text-center" width="200px">Chức năng</th>
                                </tr>
                                <?php foreach ($listHD as $hd): ?>
                                <tr>
                                    <?php foreach ($listSV as $sv):
                                        if ($sv['MaSV'] == $hd['MaSV']) { ?>
                                    <td><?php echo $sv['TenSV']; ?></td>
                                    <?php }
                                    endforeach; ?>
                                    <?php foreach ($listPhong as $phong):
                                        if ($phong['id'] == $hd['idPhong']) { ?>
                                            <td><?php echo $phong['TenPhong']; ?></td>
                                        <?php }
                                    endforeach; ?>
                                    <td><?php echo $hd['NgayBatDau']; ?></td>
                                    <td><?php echo $hd['NgayKetThuc']; ?></td>
                                    <td class="text-center">
                                      <div class="btn-group">
                                          <a onclick="edit(<?php echo $hd['id'] ?>)" href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                          <a href="index.php?c=hopdong&a=delete&id=<?php echo $hd['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                      </div>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </div>
    <div id="myModal" class="modal fade" role="dialog">

    </div>
    <script>
        function edit(id) {
            $.ajax({
                url: 'index.php?c=sinhvien&a=edit',
                type: 'get',
                data:{id: id},
                success:function(result){
                    $('#myModal').html(result);
                }
            });
        }
        function add() {
            $.ajax({
                url: 'index.php?c=sinhvien&a=add',
                type: 'get',
                data:{id: null},
                success:function(result){
                    console.log(result);
                    $('#myModal').html(result);
                }
            });
        }
    </script>

<?php require_once(PATH_APPLICATION.'/view/backend/layouts/footer.php'); ?>