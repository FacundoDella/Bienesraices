<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre vendedor(a)" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido vendedor(a)" value="<?php echo s($vendedor->apellido); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Teléfono vendedor(a)" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>