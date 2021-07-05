<?php
if(!empty($_POST)){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    $stmt = $conn->prepare("INSERT INTO categorias (nome, descricao) VALUES (:nome, :descricao)");

    $bind_param = [
        "nome" => $nome, 
        "descricao" => $descricao
    ];
    
    try {
        $conn->beginTransaction();

        $stmt->execute($bind_param);

        echo ' 
        <div class="container">
            <div class="row">
                <div class="alert card green lighten-4 green-text text-darken-4">
                    <div class="card-content">
                        <p><i class="material-icons">check_circle</i>Registro Inserido com Sucesso!</p>
                    </div>
                </div>
            </div>
        </div>';

        ?>
            <script>
                setTimeout(function() {
                    window.location.href = "?pg=inicio";
                }, 2000);
            </script>
        <?php

        $conn->commit();

    } catch(PDOExecption $e) {
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

        ?>
            <script>
                setTimeout(function() {
                    window.location.href = "?pg=inicio";
                }, 2000);
            </script>
        <?php
    }
}
?>

<head>
    <title>
        Processar | Loja Virtual
    </title>
</head>