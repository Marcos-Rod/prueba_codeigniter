<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Listado de usuarios</h3>
                <div>
                    <a target="_blank" href="<?php echo base_url(); ?>users/export" class="btn btn-warning btn-lg" title="Exportar"><i class="bi bi-download"></i></a>
                </div>
            </div>
            <hr>
        </div>

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-12">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->users as $user) : ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td>
                                <?= ($user['status'] == 1) ? '<span class="text-success">Activo</span>' : '<span class="text-danger">Inactivo</span>' ?>
                            </td>
                            <td class="d-flex justify-content-center align-items-center">
                                <a href="<?php echo base_url(); ?>users/show/<?= $user['id'] ?>" class="btn btn-primary mr-3"><i class="bi bi-eye-fill"></i></a>
                                <a href="<?php echo base_url(); ?>users/edit/<?= $user['id'] ?>" class="btn btn-success mr-3"><i class="bi bi-pencil-fill"></i></a>
                                <form action="<?php echo base_url(); ?>users/delete/<?= $user['id'] ?>" method="post" class="mb-0">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>