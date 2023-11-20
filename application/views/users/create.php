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
            <?php endif; ?>

            <form action="<?= base_url() ?>users/store" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="form-check mr-4">
                            <input type="radio" name="gender" id="genderMale" class="form-check-input" value="Male">
                            <label for="genderMale">Hombre</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="gender" id="genderfemale" class="form-check-input" value="Female">
                            <label for="genderfemale">Mujer</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" name="phone" id="phone" class="form-control" required placeholder="10 dígitos">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <div class="form-group">
                            <label for="codigo_postal">Código postal</label>
                            <input type="number" name="codigo_postal" id="codigo_postal" min="0" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="colonia">Colonia</label>
                            <input type="text" name="colonia" id="colonia" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="delegacion">Delegación o Municipio</label>
                            <input type="text" name="delegacion" id="delegacion" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" id="estado" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="user_type">Tipo de usuario</label>
                            <select name="user_type" id="user_type" class="form-control">
                                <option value="Administrativo">Administrativo</option>
                                <option value="Administrativo-Operativo">Administrativo-Operativo</option>
                                <option value="Operativo">Operativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>