<div id="div-form">
    <h2>Cadastrar Usuário</h2>
    <form method="POST" action="?pg=usuario/processar_usuario">
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Insira o Nome..." required/>
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="Insira o E-mail..." required/>
        </div>
        <div>
            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="Insira o Telefone..." required/>
        </div>
        <div>
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Insira a Senha..." required/>
        </div>
        <button type="submit">REGISTRAR</button>
    </form>
    
<div>