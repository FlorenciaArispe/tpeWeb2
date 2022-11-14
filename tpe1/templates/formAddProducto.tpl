{if isset($smarty.session.USER_ID)}

<form action="addProducto/{$id}" method="POST" class="row g-3">

    <div class="col-12">
        <input name="cliente" type="hidden" class="form-control" id="inputName" value="{$id}">
    </div>

    <div class="col-12">
        <label for="inputName" class="form-label">Producto</label>
        <input name="producto" type="text" class="form-control" id="inputName" required>
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Precio del producto</label>
        <input name="precio" type="number" class="form-control" id="inputAddress" required>
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Fecha de compra</label>
        <input name="fecha" type="date" class="form-control" id="inputAddress" required>
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Deuda</label>
        <input name="deuda" type="number" class="form-control" id="inputAddress" required>
    </div>

    <div class="col-12">
        <input type="submit" name="agregar" class="btn btn-outline-secondary" value="Agregar">
    </div>

</form>

{/if}