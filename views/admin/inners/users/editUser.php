<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h2 class="line-title-admin-form text-center">
                            <span class="title-admin-form text-dark">Editar Usuario</span>
                        </h2>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card">
                <!-- form start -->
                <form method="post" action="<?= getUrl() ?>ajax/admin/users/users.php" class="form-admin" id="formEditUser" enctype="multipart/form-data">
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
                                            <option <?php echo ($data['user']['idRol'] == $row['id']) ? ('selected') : (''); ?> value="<?= $row['id'] ?>"><?= $row['nombre'] ?> (Nivel <?= $row['nivel'] ?>)</option>
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
                                        <a href="<?= getUrl() ?>Admin/editUserPass&id=<?= $data['user']['id'] ?>" class="form-control btn btn-secondary">Cambiar Contraseña</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input required type="password" class="form-control" id="password" name="password" placeholder="-- --">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="verifPassword">Confirmar Contraseña:</label>
                                    <input required type="password" class="form-control" id="verifPassword" name="verifPassword" placeholder="-- --">
                                </div>
                            </div>
                        </div> -->
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
                            <a class="preview-image" href="<?php echo ($data['user']['foto'] != '') ? (getUrl() . 'assets/img/users/' . $data['user']['foto']) : (getUrl() . 'assets/img/users/default.png') ?>" data-lightbox="editUserImage">
                                <img class="preview-image" src="<?php echo ($data['user']['foto'] != '') ? (getUrl() . 'assets/img/users/' . $data['user']['foto']) : (getUrl() . 'assets/img/users/default.png') ?>" alt="Imagen de Galería" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                            </a>
                        </div>
                        <input type="hidden" name="action" id="action" value="editUser">
                        <input type="hidden" name="id" id="id" value="<?= $data['user']['id'] ?>">
                        <input type="hidden" name="imagenAntigua" id="imagenAntigua" value="<?= $data['user']['foto'] ?>">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?= getUrl() ?>Admin/listUsers" class="btn btn-primary">Volver</a>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- /.row (main row) -->
                </form>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>