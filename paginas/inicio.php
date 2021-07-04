<?php
    if(isset($_GET['busca'])) {
        $nome = "%".trim($_GET['busca'])."%";
        $sth = $conn->prepare('SELECT * FROM `produtos` WHERE `nome` LIKE :nome');
        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sth->execute();
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $sql = "SELECT * FROM produtos ORDER BY data_hora_cadastro DESC";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);    
    }
?>

<head>
    <title>
        Dashboard | Loja Virtual
    </title>
</head>

<div class="container">
    <h3 class="center">Produtos</h3>
    <form action="?pg=busca" method="GET">
        <div class="row">
            <div class="input-field col s12 m12 l12 xl12">
                <input id="busca" name="busca" type="text" class="validate">
                <label for="busca">Pesquisar:</label>
            </div>
            <div class="right">
                <button class="waves-effect waves-light btn deep-orange">BUSCAR</button>
            </div>  
        </div>
    </form>
</div>

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
            foreach($result as $linha){
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
    <?php
        if(isset($_SESSION["nome"])){
    ?>
        <div class="right">
            <a class="waves-effect waves-light btn deep-orange" href="?pg=curriculo/cadastrar">CADASTRAR</a>
        </div>
    <?php
        }
    ?>
</div>