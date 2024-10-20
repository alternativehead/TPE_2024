{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="Home">Volver</a>
    {if $error}
        <div class="w-25">
            <p class="alert alert-warning" role="alert"> falta completar {$error} campos</p>
        </div>
    {/if}

    <form action="CreateAlbum" method="post">
        <input type='text' name='album' placeholder='album'>
        <input type="number" name="year" placeholder="Anio De Lanzamiento">
        <input type='text' name='genre' placeholder='Genero'>
        <input type='text' name='discography' placeholder="Discografica">
        <input type='text' name='description' placeholder="descripcion">
        <input type="text" name="image" placeholder="url de la imagen">
        <select name="band">
            {foreach from=$bands item=band}
                <option value="{$band->id_banda}"> {$band->banda|escape:"html"}</option>
                {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
            {/foreach}
        </select>
        <input type='submit' class="text-white btn btn-primary">
    </form>

    {include file='Footer.tpl'}

</body>