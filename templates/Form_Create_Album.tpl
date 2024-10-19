{include file='Header.tpl'}
<body>
<a href="Home">volver</a>
{if $error}
    <h1> falta completar {$error} campos</h1>
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
            <option value="{$band->id_banda}"> {$band->banda|escape:"html"}</option> {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
        {/foreach}
    </select>
    <input type='submit'>
</form>

{include file='Footer.tpl'}

</body>