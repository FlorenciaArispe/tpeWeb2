{include file="header.tpl"}
<hr class="featurette-divider">
<h1 class="display-4 font-italic" style="font-size: 2rem;"> <b>Modificando cliente..</b></h1>


<form action="update" method="POST" class="row g-3">
    <div class="col-12">
        <input name="id" type="hidden" class="form-control" id="inputAddress" value="{$cliente->id}">
    </div>
    <div class="col-md-6">
        <label for="inputName" class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control" id="inputName" value="{$cliente->nombre}" required>
    </div>
    <div class="col-md-6">
        <label for="inputName" class="form-label">Apellido</label>
        <input name="apellido" type="text" class="form-control" id="inputName" value="{$cliente->apellido}" required>
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">DNI</label>
        <input name="dni" type="number" class="form-control" id="inputAddress" value="{$cliente->dni}" required>
    </div>
    <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="inputEmail4" value="{$cliente->email}" required>

    </div>
    <div class="col-12">
        <input type="submit" name="agregar" class="btn btn-outline-secondary" value="Modificar">
    </div>
</form>
<hr class="featurette-divider">

{include file="footer.tpl"}