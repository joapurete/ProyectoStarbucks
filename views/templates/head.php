<!doctype html>
<html lang="es">

<!-- Head -->

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Titulo e Icono -->
    <title><?php echo $data['data']['current'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>assets/img/icon.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL; ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= URL; ?>assets/css/styles.css">
    <?php if (isset($data['linkCss'])) {
        echo $data['linkCss'];
    } ?>
    <link rel="stylesheet" href="<?= URL; ?>assets/css/main.css">

</head>

<body class="no-scroll <?php if (isset($data['classBody'])) {
                            echo $data['classBody'];
                        } ?>">