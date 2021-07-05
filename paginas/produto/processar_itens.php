<?php

if(!empty($_POST)){
    
    $descricao = $_POST["descricao"];
    $nome = $_POST["nome"];
    $imagem = $_POST["imagem"];
    $categoria = $_POST["categoria"];
   

    $stmt = $conn->prepare("INSERT INTO itens (nome,descricao, foto, id_categoria) 
    VALUES (:nome, :descricao, :imagem, :categoria)");
   
    $bind_param = ["nome" => $nome, "descricao" => $descricao, "imagem" => $imagem, "categoria" => $categoria];
    
    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        $last_id = $conn->lastInsertId();
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $last_id . ' inserido no banco!</div>';
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao inserir registro no banco: ' . $e->getMessage() . '</div>';
    }

}

?>

<div id="btn-limpar-sessao">
    <a href="?pg=itens/cadastrar_itens">Voltar</a>
</div>