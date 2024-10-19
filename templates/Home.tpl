{include file='Header.tpl'}

<body>
    {if $user} {* si se esta logueado *}
        <a href="Logout">Logout</a> {* se muestra el logout *}
        
        <p> <a href="ShowCreateAlbum">crear un nuevo album </a></p>
        <p> <a href="ShowCreateBand">crear una nueva banda </a></p>
    {else} {* si no se esta logueado *}
        <a href="ShowLogin">Login</a> {* se muestra el login *}
    {/if}
    <p> <a href="Bands">ver listado de bandas</a></p>
    <table>
        <thead>
            <tr>
                <th>band</th>
                <th>album</th>
                <th>año de lanzamiento</th>
                <th>genero</th>
                <th>imagen</th>
                {if $user} {* si se esta logueado *}
                    <th>editar</th> {* se va a mostrar el boton editar y borrar *}
                    <th>borrar</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$albums_bands item=album_band}
                <tr>
                    <td>{$album_band->banda|escape:"html"}</td> {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
                    <td> <a href="Description/{$album_band->id_album}">{$album_band->album|escape:"html"}</a></td>
                    <td>{$album_band->anio_de_lanzamiento|escape:"html"}</td>
                    <td>{$album_band->genero|escape:"html"}</td>
                    <td><img src="{$album_band->imagen|escape:"html"}" alt=""></td>
                    {if $user} {* si se esta logueado *}
                        <td><button><a href="ShowEditAlbum/{$album_band->id_album}">editar</a></button></th> {* se va a mostrar el boton editar *}
                        <td><button><a href="DeleteAlbum/{$album_band->id_album}">eliminar</a></button></th> {* se va a mostrar el boton borrar *}
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>

    {include file='Footer.tpl'}

</body>