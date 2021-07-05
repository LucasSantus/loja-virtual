<?php
    if(isset($_POST['busca'])) {
        $nome = "%".trim($_POST['busca'])."%";
        $sth = $conn->prepare('SELECT produtos.id, produtos.nome, produtos.descricao, produtos.foto, categorias.nome as categoria_nome FROM produtos 
        INNER JOIN categorias ON categorias.id = produtos.idcategoria where produtos.nome like :nome or produtos.descricao like :nome
            or produtos.id like :nome or categorias.nome like :nome ORDER BY produtos.id DESC ');
        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $sql = "SELECT produtos.id, produtos.nome, produtos.descricao, produtos.foto, categorias.nome as categoria_nome FROM produtos 
        INNER JOIN categorias ON categorias.id = produtos.idcategoria ORDER BY produtos.id DESC";
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
    <form method="POST">
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

        <?php
            foreach($result as $linha){
        ?>
        <div class="row s12 m12 l12 xl12">
            <div class="col s12 m6 l4 xl4">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?= $linha['foto'] ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?= $linha['nome'] ?>(<?= $linha['categoria_nome'] ?>)<i class="material-icons right">more_vert</i></span>
                        <p><a href="">Ver Mais</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?= $linha['nome'] ?>(<?= $linha['categoria_nome'] ?>)<i class="material-icons right">close</i></span>
                        <p><?= $linha['descricao'] ?></p>
                    </div>
                </div>
            </div>
            <?php
            }
        ?>
        </div>
        
            <!-- <tr>
                <td><?= $linha['id'] ?></td>
                
                <td><a href="?pg=curriculo/gerar&id=<?= $linha['id'] ?>">Ver Mais</a></td>
            </tr> -->
        
    <?php
        if(isset($_SESSION["nome"])){
    ?>
        <div class="right">
            <a class="waves-effect waves-light btn deep-orange" href="?pg=produto/cadastrar">CADASTRAR</a>
        </div>
    <?php
        }
    ?>
</div>