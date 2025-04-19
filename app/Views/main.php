<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row">
        <div class="col">

            <!-- serch bar -->
            <?= form_open('search') ?>
            <div class="mb-3 d-flex align-items-center">
                <label class="me-3">Pesquisar:</label>
                <input type="text" name="text_search" class="form-control  me-3">
                <button type="submit" class="btn btn-secondary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <?= form_close() ?>

        </div>

        <div class="col">
            <!-- status filter -->
            <?= form_open('filter') ?>
            <div class="d-flex mb-3 align-items-center">
                <label class="me-3">Status:</label>
                <select name="select_status" class="form-select w-50">

                    <?php foreach (STATUS_LIST as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <? form_close() ?>
        </div>


        <div class="col text-end">
            <!-- new task button -->
            <a href="<?= site_url('new') ?>" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i> Nova Tarefa
            </a>
        </div>
    </div>
</section>


<section class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Tarefas</h3>
        </div>
    </div>
</section>

<section class="container mt-3">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tarefas</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A</td>
                        <td>B</td>
                        <td>C</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


<section class="container mt-3">
    <div class="row">
        <div class="col text-center">
            <p>Não há tarefas cadastradas</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>