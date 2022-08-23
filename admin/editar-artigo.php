<?php
    
    require_once '../config.php';
    require_once '../src/Artigo.php';

    if( isset($_GET['id']) ) {
        $id = $_GET['id'];
        $obj_artigo = new Artigo($mysql);
        $artigo = $obj_artigo->buscarPorId($id);
    }else if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) ){
        $artigo = new Artigo($mysql);
        $artigo->atualizar($_POST['id'], $_POST['titulo'], $_POST['conteudo']);
        header('Location: /php-webapp/admin/index.php');
        exit;
    }else{
        
        header('Location: /php-webapp/admin/index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="POST">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?=$artigo['titulo'];?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo" rows="20">
                    <?=$artigo['conteudo'];?>
                </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?=$artigo['id'];?>" />
            </p>
            <p>
                <button class="botao">Salvar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>