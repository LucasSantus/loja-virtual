<?php

$sql = "SELECT * FROM curriculo ORDER BY data_hora_cadastro DESC";
$result = $conn->query($sql, PDO::FETCH_ASSOC);
?>

<h2>Listagem de Curriculos</h2>

<div>
    <a class="btn-table btn-cadastro" href="?pg=curriculo/cadastrar">CADASTRAR</a>
</div>
<table>
    <tr>
        <th>Descrição</th>
        <th>Hora Cadastrado</th>
        <th>Gerar Curriculo</th>
    </tr>

    <?php
        while($linha = $result->fetch()){
    ?>
        <tr>
            <td><?= $linha['descricao'] ?></td>
            <td><?= $linha['data_hora_cadastro'] ?></td>
            <td><a class="btn-table" href="?pg=curriculo/gerar&id=<?= $linha['id'] ?>">GERAR</a></td>
        </tr>
    <?php
        }
    ?>
</table>