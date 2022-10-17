{include file="header.tpl"}
<h1 class="display-4 font-italic" style="font-size: 2rem;"> <b>Productos vendidos</b></h1>

<div class="item-body">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CLIENTE</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha</th>
                <th scope="col">Deuda</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$productosVendidos item=$productoVendido}
                <tr>
                    <th scope="row">{$productoVendido->nombre} {$productoVendido->apellido} </th>
                    <td>{$productoVendido->producto}</td>
                    <td> {$productoVendido->precio}</td>
                    <td>{$productoVendido->fecha}</td>
                    <td>{$productoVendido->deuda}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>


{include file="footer.tpl"}