{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="../Bands">Volver</a>
    <table class="table table-dark table-striped table table-bordered">
        <thead>
            <tr>
                <th>album</th>
                <th>año de lanzamiento</th>
                <th>genero</th>
                <th>Descripcion</th>
                <th>imagen</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$discography item=discography}
                <tr>
                    <td>{$discography->album|escape:"html"}</td>
                    {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
                    <td>{$discography->anio_de_lanzamiento|escape:"html"}</td>
                    <td>{$discography->genero|escape:"html"}</td>
                    <td>{$discography->descripcion|escape:"html"}</td>
                    <td><img class="img-thumbnail w-25" src="{$discography->imagen}" alt=""></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</body>

{include file='Footer.tpl'}