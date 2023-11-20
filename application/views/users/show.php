<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h3><?= $this->user['id'] . ' - Detalle del usuario: ' . $this->user['name'] ?></h3>
            <hr>

            <h5 class="font-weight-bold">Datos personales</h5>
            <ul>
                <li><strong>Nombre completo: </strong> <?= $this->user['name'] . ' ' . $this->user['last_name'] ?></li>
                <li><strong>Género: </strong> <?= ($this->user['gender'] == 'Male') ? 'Hombre' : 'Mujer' ?></li>
                <li><strong>Correo: </strong> <?= $this->user['email'] ?></li>
                <li><strong>Teléfono: </strong> <?= $this->user['phone'] ?></li>
                <li><strong>Tipo de usuario: </strong> <?= $this->user['user_type'] ?></li>
                <li><strong>Estatus: </strong> <?= ($this->user['status'] == 1) ? '<span class="text-success">Activo</span>' : '<span class="text-danger">Inactivo</span>' ?></li>
                <li><strong>Fecha de registro: </strong> <?= $this->user['created_format'] ?></li>
            </ul>

            <h5 class="font-weight-bold">Dirección</h5>
            <p>CP. <?= $this->user['codigo_postal'] ?>, Col. <?= $this->user['colonia'] ?>, Del. <?= $this->user['delegacion'] ?>, Edo. <?= $this->user['estado'] ?> </p>
        </div>
    </div>
</div>