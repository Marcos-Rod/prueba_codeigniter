<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h3><?= $this->user['id'] . ' - ' . $this->user['name'] ?></h3>
            <hr>

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif;
            if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif;
            if (validation_errors()) : ?>

                <div class="alert alert-danger text-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>


            <form action="<?= base_url() ?>users/update/<?= $this->user['id'] ?>" method="post" id="form-register">

                <?php $this->load->view('users/form') ?>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">Cambiar contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?= set_value('password') ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">Estatus</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?= set_select("status", 1, ($this->user['status'] == 1)) ?>>Activo</option>
                                <option value="2" <?= set_select("status", 2, ($this->user['status'] == 2)) ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Editar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>