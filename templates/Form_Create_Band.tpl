{include file='Header.tpl'}
<body>
<a href="Home">volver</a>
{if $error}
    <h1> falta completar {$error} campos</h1>
{/if}
<form action="CreateBand" method="post">
    <input type='text' name='band' placeholder='Banda'>
    <input type="text" name="origin" placeholder="Lugar de origen">
    <input type='number' name='year' placeholder='Anio de origen'>
    <input type='text' name='description' placeholder="Descripcion">
    <input type="number" name="active" min="0" max="1" placeholder="estado">
    <input type='text' name='members' placeholder="Miembros">
    <input type='submit'>
</form>

{include file='Footer.tpl'}

</body>