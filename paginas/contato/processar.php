<?php

if(!empty($_POST)){
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $mensagem = $_POST["mensagem"];

    # Insert no banco de dados
    $stmt = $conn->prepare("INSERT INTO contatos (nome, telefone, email, cidade_id, mensagem) VALUES (:nome, :telefone, :email, :cidade, :mensagem)");

    $bind_param = [
        "nome" => $nome,
        "telefone" => $telefone, 
        "email" => $email, 
        "cidade" => $cidade, 
        "mensagem" => $mensagem
    ];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        $conn->commit();
        echo ' 
        <div class="container">
            <div class="row">
                <div class="alert card green lighten-4 green-text text-darken-4">
                    <div class="card-content">
                        <p><i class="material-icons">check_circle</i>Contato Inserido com Sucesso!</p>
                    </div>
                </div>
            </div>
        </div>';
    } catch(PDOException $e) {
        $conn->rollback();
        echo '
        <div class="container">
            <div class="row">
                <div class="alert card red lighten-4 red-text text-darken-4">
                    <div class="card-content">
                        <p><i class="material-icons">report</i>Erro ao Inserir no Banco!</p>
                    </div>
                </div>
            </div>
        </div>';
    }

    ?>
        <script>
            setTimeout(function() {
                if($_POST["nome"]){
                    window.location.href = "?pg=contato/contatos";
                }
            }, 3000);
        </script>
    <?php
}
?>

<head>
    <title>
        Processar | Loja Virtual
    </title>
</head>