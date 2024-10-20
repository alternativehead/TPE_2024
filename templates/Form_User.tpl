{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="Home">Volver</a>
    {if $error}
        <div class="w-25">
            <p class="alert alert-warning" role="alert"> {$error} </p>
        </div>
    {/if}

    <form action="Login" method="post">
        <input type='text' name='user' placeholder='Usuario'>
        <input type="email" name="email" placeholder="Email">
        <input type='password' name='password' placeholder='Clave'>
        <input type='submit'class="text-white btn btn-primary">
    </form>

    {include file='Footer.tpl'}

</body>