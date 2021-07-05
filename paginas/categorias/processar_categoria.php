
<?php

if(!empty($_POST)){
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
   
    $stmt = $conn->prepare("INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)");
   
    $bind_param = ["nome" => $nome, "descricao" => $descricao];
    
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
    <a href="?pg=categorias/cadastrar_categoria">Voltar</a>
</div>