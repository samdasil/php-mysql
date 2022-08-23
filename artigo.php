<?php
    
    require_once 'config.php';
    require_once 'src/Artigo.php';

    if( isset($_GET['id']) ) {
        $id = $_GET['id'];
        $obj_artigo = new Artigo($mysql);
        $artigo = $obj_artigo->buscarPorId($id);
    }else{
        header('Location', 'index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/src/style.css">
</head>

<body>
    <div id="container">
        <h1>
            <?=$artigo['titulo']?>
        </h1>
        <p><?=nl2br($artigo['conteudo'])?></p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>