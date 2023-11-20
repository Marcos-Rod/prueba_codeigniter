<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= (is_null($this->user)) ? set_value('name') : $this->user['name']; ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="<?= (is_null($this->user)) ? set_value('last_name') : $this->user['last_name']; ?>">
        </div>
    </div>
    <div class="col-12 d-flex">
        <div class="form-check mr-4 d-flex flex-wrap">
            <input type="radio" name="gender" id="genderMale" class="form-check-input" value="Male" <?= (is_null($this->user)) ? set_radio('gender', 'Male') : set_radio('gender', 'Male', ($this->user['gender']) == 'Male') ; ?>>
            <label for="genderMale">Hombre</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" id="genderfemale" class="form-check-input" value="Female" <?= (is_null($this->user)) ? set_radio('gender', 'Female') : set_radio('gender', 'Female', ($this->user['gender']) == 'Female') ; ?>>
            <label for="genderfemale">Mujer</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= (is_null($this->user)) ? set_value('email') : $this->user['email']; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="10 dígitos" value="<?= (is_null($this->user)) ? set_value('phone') : $this->user['phone']; ?>">
        </div>
    </div>
    <div class="col-12 d-flex justify-content-between">
        <div class="form-group">
            <label for="codigo_postal">Código postal</label>
            <input type="number" name="codigo_postal" id="codigo_postal" min="0" class="form-control" value="<?= (is_null($this->user)) ? set_value('codigo_postal') : $this->user['codigo_postal']; ?>">
        </div>
        <div class="form-group">
            <label for="colonia">Colonia</label>
            <input type="text" name="colonia" id="colonia" class="form-control" value="<?= (is_null($this->user)) ? set_value('colonia') : $this->user['colonia']; ?>">
        </div>
        <div class="form-group">
            <label for="delegacion">Delegación o Municipio</label>
            <input type="text" name="delegacion" id="delegacion" class="form-control" value="<?= (is_null($this->user)) ? set_value('delegacion') : $this->user['delegacion']; ?>">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="<?= (is_null($this->user)) ? set_value('estado') : $this->user['estado']; ?>">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="user_type">Tipo de usuario</label>
            <select name="user_type" id="user_type" class="form-control">
                <option value="Administrativo" <?= (is_null($this->user)) ? set_select('user_type', 'Administrativo') : set_select('user_type', 'Administrativo', ($this->user['user_type'] == 'Administrativo')); ?>>Administrativo</option>
                <option value="Administrativo-Operativo" <?= (is_null($this->user)) ? set_select('user_type', 'Administrativo-Operativo') : set_select('user_type', 'Administrativo-Operativo', ($this->user['user_type'] == 'Administrativo-Operativo')); ?>>Administrativo-Operativo</option>
                <option value="Operativo" <?= (is_null($this->user)) ? set_select('user_type', 'Operativo') : set_select('user_type', 'Operativo', ($this->user['user_type'] == 'Operativo')); ?>>Operativo</option>
            </select>
        </div>
    </div>
</div>