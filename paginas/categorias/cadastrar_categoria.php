<div id="div-form">
    
    <h2>Cadastro de categorias</h2>

    <form method="POST" action="?pg=categorias/processar_categoria">
        <div>
            <label>Nome</label>
            <input type="text" name="nome" required placeholder="Digite o nome da categoria..." />
        </div>
        <div>
            <label>Descrição</label>
            <input type="text" name="descricao" required placeholder="Digite a descrição da categoria..." />
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    
<div>