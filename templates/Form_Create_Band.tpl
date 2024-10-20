{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="Home">Volver</a>
    {if $error}
        <div class="w-25">
            <p class="alert alert-warning" role="alert"> falta completar {$error} campos</p>
        </div>
    {/if}
    <form action="CreateBand" method="post">
        <input type='text' name='band' placeholder='Banda'>
        <input type="text" name="origin" placeholder="Lugar de origen">
        <input type='number' name='year' placeholder='Anio de origen'>
        <input type='text' name='description' placeholder="Descripcion">
        <input type="number" name="active" min="0" max="1" placeholder="estado">
        <input type='text' name='members' placeholder="Miembros">
        <input type='submit' class="text-white btn btn-primary">
    </form>

    {include file='Footer.tpl'}

</body>