<?php
$sql = "SELECT co.id, co.nome, co.telefone, co.email, co.mensagem, uf.sigla AS estado, ci.nome AS cidade, DATE_FORMAT(co.data_hora, '%d/%m/%Y %H:%i:%S') AS data_hora
        FROM contatos co 
        INNER JOIN cidades ci ON ci.id = co.cidade_id 
        INNER JOIN estados uf ON uf.id = ci.estado_id
        ORDER BY co.id DESC";

$result = $conn->query($sql, PDO::FETCH_ASSOC);
?>

<head>
    <title>
        Lista de Contatos | Loja Virtual
    </title>
</head>

<h3 class="center">Lista de Contatos</h3>

<div class="row container">
    <table class="format_table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Mensagem</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Data/Hora</th>
        </tr>
        <?php
            while($linha = $result->fetch()){
        ?>
            <tr>
                <?php 
                    foreach($linha as $chave => $valor){
                ?>
                    <td><?= $valor ?></td>
                <?php
                    }
                ?>
            </tr>
        <?php
            }
        ?>
    </table>
    <div class="right">
        <a href="?pg=contato/form" class="waves-effect waves-light btn deep-orange">ADICIONAR</a>
    </div>
</div>