<?php

if(isset($_SESSION["nome"])){
    header("Location: ?pg=area_restrita");
}

?>
<div id="div-form">
    <h1>Login</h1>
    <form method="POST" action="?pg=login/processar_formulario">
        <div>
            <label>E-mail</label>
            <input type="text" name="email" required placeholder="Digite seu email..." />
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="senha" required placeholder="Digite sua senha..." />
        </div>
        <button type="submit">Enviar</button>
    </form>
<div>