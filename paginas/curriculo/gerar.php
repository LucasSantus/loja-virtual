<?php
    $id = $_GET["id"];
    $user = $_SESSION["nome"];
    $email = $_SESSION["email"];
    $telefone = $_SESSION["telefone"];
$sql = "SELECT * FROM curriculo WHERE id =". $id;
$result = $conn->query($sql, PDO::FETCH_ASSOC);
?>
<h1>Dados pessoais:</h1>

<table>
    <tr>
        <th style="background-color: rgb(107, 140, 201);">Nome:</th>
        <th style="background-color: rgb(107, 140, 201);">e-mail</th>
        <th style="background-color: rgb(107, 140, 201);">Telefone</th>
    </tr>
    <tr> 
    <td><?= $user?></td>
    <td><?= $email?></td>
    <td><?= $telefone?></td>
    </tr>
</table>

<h1>Dados do currículo:</h1>
<table>
    <tr>
        <th style="background-color: rgb(107, 140, 201);">ID</th>
        <th style="background-color: rgb(107, 140, 201);">descricao</th>
        <th style="background-color: rgb(107, 140, 201);">formação academica</th>
        <th style="background-color: rgb(107, 140, 201);">Experiência profissional</th>
        <th style="background-color: rgb(107, 140, 201);">URL do Linkedin</th>
        <th style="background-color: rgb(107, 140, 201);">URL do GitHub</th>
        <th style="background-color: rgb(107, 140, 201);">Data de cadastro</th>
        <th style="background-color: rgb(107, 140, 201);">Id Usuário</th>

    </tr>

    <?php
        while($linha = $result->fetch()){
    ?>

            <?php 
                foreach($linha as $chave => $valor){
            ?>
                <td><?= $valor ?></td>

            <?php
                }
            ?>
    <?php
        }
    ?>
</table>