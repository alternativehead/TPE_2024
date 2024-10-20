{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="Home">Volver</a>
    <table class="table table-dark table-striped table table-bordered">
        <thead>
            <tr>
                <th>banda</th>
                <th>lugar de origen</th>
                <th>año de origen</th>
                <th>estado</th>
                <th>descripcion</th>
                <th>miembros</th>
                {if $user}
                    <th>editar</th>
                    <th>borrar</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$bands item=band}
                <tr>
                    <td><a class="text-blue text-decoration-none" href="Discography/{$band->id_banda}"> {$band->banda|escape:"html"}</a></td>
                    {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
                    <td>{$band->lugar_origen|escape:"html"}</td>
                    <td>{$band->anio_origen|escape:"html"}</td>
                    {if $band->estado == 0}
                        <td>no activo</td>
                    {else}
                        <td>activo</td>
                    {/if}
                    <td>{$band->descripcion|escape:"html"}</td>
                    <td>{$band->miembros|escape:"html"}</td>
                    {if $user}
                        <td><button class="btn btn-primary"><a class="text-white text-decoration-none" href="ShowEditBand/{$band->id_banda}">editar</a></button></th>
                        <td><button class="btn btn-primary"><a class="text-white text-decoration-none" href="DeleteBand/{$band->id_banda}">eliminar</a></button></th>
                        {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
</body>
{include file='Footer.tpl'}