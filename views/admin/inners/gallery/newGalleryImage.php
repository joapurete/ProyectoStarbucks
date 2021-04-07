<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar Imagen</h1>
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
                <form method="post" action="<?= getUrl(); ?>ajax/admin/gallery/gallery.php" id="formNewImage" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="foto">Imagen:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Elegir Imagen</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="preview-image" href="<?= getUrl() . 'assets/img/gallery/default.jpg' ?>" data-lightbox="newGalleryImage">
                                <img class="preview-image" src="<?= getUrl() . 'assets/img/gallery/default.jpg' ?>" alt="Imagen de Galería" loading="lazy" style="height: 120px; width: 220px; object-fit: cover; max-width: 100%">
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="newImage">
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>