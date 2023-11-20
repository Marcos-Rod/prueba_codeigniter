<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h3>Agregar usuario</h3>
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


            <form action="<?= base_url() ?>users/store" method="post" id="form-register">

                <?php $this->load->view('users/form') ?>
                
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>