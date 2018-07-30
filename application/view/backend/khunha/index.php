<?php require_once(PATH_APPLICATION.'/view/backend/layouts/header.php'); ?>

    <header class="main-header">
        <a href="index.php?c=ga" class="logo">
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
            <h1 class="header">
                Quản lý khu nhà
            </h1>
        </section>
        <section class="content">
            <div class="row">
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
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>Mã SV</label>
                                    <input type="text" name="smasv" id="smasv" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>Tên sinh viên</label>
                                    <input type="text" name="stensv" id="stensv" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <label>Lớp</label>
                                    <input type="text" name="slop" id="slop" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label></label><br>
                                    <button class="btn btn-primary pull-right" id="search">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <h4 class="pull-left">Danh sách khu nhà</h4>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" onclick="addKhuNha()">
                                Thêm khu nhà
                            </button>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="100px">id</th>
                                    <th>Khu nhà</th>
                                    <th class="text-center" width="200px">Chức năng</th>
                                </tr>
                                <?php foreach ($listKhuNha as $khuNha): ?>
                                <tr>
                                    <td><?php echo $khuNha['id']; ?></td>
                                    <td><?php echo $khuNha['TenKhuNha']; ?></td>
                                    <td class="text-center">
                                          <div class="btn-group">
                                              <a onclick="edit(<?php echo $khuNha['id'] ?>)" href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                              <a href="index.php?c=khunha&a=delete&id=<?php echo $khuNha['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                          </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="myModal" class="modal fade" role="dialog">

    </div>
    <script>
        function edit(id) {
            $.ajax({
                url: 'index.php?c=khunha&a=edit',
                type: 'get',
                data:{id: id},
                success:function(result){
                    $('#myModal').html(result);
                }
            });
        }
        function addKhuNha() {
            $.ajax({
                url: 'index.php?c=khunha&a=add',
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