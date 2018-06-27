{if $save}
    <div class="bootstrap">
        <div class="module_confirmation conf confirm alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            Dato Ingresado Correctamente
        </div>
    </div>
{/if}


<h1>Panel de Configuracion del modulo</h1>

<ul>
    <li>
        Agregar, Modificar, Eliminar Ingredientes
    </li>
    <li>
        Agregar Nuevos Servicios
    </li>
</ul>


<h2>Test con PhpMyAdmin</h2>

<form action="" method="post">
    <div class="form-group">
        <label for="Cambiar URL">URL</label>
        <input type="text" class="form-control" name="URLEj" id="URLEj" placeholder="URL aca">
    </div>

    <button type="submit" name="subConfig" class="btn btn-primary">Enviar Consulta</button>


</form>