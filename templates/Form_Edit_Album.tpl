{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="../Home">Volver</a>
    {if $error}
        <div class="w-25">
            <p class="alert alert-warning" role="alert"> falta completar {$error} campos</p>
        </div>
    {/if}
    <form action="../EditAlbum/{$row_album->id_album}" method="post">
        <input type='text' name='album' placeholder='album' value="{$row_album->album|escape:"html"}">
        {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
        <input type="text" name="year" placeholder="Anio De Lanzamiento"
            value="{$row_album->anio_de_lanzamiento|escape:"html"}">
        <input type='text' name='genre' placeholder='Genero' value="{$row_album->genero|escape:"html"}">
        <input type='text' name='discography' placeholder="Discografica"
            value="{$row_album->discografica|escape:"html"}">
        <input type='text' name='description' placeholder="descripcion" value="{$row_album->descripcion|escape:"html"}">
        <input type="text" name="image" placeholder="url de la imagen" value="{$row_album->imagen|escape:"html"}">
        <select name="band">
            {foreach from=$bands item=band}
                <option value="{$band->id_banda}"> {$band->banda|escape:"html"}</option>
            {/foreach}
        </select>
        <input type='submit' class="text-white btn btn-primary">
    </form>

    {include file='Footer.tpl'}
</body>