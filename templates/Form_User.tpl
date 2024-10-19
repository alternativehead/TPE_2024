{include file='Header.tpl'}

<body>
<a href="Home">volver</a>
{if $error}
    <h1> {$error} </h1>
{/if}

<form id='formulario' action="Login" method="post">
        <input type='text' name='user' placeholder='Usuario'>
        <input type="email" name="email" placeholder="Email">
        <input type='password' name='password' placeholder='Clave'>
        <input type='submit'>
    </form>

{include file='Footer.tpl'}

</body>