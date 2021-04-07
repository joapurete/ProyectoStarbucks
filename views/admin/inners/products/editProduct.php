<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2 class="line-title-admin-form text-center">
                        <span class="title-admin-form text-dark">Crear Nuevo Producto</span>
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
                <form method="post" action="<?= getUrl() ?>ajax/admin/products/products.php" class="form-admin" id="formNewProduct" enctype="multipart/form-data">
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
                                    <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el Nombre del Producto">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="categoria">Categoría:</label>
                                    <select required class="form-control" id="categoria" name="categoria">
                                        <?php foreach ($data['categories'] as $row) : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input required type="number" min="1" step="any" class="form-control" id="precio" name="precio" placeholder="Ingrese el Precio">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="stock">Stock:</label>
                                    <input required type="number" min="0" step="any" class="form-control" id="stock" name="stock" placeholder="Ingrese el Stock">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea required class="form-control" id="summernote" id="descripcion" name="descripcion"></textarea>
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
                                            <input required type="file" class="custom-file-input" id="image" name="image" accept="image/*">
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
                        <div class="form-group">
                            <a class="preview-image" href="<?= getUrl() . 'assets/img/products/default.jpg' ?>" data-lightbox="newProductImage">
                                <img class="preview-image" src="<?= getUrl() . 'assets/img/products/default.jpg' ?>" alt="Imagen Principal" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                            </a>
                            <a class="preview-image" href="<?= getUrl() . 'assets/img/products/default.jpg' ?>" data-lightbox="newProductImage">
                                <img class="preview-image" src="<?= getUrl() . 'assets/img/products/default.jpg' ?>" alt="Imagen Principal" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="newProduct">
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