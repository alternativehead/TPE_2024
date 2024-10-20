{include file='Header.tpl'}

<body class="text-white p-2" style="background-color: #1a1a1a;">
    <a class="text-blue text-decoration-none" href="../Home">Volver</a>
    <p class="p-3"> {$description->descripcion|escape:"html"} </p>
    {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
</body>

{include file='Footer.tpl'}