{include file='Header.tpl'}
<body>
<a href="../Home">volver</a>
{if $error}
    <h1> falta completar {$error} campos</h1>
{/if}
<form action="../EditBand/{$band->id_banda|escape:"html"}" method="post">  {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
    <input type='text' name='band' placeholder='Banda' value="{$band->banda|escape:"html"}">
    <input type="text" name="origin" placeholder="Lugar de Origen" value="{$band->lugar_origen|escape:"html"}">
    <input type='number' name='year' placeholder='Anio De Origen' value="{$band->anio_origen|escape:"html"}">
    <input type='text' name='description' placeholder="Descripcion" value="{$band->descripcion|escape:"html"}">
    <input type='number' min="0" max="1" name='active' placeholder="estado" value="{$band->estado|escape:"html"}">
    <input type="text" name="members" placeholder="miembros" value="{$band->miembros|escape:"html"}">
    <input type='submit'>
</form>

{include file='Footer.tpl'}
</body>