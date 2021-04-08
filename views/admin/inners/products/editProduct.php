<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Editar Producto</span>
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
                <form method="post" action="<?= getUrl() ?>ajax/admin/products/products.php" class="form-admin" id="formEditProduct" enctype="multipart/form-data">
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
                                    <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="-- --" value="<?= $data['product']['nombre'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria:</label>
                                    <select required class="form-control" id="categoria" name="categoria">
                                        <?php foreach ($data['categories'] as $row) : ?>
                                            <option <?php echo ($data['product']['idCategoria'] == $row['id']) ? ('selected') : (''); ?> value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input required type="number" min="1" step="any" class="form-control" id="precio" name="precio" placeholder="-- --" value="<?= $data['product']['precio'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="stock">Stock:</label>
                                    <input required type="number" min="0" step="any" class="form-control" id="stock" name="stock" placeholder="-- --" value="<?= $data['product']['stock'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea class="form-control" id="summernote" id="descripcion" name="descripcion"><?= $data['product']['descripcion'] ?></textarea>
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
                                    <label for="image">Imagen Principal:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                            <label class="custom-file-label" for="image">Elegir Imagen (Opcional)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="imageSecondary">Imagen Secundaria (opcional):</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="secondaryImage" name="secondaryImage" accept="image/*">
                                            <label class="custom-file-label" for="secondaryImage">Elegir Imagen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <a class="preview-image" href="<?php echo ($data['product']['foto'] != '') ? (getUrl() . 'assets/img/products/main/' . $data['product']['foto']) : (getUrl() . 'assets/img/products/default.jpg') ?>" data-lightbox="editProductImage">
                                    <img class="preview-image" src="<?php echo ($data['product']['foto'] != '') ? (getUrl() . 'assets/img/products/main/' . $data['product']['foto']) : (getUrl() . 'assets/img/products/default.jpg') ?>" alt="Imagen Principal" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                                </a>
                            </div>
                            <div class="form-group">
                                <a class="preview-image" href="<?php echo ($data['product']['fotoSecundaria'] != '') ? (getUrl() . 'assets/img/products/secondary/' . $data['product']['fotoSecundaria']) : (getUrl() . 'assets/img/products/default.jpg') ?>" data-lightbox="editProductImage">
                                    <img class="preview-image" src="<?php echo ($data['product']['fotoSecundaria'] != '') ? (getUrl() . 'assets/img/products/secondary/' . $data['product']['fotoSecundaria']) : (getUrl() . 'assets/img/products/default.jpg') ?>" alt="Imagen Secundaria" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                                </a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="editProduct">
                    <input type="hidden" name="id" id="id" value="<?= $data['product']['id'] ?>">
                    <input type="hidden" name="lastImage" id="lastImage" value="<?= $data['product']['foto'] ?>">
                    <input type="hidden" name="lastSecondaryImage" id="lastSecondaryImage" value="<?= $data['product']['fotoSecundaria'] ?>">
                    <!-- /.card-body -->
                    <div class="card-footer">
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