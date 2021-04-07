<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ver Consulta</h1>
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
                    <h3 class="card-title">Consulta</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="admin-personal-ver-consulta">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre Completo:</label>
                                    <input placeholder="-- --" type="text" id="nombre" name="nombre" class="form-control" value="<?= $data['consult']['nombre'] . ' ' . $data['consult']['apellido'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mail">Mail:</label>
                                    <input placeholder="-- --" type="mail" id="mail" name="mail" class="form-control" value="<?= $data['consult']['mail'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="telefono">Telefono:</label>
                                    <input placeholder="-- --" type="text" id="telefono" name="telefono" class="form-control" value="<?= $data['consult']['telefono'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="titulo">Fecha:</label>
                                    <input placeholder="-- --" type="datetime-local" id="fecha" name="fecha" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($data['consult']['creado'])); ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="texto">Descripcion:</label>
                            <textarea class="form-control" id="texto" name="texto" disabled><?= $data['consult']['consulta'] ?></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="mailto:<?= $data['consult']['mail'] ?>" class="btn btn-primary">Enviar Mail</a>
                        <a href="tel:<?= $data['consult']['telefono'] ?>" class="btn btn-info">Llamar</a>
                        <a href="https://wa.me/54<?= $data['consult']['telefono'] ?>/?text=Hola, <?= $data['consult']['nombre'] ?>! Desde Starbucks deseamos contactar con usted para resolver cualquier duda o inquietud!" class="btn btn-success">Whatsapp</a>
                        <a href="#" pag-redirect="<?= getUrl() ?>Admin/listConsults" class="btn btn-danger btn-delete-consult" data-action="<?= getUrl(); ?>ajax/admin/consults/consults.php" data-bool='false' data-id="<?= $data['consult']['id'] ?>">Borrar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>