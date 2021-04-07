<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Categoria</h1>
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
                <form method="post" action="<?= getUrl() ?>ajax/admin/categories/categories.php" id="formEditCategory">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre de Categoria:</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['category']['nombre'] ?>" placeholder="-- --">
                        </div>
                    </div>
                    <input type="hidden" name="action" value="editCategory">
                    <input type="hidden" name="id" value="<?= $data['category']['id'] ?>">
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= getUrl() ?>Admin/listCategories" class="btn btn-primary">Volver</a>
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