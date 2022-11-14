{include file="header.tpl"}
<div class="item-body">
<h1 class="display-4 font-italic" style="font-size: 2rem;"> <b>Mostrando {$count} productos de {$cliente->nombre} {$cliente->apellido}</b></h1>
    
    <ul class="list-group">
        {foreach from=$productos item=$producto}
            <li class="list-group-item">
                <div><b>Producto:</b> {$producto->producto}</div>
                <div><b>Precio:</b> {$producto->precio}</div>
                <div><b>Fecha:</b>{$producto->fecha} </div>
                <div><b>Deuda:</b> {$producto->deuda} </div>
                {if isset($smarty.session.USER_ID)}
                    <a href='editInfoProducto/{$producto->id_producto}' type='button'
                    class="btn btn-outline-secondary">Modificar</a>
                    <a href='deleteProducto/{$producto->id_producto}/{$producto->cliente}' type='button' class="btn btn-outline-secondary">Borrar</a>
                {/if}
            </li>
        {/foreach}
    </ul>
</div>


{if isset($smarty.session.USER_ID)}
    <div class="item-body">
      <p>
        <a  class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button"
          aria-expanded="false" aria-controls="collapseExample">
          Agregar producto
        </a>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body" style="width: 30rem;">
        {include file="formAddProducto.tpl"}
        </div>
      </div>
    </div>
  {/if}



{include file="footer.tpl"}