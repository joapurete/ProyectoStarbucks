<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cambiar Contraseña</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="<?= getUrl() ?>ajax/admin/profile/profile.php" id="formEditPass" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="currentPassword">Contraseña Actual:</label>
                            <input required type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Contraseña Actual">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Contraseña Nueva:</label>
                                    <input required type="password" class="form-control" id="password" name="password" placeholder="Contraseña Actual">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="verifPassword">Verificar:</label>
                                    <input required type="password" class="form-control" id="verifPassword" name="verifPassword" placeholder="Verificar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <input type="hidden" name="realPassword" value="<?= $data['user']['password'] ?>">
                    <input type="hidden" name="action" value="editPass">
                    <div class="card-footer">
                        <a href="<?= getUrl() ?>Admin/profile" class="btn btn-info">Regresar</a>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>