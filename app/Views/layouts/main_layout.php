<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  APP_NAME ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
</head>
<body>

    <!-- render top bar when logged in -->
     <?php if (session()->has('id')): ?>
        <?= $this->include('layouts/top_bar') ?>
    <?php endif; ?>

    <!-- render sections -->
    <?= $this->renderSection('content') ?>


    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>
    
</body>
</html>