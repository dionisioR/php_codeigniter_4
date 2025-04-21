<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3>Nova Tarefa</h3>
            <hr>
            <?= form_open('new_task_submit', ['novalidate' => true]) ?>
            <div class="mb-3">
                <label class="form_label">Nome da tarefa</label>
                <input type="text" class="form-control" name="text_tarefa" required placeholder="Digite o nome da tarefa" value="<?= old('text_tarefa','') ?>">
            </div>
            <div class="mb-3">
                <label class="form_label">Descrição da tarefa</label>
                <textarea class="form-control" name="text_descricao" rows="3" placeholder="Digite a descrição da tarefa"><?= old('text_descricao','') ?></textarea>
            </div>

            <div class="text-center">
                <a href="<?= site_url('/') ?>" class="btn btn-primary px-5">Cancelar</a>
                <button type="submit" class="btn btn-secondary px-5">Salvar</button>
            </div>
            <?= form_close() ?>

            <!-- Erro / Validação -->
            <?php if (!empty($validation_errors)): ?>
                <div class="alert alert-danger mt-3">
                    <ul class="list-unstyled">
                        <?php foreach ($validation_errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- Erro / Validação FIM -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>