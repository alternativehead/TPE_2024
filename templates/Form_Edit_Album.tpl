{include file='Header.tpl'}
<body>
<a href="../Home">volver</a>
{if $error}
    <h1> falta completar {$error} campos</h1>
{/if}
<form action="../EditAlbum/{$row_album->id_album}" method="post">
    <input type='text' name='album' placeholder='album' value="{$row_album->album|escape:"html"}"> {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
    <input type="text" name="year" placeholder="Anio De Lanzamiento" value="{$row_album->anio_de_lanzamiento|escape:"html"}">
    <input type='text' name='genre' placeholder='Genero' value="{$row_album->genero|escape:"html"}">
    <input type='text' name='discography' placeholder="Discografica" value="{$row_album->discografica|escape:"html"}">
    <input type='text' name='description' placeholder="descripcion" value="{$row_album->descripcion|escape:"html"}">
    <input type="text" name="image" placeholder="url de la imagen" value="{$row_album->imagen|escape:"html"}">
    <select name="band">
        {foreach from=$bands item=band}
            <option value="{$band->id_banda}"> {$band->banda|escape:"html"}</option>
        {/foreach}
    </select>
    <input type='submit'>
</form>

{include file='Footer.tpl'}
</body>