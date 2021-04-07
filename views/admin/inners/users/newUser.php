<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Crear Nuevo Usuario</span>
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
            <div class="card">
                <!-- form start -->
                <form method="post" action="<?= URL; ?>ajax/admin/users/users.php" class="form-admin" id="formNewUser" enctype="multipart/form-data">
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
                                            <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mail">Mail:</label>
                                    <input required type="email" class="form-control" id="mail" name="mail" placeholder="Ingrese el Mail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input required type="password" class="form-control" id="password" name="password" placeholder="Ingrese la Contraseña">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="verifPassword">Confirmar Contraseña:</label>
                                    <input required type="password" class="form-control" id="verifPassword" name="verifPassword" placeholder="Confirme la Contraseña">
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
                                    <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el Nombre">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input required type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el Apellido">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tel">Tel (opcional):</label>
                                    <input type="text" class="form-control" id="tel" name="tel" placeholder="Ingrese el Teléfono">
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
                        <!-- <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-muted">Domicilio</span>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nacionalidad">Nacionalidad:</label>
                                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Ingrese la Nacionalidad">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="domicilio">Domicilio:</label>
                                    <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingrese el Domicilio">
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <a class="preview-image" href="<?= getUrl() . 'assets/img/users/default.png' ?>" data-lightbox="newUserImage">
                                <img class="preview-image" src="<?= getUrl() . 'assets/img/users/default.png' ?>" alt="Imagen de Galería" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="new">
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>