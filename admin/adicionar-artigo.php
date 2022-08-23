<?php

require_once '../config.php';
require_once '../src/Artigo.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST') {

    $artigo = new Artigo($mysql);
    $artigo->titulo   = $_POST['titulo'];
    $artigo->conteudo = $_POST['conteudo'];

    $artigo->adicionar($artigo->titulo, $artigo->conteudo);

    header('Location: /php-webapp/admin/index.php');
    die();

} 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>