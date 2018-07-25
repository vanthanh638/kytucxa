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
            <h1 class="header">
                Quản lý sinh viên
            </h1>
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
                            <h4 class="pull-left">Danh sách sinh viên</h4>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" onclick="add()">
                                Thêm sinh viên
                            </button>
                        </div>
                        <div class="box-body" id="list">
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
                                            <li class="page-item <?php if ($i == $page) echo 'active' ?>"><a class="page-link" href="index.php?c=sinhvien&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                        <?php } ?>
                                        <!--                                <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                                        <!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                                        <?php if ($page != $cPage) { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?c=sinhvien&p=<?php echo $page + 1 ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div><!-- /list -->
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
        $(document).ready(function(){
            $("#search").click(function() {
                var masv = $('#smasv').val();
                var tensv = $('#stensv').val();
                var lop = $('#slop').val();
                if (masv != '') {
                    masv = parseInt(masv);
                }
                $.ajax({
                    url: 'index.php?c=sinhvien&a=search',
                    type: 'post',
                    data:{
                        masv: masv,
                        tensv: tensv,
                        lop: lop
                    },
                    success:function(result) {
                        $("#list").html(result);
                    }
                });
            });
        });
    </script>

<?php require_once(PATH_APPLICATION.'/view/backend/layouts/footer.php'); ?>