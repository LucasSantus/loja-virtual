<?php
if(!empty($_POST)){
    $usuario_id = $_SESSION["id"];
    $descricao = $_POST["descricao"];
    $formacao = $_POST["formacao"];
    $telefone = $_POST["experiencia"];
    $linkedin = $_POST["linkedin"];
    $github = $_POST["github"];
    $data_hora_cadastro = date('Y-m-d H:i:s');

    echo($usuario_id);
    # Insert no banco de dados
    $stmt = $conn->prepare("INSERT INTO curriculo (usuario_id, descricao, formacao, experiencia, url_linkedin, url_github, data_hora_cadastro) VALUES (:usuario_id, :descricao, :formacao, :experiencia, :url_linkedin, :url_github, :data_hora_cadastro)");
    $bind_param = [
        "usuario_id" => $usuario_id, 
        "descricao" => $descricao, 
        "formacao" => $formacao,
        "experiencia" => $telefone,
        "url_linkedin" => $linkedin, 
        "url_github" => $github, 
        "data_hora_cadastro" => $data_hora_cadastro,
    ];
    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Currículo inserido no banco!</div>';
        $conn->commit();
    } catch(PDOException $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Não foi possível inserir o currículo no banco de dados -> ' . $e->getMessage() . '</div>';
    }
}
?>
<div id="btn-limpar-sessao">
    <a href="?pg=curriculo/curriculos">Voltar</a>
</div>