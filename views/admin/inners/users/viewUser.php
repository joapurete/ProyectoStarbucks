<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Ver Usuario</span>
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
                <form method="post" action="<?= URL; ?>ajax/admin/users/users.php" class="form-admin" id="formViewUser" enctype="multipart/form-row">
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
                                    <input type="text" class="form-control" id="rol" name="rol" placeholder="-- --" value="<?= $data['user']['nombreRol'] ?> (Nivel <?= $data['user']['nivelRol'] ?>)" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mail">Mail:</label>
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="-- --" value="<?= $data['user']['mail'] ?>" disabled>
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
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['user']['nombre'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="-- --" value="<?= $data['user']['apellido'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tel">Tel (opcional):</label>
                                    <input type="text" class="form-control" id="tel" name="tel" placeholder="-- --" value="<?= $data['user']['tel'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="preview-image" href="<?php echo ($data['user']['foto'] != '') ? (getUrl() . 'assets/img/users/' . $data['user']['foto']) : (getUrl() . 'assets/img/users/default.png') ?>" data-lightbox="newUserImage">
                                <img class="preview-image" src="<?php echo ($data['user']['foto'] != '') ? (getUrl() . 'assets/img/users/' . $data['user']['foto']) : (getUrl() . 'assets/img/users/default.png') ?>" alt="Imagen de Galería" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                            </a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= getUrl() ?>Admin/listUsers" class="btn btn-primary">Volver</a>
                        <a href="<?= getUrl() ?>Admin/editUser&id=<?= $data['user']['id'] ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <a data-image="<?= $data['user']['foto'] ?>" href="#" pag-redirect="<?= getUrl() ?>Admin/listUsers" class="btn btn-danger btn-delete-user" data-action="<?= getUrl(); ?>ajax/admin/users/users.php" data-bool='false' data-id="<?= $data['user']['id'] ?>"><i class="fas fa-trash"></i></a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>