<?php
    $sqlCategorias = "SELECT * FROM categoria";
    $resultCategorias = $conn->query($sqlCategorias, PDO::FETCH_ASSOC);
?>

<?php
    if(isset($_POST['busca'])) {
        $nome = "%".trim($_POST['busca'])."%";
        $sth = $conn->prepare('SELECT itens.id, itens.nome, itens.descricao, itens.foto, categoria.nome as cate_nome FROM itens 
        INNER JOIN categoria ON categoria.id = itens.id_categoria where itens.nome like :nome or itens.descricao like :nome
         or itens.id like :nome ORDER BY itens.id DESC ');
        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }else if(isset($_POST['categoria'])){
        $nome = "%".trim($_POST['categoria'])."%";
        $sth = $conn->prepare('SELECT itens.id, itens.nome, itens.descricao, itens.foto, categoria.nome as cate_nome FROM itens 
        INNER JOIN categoria ON categoria.id = itens.id_categoria where categoria.nome like :nome ORDER BY itens.id DESC');
        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $sql = "SELECT itens.id, itens.nome, itens.descricao, itens.foto, categoria.nome as cate_nome FROM itens 
        INNER JOIN categoria ON categoria.id = itens.id_categoria ORDER BY itens.id DESC";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);
    }

?>

    <h1 class="center">Produtos</h1>
    <form method="POST">
        
        <input id="busca" name="busca" type="text" placeholder="Busca por: [Código, Nome e Descrição]">
        <button class="waves-effect waves-light btn deep-orange">BUSCAR</button>
    </form>
    
    <form method="POST"> 
        <div>
            <select name="categoria">
                <option required value="">Busca por categoria...</option>
                <?php
                    while($linha = $resultCategorias->fetch()){
                ?>
                    <option value="<?= $linha["nome"] ?>"><?= $linha["nome"] ?></option>
                <?php 
                    } 
                ?>
            </select>
            <button class="waves-effect waves-light btn deep-orange">BUSCAR</button>
        </div>
        
    </form>
    

    <table>
    
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Categoria</th>
        </tr>

        <?php
            foreach($result as $linha){
        ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['descricao'] ?></td>
                <td><img width="100" height="100" style="margin: 0 auto;" src="<?= $linha['foto'] ?>"></td>
                <td><?= $linha['cate_nome'] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
