{include file='Header.tpl'}

<body class="p-3" style="background: linear-gradient(to bottom, #1a1a1a, #434343);">
    {if $user} {* si se esta logueado *}
        <a href="Logout" class="text-blue text-decoration-none">Logout</a> {* se muestra el logout *}
        
        <p> <a class="text-blue text-decoration-none" href="ShowCreateAlbum">crear un nuevo album </a></p>
        <p> <a class="text-blue text-decoration-none" href="ShowCreateBand">crear una nueva banda </a></p>
    {else} {* si no se esta logueado *}
        <a class="text-blue text-decoration-none" href="ShowLogin">Login</a> {* se muestra el login *}
    {/if}
    <p> <a class="text-blue text-decoration-none" href="Bands">ver listado de bandas</a></p>
    <table class="table table-dark table-striped table table-bordered">
        <thead>
            <tr>
                <th>banda</th>
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
                    <td> <a class="text-blue text-decoration-none" href="Description/{$album_band->id_album}">{$album_band->album|escape:"html"}</a></td>
                    <td>{$album_band->anio_de_lanzamiento|escape:"html"}</td>
                    <td>{$album_band->genero|escape:"html"}</td>
                    <td><img class="img-thumbnail w-25" src="{$album_band->imagen|escape:"html"}" alt=""></td>
                    {if $user} {* si se esta logueado *}
                        <td><button class="btn btn-primary"><a class="text-white text-decoration-none" href="ShowEditAlbum/{$album_band->id_album}">editar</a></button></th> {* se va a mostrar el boton editar *}
                        <td><button class="btn btn-primary"><a class="text-white text-decoration-none" href="DeleteAlbum/{$album_band->id_album}">eliminar</a></button></th> {* se va a mostrar el boton borrar *}
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>

    {include file='Footer.tpl'}

</body>