<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="data mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil <?= $_SESSION['user']['type'] ?></h1>
                </div><!-- /.col -->
            </div><!-- /.data -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Informacion ~ <?= $_SESSION['user']['type'] ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" class="form-admin" id="admin-personal-ver-perfil" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-dark">Datos de la Cuenta</span>
                                </h2>
                            </div><!-- /.col -->
                        </div><!-- /.data -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="rol">Rol:</label>
                                    <input type="text" class="form-control" id="rol" name="rol" placeholder="-- --" value="<?= $data['user']['nombreRol'] ?>  (Nivel <?= $data['user']['nivelRol'] ?>)" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mail">Mail:</label>
                                    <input required type="email" class="form-control" id="mail" name="mail" placeholder="-- --" value="<?= $data['user']['mail'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-muted">Datos Personales</span>
                                </h2>
                            </div><!-- /.col -->
                        </div><!-- /.data -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['user']['nombre'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input required type="text" class="form-control" id="apellido" name="apellido" placeholder="-- --" value="<?= $data['user']['apellido'] ?>" disabled>
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
                            <label for="foto">Imagen:</label>
                            <img class="previsualizador-imagen-form" src="<?php echo ($data['user']['foto'] != '') ? (getUrl() . "assets/img/users/" . $data['user']['foto']) : (getUrl() . 'assets/img/default.png') ?>" alt="Imagen de Perfil" loading="lazy" style="height: 120px; width: 120px; object-fit: cover; max-width: 100%; border-radius: 50%;">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= getUrl() ?>Admin/start" class="btn btn-primary">Regresar</a>
                        <a href="<?= getUrl() ?>Admin/editProfile" class="btn btn-info">Editar Perfil</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.data (main data) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>