<?php

if(!empty($_POST)){
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $sql = "SELECT us.id, us.nome, us.email, us.telefone
    FROM usuarios us
    WHERE us.email = '".$email."' and senha = '".$senha."'";
    $result = $conn->query($sql, PDO::FETCH_ASSOC);
    if($info = $result->fetch()){
        $_SESSION["nome"]=$info['nome'];
        $_SESSION["email"]=$info['email'];
        $_SESSION["telefone"]=$info['telefone'];
        $_SESSION["id"] = $info['id'];
        header("Location: ?pg=area_restrita");
    }else{
        echo '
        <div class="container">
            <div class="row">
                <div class="alert card red lighten-4 red-text text-darken-4">
                    <div class="card-content">
                        <p><i class="material-icons">report</i>Usuário Não Encontrado!</p>
                    </div>
                </div>
            </div>
        </div>';    
    }
}
else{
    header("Location: ?pg=login/form");
}
?>

<head>
    <title>
        Processar | Loja Virtual
    </title>
</head>