<?php
    $id = $_GET["id"];
    if(!empty($_POST)){   
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $data_hora_atualizacao = date('Y-m-d H:i:s');

        $usuario_resp= $_SESSION["nome"];
        $descricao = ("Modificar | id -> ".$id);
        $data_hora = date('Y-m-d H:i:s');    
        
        # Update no banco de dados
        $stmt = $conn->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario,  senha = :senha, data_hora_atualizacao = :data_hora_atualizacao where id = :id");
        $stmt1 = $conn->prepare("INSERT INTO logs (usuario_resp, descricao, data_hora) VALUES (:usuario_resp, :descricao, :data_hora)");

        $bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => md5($senha), "data_hora_atualizacao" => $data_hora_atualizacao, "id" => $id];
        $bind_param1 = ["usuario_resp"=> $usuario_resp, "descricao" =>$descricao, "data_hora"=>$data_hora];

        try {            
            $stmt->execute($bind_param);
            $stmt1->execute($bind_param1);
            echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Usuário Modificado!</div>';
            echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Você será redirecionado para a tela de Listagem de Usuários</div>';
        } catch(PDOExecption $e) {
            $conn->rollback();
            echo '<div class="msg-cadastro-contato msg-cadastro-erro">Não foi possível modificar esse usuário. -> ' . $e->getMessage() . '</div>';
        }
?>
    <script>
        setTimeout(function() {
            window.location.href = "?pg=usuario/usuarios";
        }, 3000);
    </script>
<?php
    }
    $sql = "SELECT * FROM usuarios WHERE id =". $id;    
    $result = $conn->query($sql, PDO::FETCH_ASSOC);
    ?>
    <form method="POST">
        <?php 
            while($sql = $result->fetch()){                
        ?>
        <div id="div-form">
            <h2>Modificar Usuário</h2>
            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="<?=$sql['nome']?>" placeholder="Insira o Nome..." required />
            </div>
            <div>
                <label>Usuário</label>
                <input type="text" name="usuario" value="<?=$sql['usuario']?>" placeholder="Insira o Usuário..." required />
            </div>
            <div>
                <label>Senha</label>
                <input type="senha" name="senha" value="<?=$sql['senha']?>" placeholder="Insira a Senha..." required />
            </div>
            <button type="submit">MODIFICAR</button>
        </div>
    </form>
        <?php
            }
        ?>    
<div>