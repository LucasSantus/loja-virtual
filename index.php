<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require("bd/conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
?>

<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Let browser know website is optimized for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        
        <!-- Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    </head>

    <body>
        <header>
            <nav class="teal lighten-1">
                <div class="nav-wrapper container">
                    <a href="?pg=inicio" class="brand-logo">Loja Virtual</a>
                    <ul class="right hide-on-med-and-down">
                        <?php
                            if(!isset($_SESSION["nome"])){
                        ?>
                            <li><a href="?pg=inicio">Dashboard</a></li>
                            <li><a href="?pg=sobre">Sobre</a></li>
                            <li><a href="?pg=contato/form">Contato</a></li>
                            <!-- <li><a href="?pg=usuario/cadastrar_usuario">Cadastrar</a></li> -->
                            <li><a href="?pg=login/formulario"><i class="material-icons right">login</i>Login</a></li>
                        <?php
                            }
                            else{
                        ?>
                            <li><a href="?pg=curriculo/curriculos">Currículos</a></li>
                            <li><a href="?pg=login/limpar_sessao">Sair</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <?php
                $pg = (isset($_GET["pg"]) && !empty($_GET["pg"])) ? $_GET["pg"] : "inicio";
                include("paginas/".$pg.".php");
            ?>
        </main>

        <footer class="page-footer teal lighten-1">
            <div class="footer-copyright">
                <div class="container center">
                © 2021 Copyright Loja Virtual, Todos os Direitos Reservados.
                </div>
            </div>
        </footer>
        
        <!-- Import JQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- Import Java Script Personalizado -->
        <script src="js/materialize.min.js" defer></script>
        <script>
            $(document).ready(function(){
                $('select').formSelect();
            }); 
        </script>
    </body>
</html>