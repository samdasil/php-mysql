<?php
    
    require_once '../config.php';
    require_once '../src/Artigo.php';

    if( isset($_GET['id']) ) {
        $id = $_GET['id'];
        $obj_artigo = new Artigo($mysql);
        $artigo = $obj_artigo->buscarPorId($id);
    }else if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) ){
        $id = $_POST['id'];
        $obj_artigo = new Artigo($mysql);
        $artigo = $obj_artigo->deletar($id);
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
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo #<?=$artigo['id'];?>?</h1>
        <p>:: <?=$artigo['titulo'];?></p>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?=$artigo['id'];?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>