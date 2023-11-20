<div class="container">
    <div class="row">
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
                                <a href="<?php echo base_url(); ?>show" class="btn btn-primary mr-3"><i class="bi bi-eye-fill"></i></a>
                                <a href="<?php echo base_url(); ?>edit" class="btn btn-success mr-3"><i class="bi bi-pencil-fill"></i></a>
                                <form action="<?php echo base_url(); ?>delete/<?= $user['id'] ?>" method="post" class="mb-0">
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