<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de Licores a domicilio Zimple - Popayán Cauca">
    <title>Zimple - <?php echo $titulo ?? ''; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/build/img/fav.webp" type="image/x-icon">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <?php include_once __DIR__ . '/templates/header_admin.php'; ?>
    <?php echo $contenido; ?>
    <?php include_once __DIR__ . '/templates/footer.php'; ?>    
    <script src="sweetalert2.all.min.js"></script>
    <script src="/build/js/main.min.js"></script>
</body>

</html>