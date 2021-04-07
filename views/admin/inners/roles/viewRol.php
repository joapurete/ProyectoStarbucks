<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Ver Rol</span>
                    </h2>
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
                <!-- form start -->
                <form method="post" action="<?= URL; ?>ajax/admin/roles/roles.php" class="form-admin" id="formViewRol" enctype="multipart/form-row">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-dark">Datos del Rol</span>
                                </h2>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Rol:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['rol']['nombre'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="access">Acceso:</label>
                                    <input required type="email" class="form-control" id="access" name="access" placeholder="-- --" value="Nivel <?= $data['rol']['nivel'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-muted">Permisos</span>
                                </h2>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Modulo</th>
                                            <th>Acceso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['permissions'] as $row) : ?>
                                            <tr>
                                                <td><?= $row['nombreModulo'] ?></td>
                                                <td>
                                                    <input type="checkbox" <?= $row['permiso'] == 1 ? 'checked' : '' ?> name="<?= $row['nombreModulo'] ?>" id="<?= $row['nombreModulo'] ?>" disabled>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Modulo</th>
                                            <th>Acceso</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?= getUrl() ?>Admin/listRoles" class="btn btn-primary">Volver</a>
                        </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>