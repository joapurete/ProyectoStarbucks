<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Editar Rol</span>
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
                <form method="post" action="<?= URL; ?>ajax/admin/roles/roles.php" class="form-admin" id="formEditRol" enctype="multipart/form-row">
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
                                    <label for="nombre">Nombre:</label>
                                    <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['rol']['nombre'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nivel">Acceso:</label>
                                    <select required class="form-control" id="nivel" name="nivel">
                                        <option value='1' <?= $data['rol']['nivel'] == 1 ? 'selected' : '' ?>>Nivel 1</option>
                                        <option value='2' <?= $data['rol']['nivel'] == 2 ? 'selected' : '' ?>>Nivel 2</option>
                                        <option value='3' <?= $data['rol']['nivel'] == 3 ? 'selected' : '' ?>>Nivel 3</option>
                                    </select>
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
                                                    <input type="checkbox" <?= $row['permiso'] == 1 ? 'checked' : '' ?> name="<?= strtolower($row['nombreModulo']) ?>" id="<?= strtolower($row['nombreModulo']) ?>">
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
                        <input type="hidden" name="action" id="action" value="editRol">
                        <input type="hidden" name="id" id="id" value="<?= $data['rol']['id'] ?>">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?= getUrl() ?>Admin/listRoles" class="btn btn-primary">Volver</a>
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