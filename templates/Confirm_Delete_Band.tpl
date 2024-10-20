{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="Home">Volver</a>
    <div class="w-25">
        <p class="alert alert-warning" role="alert"> {$caution} </p> {*explico el porque de esta reedireccion*}
    </div>
    {if $confirm}
        <div class="w-25">
            <p class="alert alert-warning" role="alert"> {$confirm} </p>
        </div>
    {/if}
    <form action="../ConfirmDeleteBand/{$id_band}" method="post"> {*creo un formulario para confirmar que desea hacer el administrador*}
        <input type="number" min="0" max="1" name="confirm" placeholder="0 para no y 1 para si" class="w-25">
        <input type="submit" class="text-white btn btn-primary">
    </form>
</body>

{include file='Footer.tpl'}