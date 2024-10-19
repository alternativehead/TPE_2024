{include file='Header.tpl'}

<body>
    <a href="../Home">volver</a>
    <p> {$description->descripcion|escape:"html"} </p> {* el escape es el equivalente que tiene smarty al htmlspecialchars *}
</body>
{include file='Footer.tpl'}