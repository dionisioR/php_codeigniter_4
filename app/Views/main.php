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
            <a href="<?= site_url('new_task') ?>" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i> Nova Tarefa
            </a>
        </div>
    </div>
</section>

<?php if (count($tasks) > 0): ?>

    <section class="container mt-3">
        <div class="row">
            <div class="col">
                <h3>Tarefas</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50%">Tarefas</th>
                            <th width="25%" class="text-center">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <td><?= $task->task_name ?></td>
                                <td class="text-center"><?= STATUS_LIST[$task->task_status] ?></td>

                                <td class="text-end">
                                    <a href="<?= site_url('edit_task/' . $task->id) ?>" class="btn btn-secondary btn-sm me-2">
                                        <i class="fa-solid fa-pen-to-square"></i> Editar
                                    </a>
                                    <a href="<?= site_url('delete_task/' . $task->id) ?>" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php else: ?>

    <section class="container mt-3">
        <div class="row">
            <div class="col text-center">
                <p>Não há tarefas cadastradas</p>
            </div>
        </div>
    </section>

<?php endif; ?>

<?= $this->endSection() ?>