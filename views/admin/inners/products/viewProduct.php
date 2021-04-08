<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Ver Producto</span>
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
                <form method="post" action="<?= getUrl() ?>ajax/admin/products/products.php" class="form-admin" id="formViewProduct" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-dark">Datos del Producto</span>
                                </h2>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['product']['nombre'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="categoria">Categoría:</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="-- --" value="<?= $data['product']['categoria'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="-- --" value="<?= getFormatMoney($data['product']['precio']) ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="stock">Stock:</label>
                                    <input type="text" class="form-control" id="stock" name="stock" placeholder="-- --" value="<?= $data['product']['stock'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea class="form-control summernote-disable" id="summernote" id="descripcion" name="descripcion"><?= $data['product']['descripcion'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="stock">Stock:</label>
                                    <input type="text" class="form-control" id="stock" name="stock" placeholder="-- --" value="<?php echo ($data['product']['status']) != 0 ? ('Activo') : ('Inactivo') ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h2 class="line-title-admin-form text-left">
                                    <span class="subtitle-admin-form text-muted">Imagenes</span>
                                </h2>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <a class="preview-image" href="<?php echo ($data['product']['foto'] != '') ? (getUrl() . 'assets/img/products/main/' . $data['product']['foto']) : (getUrl() . 'assets/img/products/default.jpg') ?>" data-lightbox="viewProductImage">
                                        <img class="preview-image" src="<?php echo ($data['product']['foto'] != '') ? (getUrl() . 'assets/img/products/main/' . $data['product']['foto']) : (getUrl() . 'assets/img/products/default.jpg') ?>" alt="Imagen Principal" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <a class="preview-image" href="<?php echo ($data['product']['fotoSecundaria'] != '') ? (getUrl() . 'assets/img/products/secondary/' . $data['product']['fotoSecundaria']) : (getUrl() . 'assets/img/products/default.jpg') ?>" data-lightbox="viewProductImage">
                                        <img class="preview-image" src="<?php echo ($data['product']['fotoSecundaria'] != '') ? (getUrl() . 'assets/img/products/secondary/' . $data['product']['fotoSecundaria']) : (getUrl() . 'assets/img/products/default.jpg') ?>" alt="Imagen Secundaria" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= getUrl() ?>Admin/listProducts" class="btn btn-primary">Volver</a>
                        <a href="<?= getUrl() ?>Admin/editProduct&id=<?= $row['product']['id'] ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <a data-image="<?= $data['product']['foto'] ?>" data-secondaryImage="<?= $data['product']['fotoSecundaria'] ?>" href="#" pag-redirect="<?= getUrl() ?>Admin/listProducts" class="btn btn-danger btn-delete-product" data-action="<?= getUrl(); ?>ajax/admin/products/products.php" data-bool='false' data-id="<?= $data['product']['id'] ?>"><i class="fas fa-trash"></i></a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>