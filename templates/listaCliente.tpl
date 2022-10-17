{include file="header.tpl"}




{if isset($smarty.session.USER_ID)}
    <div class="item-body">
      <p>
        <a  class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button"
          aria-expanded="false" aria-controls="collapseExample">
          Agregar cliente
        </a>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body" style="width: 30rem;">
        {include file="formAdd.tpl"}
        </div>
      </div>
    </div>
  {/if}

{if !isset($smarty.session.USER_ID)}
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">¡Controla tus gastos!</h1>
        <p class="lead my-3">Busca tu nombre en la lista y podras ver tus productos, fechas de compra, y saldos
            adeudados.</p>

    </div>
</div>
{/if}


<h1 class="display-4 font-italic" style="font-size: 2rem;"> <b>Lista de Clientes </b></h1>



<ul class="list-group">
    {foreach from=$clientes item=$cliente}
        <li class="list-group-item">
            <span> <b>{$cliente->nombre}  {$cliente->apellido} </b>- {$cliente->dni} - {$cliente->email} </span>
            {if isset($smarty.session.USER_ID)}
                <a href='editInfo/{$cliente->id}' type='button' class="btn btn-outline-secondary">Modificar</a>
                <a href='delete/{$cliente->id}' type='button' class="btn btn-outline-secondary">Borrar</a>
            {/if}
            <a href='showProductos/{$cliente->id}' type='button' class="btn btn-outline-secondary">Mostrar Productos</a>
        </li>
    {/foreach}
</ul>
<hr class="featurette-divider">

{include file="footer.tpl"}