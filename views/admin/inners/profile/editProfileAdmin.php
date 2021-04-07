<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Perfil Admin</h1>
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
                <form method="post" action="<?= getUrl() ?>ajax/admin/profile/profile.php" class="form-admin" id="formEditProfile" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h2 class="line-title-admin-form text-left">
                                        <span class="subtitle-admin-form text-dark">Datos de la Cuenta</span>
                                    </h2>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rol">Rol:</label>
                                        <select required class="form-control" id="rol" name="rol">
                                            <?php foreach ($data['roles'] as $row) : ?>
                                                <option value="<?= $row['id'] ?>" <?= $data['user']['nombreRol'] == $row['nombre'] ? 'selected' : '' ?>><?= $row['nombre'] ?> (Nivel <?= $row['nivel'] ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail">Mail:</label>
                                        <input required type="email" class="form-control" id="mail" name="mail" placeholder="-- --" value="<?= $data['user']['mail'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label">Cambiar Contraseña:</label>
                                            <a href="<?= getUrl() ?>Admin/editProfilePass" class="form-control btn btn-secondary">Cambiar Contraseña</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h2 class="line-title-admin-form text-left">
                                        <span class="subtitle-admin-form text-muted">Datos Personales</span>
                                    </h2>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['user']['nombre'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido:</label>
                                        <input required type="text" class="form-control" id="apellido" name="apellido" placeholder="-- --" value="<?= $data['user']['apellido'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tel">Tel (opcional):</label>
                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="-- --" value="<?= $data['user']['tel'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="image">Imagen:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                                <label class="custom-file-label" for="foto">Elegir Imagen (Opcional)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <img class="preview-image" src="<?php echo ($data['user']['foto'] != '') ? (URL . 'assets/img/users/' . $data['user']['foto']) : (URL . 'assets/img/default.png') ?>" alt="Imagen de Perfil" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%" loading="lazy">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <input type="hidden" name="action" value="editProfile">
                        <input type="hidden" name="imagenAntigua" id="imagenAntigua" value="<?= $data['user']['foto'] ?>">
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