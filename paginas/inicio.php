<?php

    $sql = "SELECT * FROM produtos ORDER BY data_hora_cadastro DESC";
    $result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<head>
    <title>
        Dashboard | Loja Virtual
    </title>
</head>
<div>
    <h3 class="center">Produtos</h3>
</div>

<?php
    if(!isset($_SESSION["nome"])){
?>
    <div>
        <a class="btn" href="?pg=curriculo/cadastrar">CADASTRAR</a>
    </div>
<?php
    }
?>

<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Data Cadastrado</th>
            <th>Informações</th>
        </tr>

        <?php
            while($linha = $result->fetch()){
        ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['descricao'] ?></td>
                <td><?= $linha['foto'] ?></td>
                <td><?= $linha['data_hora_cadastro'] ?></td>
                <td><a href="?pg=curriculo/gerar&id=<?= $linha['id'] ?>">Ver Mais</a></td>
            </tr>
        <?php
            }
        ?>
    </table>
</div>