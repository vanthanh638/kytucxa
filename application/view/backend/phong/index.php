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
                Quản lý phòng
                <small>Danh sách phòng</small>
            </h1>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" onclick="add()">
                Thêm phòng
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
                                    <th>Tên phòng</th>
                                    <th>Khu nhà</th>
                                    <th width="100px">Số SV</th>
                                    <th width="100px">Đã ở</th>
                                    <th class="text-center" width="200px">Chức năng</th>
                                </tr>
                                <?php foreach ($listPhong as $phong): ?>
                                <tr>
                                    <td><?php echo $phong['TenPhong']; ?></td>
                                    <?php foreach ($listKhuNha as $khuNha):
                                        if ($phong['IdKhuNha'] == $khuNha['id']) {
                                    ?>
                                    <td><?php echo $khuNha['TenKhuNha']; ?></td>
                                    <?php }
                                    endforeach; ?>

                                    <td><?php echo $phong['SoSV']; ?></td>
                                    <td><?php echo $phong['DaO']; ?></td>
                                    <td class="text-center">
                                      <div class="btn-group">
                                          <a onclick="edit(<?php echo $phong['id'] ?>)" href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                          <a href="index.php?c=phong&a=delete&id=<?php echo $phong['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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
                url: 'index.php?c=phong&a=edit',
                type: 'get',
                data:{id: id},
                success:function(result){
                    $('#myModal').html(result);
                }
            });
        }
        function add() {
            $.ajax({
                url: 'index.php?c=phong&a=add',
                type: 'get',
                data:{},
                success:function(result){
                    console.log(result);
                    $('#myModal').html(result);
                }
            });
        }
    </script>

<?php require_once(PATH_APPLICATION.'/view/backend/layouts/footer.php'); ?>