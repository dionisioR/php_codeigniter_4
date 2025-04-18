<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex align-items-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-6 col-sm-8 col-lg-4">
                <div class="card bg-light text-dark rouded-3 p-5">

                    <?= form_open('login_submit', ['novalidate' => true]) ?>

                    <h3 class="text-center">Login</h3>
                    <hr>
                    <div class="mb-3">
                        <label for="text_usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="text_usuario" name="text_usuario" required autofocus placeholder="Digite seu usuário">
                        <?= !empty($validation_erros['text_usuario'])? '<p class="text-danger">'.$validation_erros['text_usuario'].'</p>':'' ?>
                    </div>
                    <div class="mb-3">
                        <label for="text_senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="text_senha" name="text_senha" required placeholder="Digite sua senha">
                        <?= !empty($validation_erros['text_senha'])? '<p class="text-danger">'.$validation_erros['text_senha'].'</p>':'' ?>

                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100">Entrar</button>
                    </div>

                    <?= form_close() ?>


                    <!-- <php if (!empty($validation_erros)): ?>
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                <php foreach ($validation_erros as $error): ?>
                                    <li><= $error ?></li>
                                <php endforeach; ?>
                            </ul>
                        </div>
                    <php endif; ?> -->

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>