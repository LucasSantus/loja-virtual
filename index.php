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
        
        <!-- <link rel="stylesheet" type="text/css" href="css/estilo.css" /> -->

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Let browser know website is optimized for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        
        <!-- Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

        <!-- Title WebSite -->
        <title>Loja Virtual</title>
    </head>

    <body>
        
            <header>
                <nav>
                    <div class="nav-wrapper container">
                        <a href="?pg=inicio" class="brand-logo">Logo</a>
                        <ul class="right hide-on-med-and-down">
                            <?php
                                if(!isset($_SESSION["nome"])){
                            ?>
                                <li><a href="?pg=usuario/cadastrar_usuario">Cadastrar</a></li>
                                <li><a href="?pg=login/formulario">Login</a></li>
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

            <footer class="page-footer">
                <div class="container">
                    <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                    </div>
                </div>
            </footer>
        
        <!-- Import Java Script Personalizado -->
        <script src="js/materialize.min.js" defer></script>
    </body>
</html>