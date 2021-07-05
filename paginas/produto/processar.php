<?php

if(!empty($_POST)){
    
    $descricao = $_POST["descricao"];
    $nome = $_POST["nome"];
    $imagem = $_POST["imagem"];
    $categoria = $_POST["categoria"];
    $data_hora_cadastro = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, foto, idcategoria, data_hora_cadastro) 
    VALUES (:nome, :descricao, :imagem, :idcategoria, :data_hora_cadastro)");
    $bind_param = [
        "nome" => $nome, 
        "descricao" => $descricao, 
        "imagem" => $imagem, 
        "idcategoria" => $categoria,
        "data_hora_cadastro" => $data_hora_cadastro
    ];
    
    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);

        echo ' 
        <div class="container">
            <div class="row">
                <div class="alert card green lighten-4 green-text text-darken-4">
                    <div class="card-content">
                        <p><i class="material-icons">check_circle</i>Produto Inserido com Sucesso!</p>
                    </div>
                </div>
            </div>
        </div>';
        
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
    }
    ?>
        <script>
            setTimeout(function() {
                window.location.href = "?pg=inicio";
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