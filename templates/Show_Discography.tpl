{include file='Header.tpl'}

<a href="../Home">volver</a>

<body>
    <table>
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
                    <td>{$discography->album|escape:"html"}</td> {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
                    <td>{$discography->anio_de_lanzamiento|escape:"html"}</td>
                    <td>{$discography->genero|escape:"html"}</td>
                    <td>{$discography->descripcion|escape:"html"}</td>
                    <td><img src="{$discography->imagen}" alt=""></td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    {include file='Footer.tpl'}

</body>