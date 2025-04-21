<header class="container-fluid">
    <div class="row align-items-center bg-secondary text-white">
        <div class="col p-4">
            <h4><?= APP_NAME ?></h4>
        </div>
        <div class="col p-4 text-end">
            <i class="fa-regular fa-user me-2"></i><?= session()->usuario ?>
            <span class="opacity-50 mx-3">|</span>
            <a href="<?= site_url("logout") ?>" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Sair
            </a>
        </div>
    </div>
</header>