<?php
    $sqlCategorias = "SELECT * FROM categoria";
    $resultCategorias = $conn->query($sqlCategorias, PDO::FETCH_ASSOC);
?>

<div id="div-form">
    
    <h2>Cadastro de novos itens</h2>

    <form method="POST" action="?pg=itens/processar_itens">
        <div>
            <label>Nome</label>
            <input type="text" name="nome" required placeholder="Digite o nome..." />
        </div>
        <div>
            <label>Descrição</label>
            <input type="text" name="descricao" required placeholder="Digite a descrição..." />
        </div>
        <div>
            <label>Imagem</label>
            <input type="text" name="imagem" required placeholder="Digite a URL da imagem..." />
        </div>
        <div>
            <label>Categorias</label>
            <select name="categoria">
                <option required value="">Selecione uma categoria...</option>
                <?php
                    while($linha = $resultCategorias->fetch()){
                ?>
                    <option value="<?= $linha["id"] ?>"><?= $linha["nome"] ?></option>
                <?php 
                    } 
                ?>
            </select>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    
<div>