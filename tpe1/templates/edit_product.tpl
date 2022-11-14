{include file="header.tpl"}

<h1> Modificar producto</h1>

<form action="updateProducto" method="POST" class="row g-3">

    <div class="col-12">
        <input name="id" type="hidden" class="form-control" id="inputAddress" value="{$producto->id_producto}">
    </div>

    <div class="col-12">
        <input name="cliente" type="hidden" class="form-control" id="inputAddress" value="{$producto->cliente}">
    </div>

    <div class="col-md-6">
        <label for="inputName" class="form-label">Producto</label>
        <input name="producto" type="text" class="form-control" id="inputName" value="{$producto->producto}" required>
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Precio</label>
        <input name="precio" type="number" class="form-control" id="inputAddress" value="{$producto->precio}" required>
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Fecha</label>
        <input name="fecha" type="date" class="form-control" id="inputAddress" value="{$producto->fecha}" required>
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Deuda</label>
        <input name="deuda" type="number" class="form-control" id="inputAddress" value="{$producto->deuda}" required>
    </div>

    <div class="col-12">
        <input type="submit" name="modificarProducto"  class="btn btn-outline-secondary" value="Modificar">
    </div>

</form>

{include file="footer.tpl"}