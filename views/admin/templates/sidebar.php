<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= URL; ?>Index/start" class="brand-link">
        <img src="<?= URL ?>assets/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Starbucks</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php if (isset($_SESSION['user']['id'])) { ?>
                <div class="image">
                    <img class="preview-image" style="height: 30px; width: 30px; object-fit: cover; border-radius: 50%;" src="<?= $_SESSION['user']['image'] != null || $_SESSION['user']['image'] != '' ? getUrl() . 'assets/img/users/' . $_SESSION['user']['image']  : getUrl() . 'assets/img/users/default.png' ?> " class="img-circle elevation-2" alt="Imagen de Perfil" />
                </div>
                <div class="info">
                    <a href="<?= getUrl() ?>Admin/profile" class="d-block">
                        <?php
                        $nombre = $_SESSION['user']['nombre'] . ' ' . $_SESSION['user']['apellido'];
                        if (strlen($nombre) > 20) {
                            echo substr($nombre, 0, 20) . '...';
                        } else {
                            echo $nombre;
                        }
                        ?>
                    </a>
                </div>
            <?php } ?>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">Principal</li>
                <?php
                foreach ($data['modules'] as $row) :
                    if (getPermissionMenu($data['permissions'], $row['id'])) { ?>
                        <li class="nav-item">
                            <?php if ($row['nombre'] == 'Dashboard') { ?>
                                <a href="<?= URL; ?>Personal/Consultas" class="nav-link">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p><?= $row['nombre'] ?></p>
                                </a>
                            <?php } else if ($row['nombre'] == 'Usuarios') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-user-alt nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= getUrl() ?>Admin/listUsers" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= getUrl() ?>Admin/newUser" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear <?= substr($row['nombre'], 0, -1) ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Roles') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= getUrl() ?>Admin/listRoles" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= getUrl() ?>Admin/newRol" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear <?= substr($row['nombre'], 0, -1) ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Productos') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-mug-hot nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>Admin/listProducts" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>Admin/newProduct" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear <?= substr($row['nombre'], 0, -1) ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Categorias') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-utensils nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>Admin/listCategories" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>Admin/newCategory" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear <?= substr($row['nombre'], 0, -1) ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Domicilios') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>User/listUsers" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>User/newUser" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear <?= substr($row['nombre'], 0, -1) ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Chequeras') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-wallet nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>User/listUsers" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>User/newUser" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear <?= substr($row['nombre'], 0, -1) ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Galeria') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-images nav-icon"></i>
                                    <p>
                                        <?= $row['nombre'] ?>
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>Admin/listGallery" class="nav-link">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Ver <?= $row['nombre'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= URL; ?>Admin/newGalleryImage" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Agregar Imagen</p>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else if ($row['nombre'] == 'Consultas') { ?>
                                <a href="<?= URL; ?>Admin/listConsults" class="nav-link">
                                    <i class="fas fa-question nav-icon"></i>
                                    <p><?= $row['nombre'] ?></p>
                                </a>
                            <?php } ?>
                        </li>
                <?php }
                endforeach; ?>
                <li class="nav-header">Sesión</li>
                <li class="nav-item">
                    <a href="#" class="nav-link btnLogout" pag-redirect="<?= getUrl() ?>config/logout.php">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>